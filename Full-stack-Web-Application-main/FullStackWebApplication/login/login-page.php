<html lang="en">
<?php session_start()?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="css\login.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1>InstaKilogram</h1>
            <form action="../php/login.php" method="post" enctype="multipart/form-data">
                <?php require_once('../php/login.php')?>
                <div class="control">
                    <label for="username">Username</label>
                    <input type="text" name="email_login" id="name">
                </div>
                <div class="control">
                    <label for="password">Password</label>
                    <input type="password" name="password_login" id="password">
                </div>
                <div class="control">
                    <input type="submit" name='login' value="Login">
                </div>
            </form>
            <p><?php 
                $ipaddress = $_SERVER['REMOTE_ADDR'];
                $error_login = $ipaddress . '_error_login';
                if ($_SESSION[$error_login]) {echo $_SESSION[$error_login]; $_SESSION[$error_login] = '';}
            ?></p>
            <div class="link">
                <a href="register-page.php">Don't have an account? Register here.</a>
            </div>
        </div>
    </div>
</body>
</html>