<?php 
include('../config/function.php');

if(isset($_POST['savePay']))
{
    $national_id = validate($_POST['national_id']);
    $vdate = validate($_POST['vdate']);

    if($_FILES['images']['size'] > 0)
    {
        $path = "../assets/uploads/evidence/";
        $image_ext  = pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);

        $filename = time().'.'.$image_ext;

        move_uploaded_file($_FILES['images']['tmp_name'], $path."/".$filename);
        $finalImage = "assets/uploads/evidence/".$filename;
    }
    else
    {
        $finalImage ='';
    }

    if($name != '')
    {

        $data = [
            'national_id' => $national_id,
            'vdate' => $vdate,
            'images' => $finalImage
        ];

        $result = insert('uploads',$data);
        if($result){
            redirect('uploads.php','Saved Successfully');
        }else{
            redirect('payment.php','Something went wrong');
        }
    }
    else
    {
        redirect('payment-edit.php','Please fill payment required fields');
    }
}

if(isset($_POST['savePatient']))
{ 
    $national_id = validate($_POST['national_id']);
    $name = validate($_POST['pname']);
    $fname = validate($_POST['fname']);
    $regi_date = validate($_POST['regi_date']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $sex = ($_POST['sex'] == 'male' || $_POST['sex'] == 'female') ? validate($_POST['sex']) : '';
    $age = validate($_POST['age']);
    $address = validate($_POST['paddress']);
    $insurance = ($_POST['insurance'] == 'insured' || $_POST['insurance'] == 'uninsured') ? validate($_POST['insurance']) : '';
    $status = isset($_POST['status']) ? 1:0;

    // Check for duplicate national ID
    $nationalIdCheck = mysqli_query($conn, "SELECT * FROM patients WHERE national_id='$national_id'");
    if($nationalIdCheck){
        if(mysqli_num_rows($nationalIdCheck) > 0){
            redirect('patients.php','National ID Already used by another patient');
        }
    }
    
    if($_FILES['images']['size'] > 0)
    {
        $path = "../assets/uploads/proof";
        $image_ext  = pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);

        $filename = time().'.'.$image_ext;

        move_uploaded_file($_FILES['images']['tmp_name'], $path."/".$filename);
        $finalImage = "assets/uploads/proof/".$filename;
    }
    else
    {
        $finalImage ='';
    }
    
    if($name != '')
    {
        $emailCheck = mysqli_query($conn, "SELECT * FROM patients WHERE email='$email'");
        if($emailCheck){
            if(mysqli_num_rows($emailCheck) > 0){
                redirect('patients.php','Email Already used by another user');
            }
        }

        $data = [
            'national_id' => $national_id,
            'pname' => $name,
            'fname' => $fname,
            'regi_date' => $regi_date,
            'email' => $email, 
            'phone' => $phone, 
            'sex' => $sex,
            'age' => $age,
            'paddress' => $address,
            'insurance' => $insurance,
            'images' => $finalImage
        ];

        $result = insert('patients',$data);
        if($result){
            redirect('patients-update.php','Patient details submited successfully!');
        }else{
            redirect('patients-create.php','Something went wrong');
        }
    }
    else
    {
        redirect('patients-create.php','Please fill patient required fields');
    }
}

if(isset($_POST['saveSigns']))
{
    $nationalid = validate($_POST['nationalid']);
    $vidate = validate($_POST['vidate']);
    $symptom = validate($_POST['symptom']);

    if($_FILES['images']['size'] > 0)
    {
        $path = "../assets/uploads/evidence/";
        $image_ext  = pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);

        $filename = time().'.'.$image_ext;

        move_uploaded_file($_FILES['images']['tmp_name'], $path."/".$filename);
        $final_Image = "assets/uploads/evidence/".$filename;
    }
    else
    {
        $final_Image ='';
    }

    if($name != '')
    {

        $data = [
            'nationalid' => $nationalid,
            'vidate' => $vidate,
            'symptom' => $symptom,
            'images' => $final_Image
        ];

        $result = insert('signs',$data);
        if($result){
            redirect('patients-update.php','Saved Successfully');
        }else{
            redirect('signs.php','Something went wrong');
        }
    }
    else
    {
        redirect('signs.php','Please fill symptoms required fields');
    }
}


if(isset($_POST['updateAdmin']))
{
    $adminId = validate($_POST['adminId']);

    $adminData = getById('admins',$adminId);
    if($adminData['status'] != 200){
        redirect('admins-edit.php?id='.$adminId,'Please fill required fields.');
    }

    $name = validate($_POST['pname']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $admin = isset($_POST['admin']) == true ? 1:0;
    $doctor = isset($_POST['doctor']) == true ? 1:0;
    $patient = isset($_POST['patient']) == true ? 1:0;
    $is_ban = isset($_POST['is_ban']) == true ? 1:0;

    $EmailCheckQuery = "SELECT * FROM admins WHERE email='$email' AND id!='$adminId'";
    $checkResult = mysqli_query($conn, $EmailCheckQuery);
    if($checkResult){
    if(mysqli_num_rows($checkResult) > 0){
        redirect('admins-edit.php?id='.$adminId,'Email Already used by another user');
          }
    }

    if($password != ''){
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    }
    else{
        $hashedPassword = $adminData['data']['password'];
    }
if($name != '' && $email != '')
{
    $data = [
        'pname' => $name,
        'email' => $email, 
        'password' => $hashedPassword, 
        'phone' => $phone, 
        'admin' => $admin,
        'doctor' => $doctor,
        'patient' => $patient,
        'is_ban' => $is_ban				
    ];
    $result = update('admins', $adminId, $data);

    if($result){
        redirect('register-update.php?id='.$adminId,'Patient Updated Successfully');
    }else{
        redirect('register-edit.php?id='.$adminId,'Something went wrong!');
    }
}
else
{
    redirect('register-edit.php','Please fill required fields.');
}
}

if(isset($_POST['updatePay']))
{    
    $payId = validate($_POST['payId']);

    $payData = getById('uploads',$payId);
    if($payData['status'] != 200){
        redirect('payment-edit.php?id='.$payId,'Please fill required fields.');
    }

    $vdate = validate($_POST['vdate']);

    if($_FILES['images']['size'] > 0)
    {
        $path = "../assets/uploads/evidence";
        $image_ext  = pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);

        $filename = time().'.'.$image_ext;

        move_uploaded_file($_FILES['images']['tmp_name'], $path."/".$filename);
        $finalImage = "assets/uploads/evidence/".$filename;

        $deleteImage ="../".$payData['data']['images'];
        if(file_exists($deleteImage)){
            unlink($deleteImage);
        }
    }
    else
    {
        $finalImage =$payData['data']['images'];
    }

    if($name != '')
    {

        $data = [
            'vdate' => $vdate,
            'images' => $finalImage
        ];

        $result = update('uploads', $payId, $data);
        if($result){
            redirect('uploads.php?id='.$payId,'Updated Successfully');
        }else{
            redirect('payment.php?id='.$payId,'Something went wrong');
        }
    }
    else
    {
        redirect('payment.php?id='.$payId,'Please fill payment required fields');
    }
}

if(isset($_POST['updatePatient']))
{
    $patientId = validate($_POST['patientId']);
    $productData = getById('patients',$patientId);
    if(!$productData){
              redirect('patients.php','No such image found');
    }
    $national_id = validate($_POST['national_id']);
    $name = validate($_POST['pname']);
    $fname = validate($_POST['fname']);
    $regi_date = validate($_POST['regi_date']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $sex = ($_POST['sex'] == 'male' || $_POST['sex'] == 'female') ? validate($_POST['sex']) : '';
    $age = validate($_POST['age']);
    $address = validate($_POST['paddress']);
    $insurance = ($_POST['insurance'] == 'insured' || $_POST['insurance'] == 'uninsured') ? validate($_POST['insurance']) : '';
    $status = isset($_POST['status']) ? 1:0;
    
    if($_FILES['images']['size'] > 0)
    {
        $path = "../assets/uploads/proof";
        $image_ext  = pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);

        $filename = time().'.'.$image_ext;

        move_uploaded_file($_FILES['images']['tmp_name'], $path."/".$filename);
        $finalImage = "assets/uploads/proof/".$filename;

        $deleteImage ="../".$productData['data']['images'];
        if(file_exists($deleteImage)){
            unlink($deleteImage);
        }
    }
    else
    {
        $finalImage =$productData['data']['images'];
    }
    if($name != '')
    {
        $emailCheck = mysqli_query($conn, "SELECT * FROM patients WHERE email='$email' AND id!='$patientId'");
        if($emailCheck){
            if(mysqli_num_rows($emailCheck) > 0){
                redirect('patients-edit.php','Email Already used by another user');
            }
        }

        $data = [
            'national_id' => $national_id,
            'pname' => $name,
            'fname' => $fname,
            'regi_date' => $regi_date,
            'email' => $email, 
            'phone' => $phone, 
            'sex' => $sex,
            'age' => $age,
            'paddress' => $address,
            'insurance' => $insurance,
            'images' => $finalImage,
            'status' => $status
        ];

        $result = update('patients', $patientId, $data);
        if($result){
            redirect('patients-update.php?id='.$patientId,'Your details are successfully updated!');
        }else{
            redirect('patients-edit.php?id='.$patientId,'Something went wrong');
        }
    }
    else
    {
        redirect('patients-edit.php?id='.$patientId,'Please fill patient required fields');
    }
}

?>