<?php 

require '../config/function.php';

$paraRestultId = checkParamId('id');
if(is_numeric($paraRestultId)){

    $patientId = validate($paraRestultId);
    
    $patient = getById('patients',$patientId);
    if($patient['status'] == 200)
    {
        $response = delete('patients',$patientId);
        if ($response)
        {
           redirect('patients.php','patient deleted Successfully.');
        }
        else
        {
            redirect('patients.php', 'Something Went Wrong.');
        }
    }
    else
    {
        redirect('patients.php',$patient['message']);
    }
}
else
{
    redirect('patients.php', 'Something Went Wrong.');
}

?>