<?php 

session_strart();
require_once 'config.php';

if(isset($_POST['register'])) {
    $name =$_POST['name'];
    $email=$_POST['email'];
    $password =password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role =$_POST['role'];

    $checkemail = $conn ->query("SELECT email FROM users WHERE email='$email'");
    if($check->num_rows >0){
        $_SESSION['register_error'] = "Email already exists";
        $_SESSION['active_form'] = 'register';

    } else {
        $conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
    }
    header("Location: index.php");
    exit();
}
?>