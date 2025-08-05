<?php  
session_abort();

$errors =[ 'login' => $_SESSION['login_error'] ?? '', 
           'register' => $_SESSION['register_error'] ?? ''
];

$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error){
    return !empty($error)? "<p class ='error_message'>$error</p>" : '';
}

function isActiveForm ($formName, $activeForm){
    return $formName === $activeForm ? 'active' : '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full-stack Login & Register Form With & Admin Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div class="container">
   <div class="form-box active" <?= isActiveForm('login',$activeForm);?> id="login-form">

    <form action="login_register.php" method="post">
        <h2>Login</h2>
        <?php= showError($errors['login',$activeForm]); ?>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="password" required>
        <button type="submit" name="login">Login</button>
        <p>Don't have an account ? <a href="#" onclick="showForm('register-form')">Register</a></p>
    </form>
   </div>

   <div class="form-box" <?= isActiveForm('register',$activeForm); ?> id="register-form">

    <form action="login_register.php" method ="post">
        <h2>Register</h2>
        <?= showError($errors['register']); ?>
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="password" required>
        <select name="role" required>
            <option value="" >--Select Role--</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit" name="register">Register</button>
        <p>Already have an account ? <a href="#" onclick="showForm('login-form')">Login</a></p>
    </form>
   </div>
    </div>
    
    <script src="script.js"></script>
</body>
</html>