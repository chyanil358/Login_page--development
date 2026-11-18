<?php 
session_start();
$errors=[
    'login'=>$_SESSION['login_error'] ??'',
    'register'=>$_SESSION['register_error'] ??''

];
$activeForm=$_SESSION['active_form'] ?? 'login';
session_unset();
function showError($error){
    return !empty($error) ? "<p class='error-message'> $error</p>": '';
}

function isActiveForm($formName, $activeForm){
    return $formName ===$activeForm ? 'active' : '';
}

?>
<html>
    <head>
        <title>
            welcome
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="form-box <?=isActiveForm('login', $activeForm); ?>" id="login-form">
                <form action="login_register.php" method="post">
                    <h2>login</h2>
                    <?= showError($errors['login']); ?>
                    <input type="email" name="email" placeholder="Email" required><br><br>
                    <input type="password" name="password" placeholder="password" required><br><br>
                    <button type="submit" name="login">login</button><br><br>
                    <p>Don't have an account? <a href="#" onclick="showForm('register-form')">register</a></p>
                </form>

            </div>
            <div class="form-box <?=isActiveForm('register', $activeForm); ?>" id="register-form">
                <form action="login_register.php" method="post">
                    <h2>register</h2>
                    <?= showError($errors['register']); ?>
                    <input type="text" name="name" placeholder="name" required>
                    <input type="email" name="email" placeholder="Email" required><br><br>
                    <input type="password" name="password" placeholder="password" required><br><br>
                    <select name="role" required>
                        <option value="">-select role--</option>
                        <option value="user">user</option>
                        <option value="admin">admin</option>

                    </select><br><br>
                    <button type="submit" name="register">register</button><br><br>
                    <p>Already have an account? <a href="#" onclick="showForm('login-form')">login</a></p>
                </form>

            </div>
        </div>
        <script src="script.js"></script>
    </body>
</html>
