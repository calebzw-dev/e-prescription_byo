<?php 
include('config/function.php');

if(isset($_POST['saveAdmin']))
{
      $name = validate($_POST['name']);
      $email = validate($_POST['email']);
      $password = validate($_POST['password']);
      $phone = validate($_POST['phone']);
      $admin = isset($_POST['admin']) == true ? 1:0;
      $doctor = isset($_POST['doctor']) == true ? 1:0;
      $patient = isset($_POST['patient']) == true ? 1:0;
      $is_ban = isset($_POST['is_ban']) == true ? 1:0;

if($name != '' && $email != '' && $password != ''){

$emailCheck = mysqli_query($conn,"SELECT * FROM admins WHERE email='$email'");
if($emailCheck){
    if(mysqli_num_rows($emailCheck) > 0){
        
        redirect('register.php','Email Already used by another user');
        }
    }

    $bcrypt_password = password_hash($password, PASSWORD_BCRYPT);

    $data = [
        'name' => $name,
        'email' => $email, 
        'password' => $bcrypt_password, 
        'phone' => $phone,  
        'admin' => $admin,
        'doctor' => $doctor,
        'patient' => $patient,
        'is_ban' => $is_ban
                        
    ];
    $result = insert('admins',$data);

    if($result){
        redirect('register.php','Registration Created Successfully');
    }else{
        redirect('register.php','Something went wrong!');
    }

}else{
    redirect('register.php','Please fill required fields.');
}
}

?>