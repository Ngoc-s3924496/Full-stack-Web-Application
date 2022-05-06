<html lang="en">
<?php session_start()?>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log In</title>
    <link rel="stylesheet" href="\css\login-page.css" />
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="inner-box" id="card">
                <div class="card-front">
                    <h2>LOGIN</h2>
                    <form action="../php/login.php" method="post" enctype="multipart/form-data">
                        <?php require_once('../php/login.php')?>
                        <input type="text" name="email_login" class="input-box" placeholder="Your Email" required />
                        <input type="password" name="password_login" class="input-box" placeholder="Your Password" required />
                        <button type="submit" class="submit-btn" name="login">Log In</button>
                    </form>
                    <br>
                    <p><?php 
                        $ipaddress = $_SERVER['REMOTE_ADDR'];
                        $error_login = $ipaddress . '_error_login';
                        if ($_SESSION[$error_login]) {echo $_SESSION[$error_login]; $_SESSION[$error_login] = '';}
                    ?></p>
                    <br>
                    
                    <button type="button" class="btn" onclick="openRegister()">
                        Don't have an account? Register here
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="\js\login-page.js"></script>
</body>
</html>
