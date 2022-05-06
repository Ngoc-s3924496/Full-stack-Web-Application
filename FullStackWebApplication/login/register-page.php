<html lang="en">
<?php session_start() ?>
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
                <div class="card-back">
                    <h2>REGISTER</h2>
                    <form action="../php/register.php" method="post" enctype="multipart/form-data">
                        <?php require_once '../php/register.php'?>
                        <input class="input-box" id="email" type="email" name="email" placeholder="Your Email"
                            required oninput="continuousValidateEmail()" />
                        <p class="error"><?php
                                            $ipaddress = $_SERVER['REMOTE_ADDR'];
                                            $error_email = $ipaddress . '_error_email';
                                            $error_email_duplication = $ipaddress . '_error_email_duplication';
                                            if ($_SESSION[$error_email]) {echo $_SESSION[$error_email]; $_SESSION[$error_email] = '';}
                                            if ($_SESSION[$error_email_duplication]) {echo $_SESSION[$error_email_duplication]; $_SESSION[$error_email_duplication] = '';}
                                        ?></p>

                        <input class="input-box" id="password" type="password" name="password"
                            placeholder="Your Password" required oninput="continuousValidatePassword()"/>
                            <p class="error"><?php
                                            $ipaddress = $_SERVER['REMOTE_ADDR'];
                                            $error_password = $ipaddress . '_error_password';
                                            if ($_SESSION[$error_password]) {echo $_SESSION[$error_password]; $_SESSION[$error_password] = '';}
                                        ?></p>
                        
                        <input class="input-box" id="retype_password" type="password" name="retype_password"
                            placeholder="Retype Password" required oninput="continuousValidatePassword()"/>
                        
                        <input class="input-box" id="f_name" type="text" name="f_name" placeholder="First Name" oninput="continuousValidateFirstName()"/>
                        <p class="error"><?php
                                            $ipaddress = $_SERVER['REMOTE_ADDR'];
                                            $error_fname = $ipaddress . '_error_fname';
                                            if ($_SESSION[$error_fname]) {echo $_SESSION[$error_fname]; $_SESSION[$error_fname] = '';}
                                        ?></p>

                        <input class="input-box" id="l_name" type="text" name="l_name" placeholder="Last Name" oninput="continuousValidateLastName()"/>
                        <p class="error"><?php
                                            $ipaddress = $_SERVER['REMOTE_ADDR'];
                                            $error_lname = $ipaddress . '_error_lname';
                                            if ($_SESSION[$error_lname]) {echo $_SESSION[$error_lname]; $_SESSION[$error_lname] = '';}
                                        ?></p>

                        <input class="input-box" id="profile-upload" type="file" name="profile_picture" onchange="fileValidation()" placeholder="Profile Picture"/>
                        <p class="error"><?php
                                            $ipaddress = $_SERVER['REMOTE_ADDR'];
                                            $error_upload_img = $ipaddress . '_error_upload_img';
                                            if ($_SESSION[$error_upload_img]) {echo $_SESSION[$error_upload_img]; $_SESSION[$error_upload_img] = '';}
                                        ?></p>
                            
                        <button class="input-box" type="reset" id="reset" onclick="resetValidate()">Clear</button>
                        <button class="input-box" name="submit" type="submit" id="submit">Register</button>
                    </form>
                    <button type="button" class="btn" onclick="openLogin()" id="back-btn">
                        Go Back
                    </button>
                    <?php 
                        $ipaddress = $_SERVER['REMOTE_ADDR'];
                        $error = $ipaddress . '_error';
                        $success = $ipaddress . '_success';
                        if ($_SESSION[$success]) {echo "<script>alert(" . $_SESSION[$success] . ")</script>"; $_SESSION[$success] = '';}
                        if ($_SESSION[$error]) {echo "<script>alert(" . $_SESSION[$error] . ")</script>"; $_SESSION[$error] = '';}
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="\js\login-page.js"></script>
</body>
</html>
