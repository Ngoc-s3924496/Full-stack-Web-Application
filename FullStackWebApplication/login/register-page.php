<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css\register.css">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1>InstaKilogram</h1>
            <form action="../php/register.php" method="post" enctype="multipart/form-data">
                <?php require_once '../php/register.php'?>
                <div class="control">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" placeholder="Your Email" required
                        oninput="continuousValidateEmail()" />
                    <p class="error"><?php
                            $ipaddress = $_SERVER['REMOTE_ADDR'];
                            $error_email = $ipaddress . '_error_email';
                            $error_email_duplication = $ipaddress . '_error_email_duplication';
                            if ($_SESSION[$error_email]) {echo $_SESSION[$error_email]; $_SESSION[$error_email] = '';}
                            if ($_SESSION[$error_email_duplication]) {echo $_SESSION[$error_email_duplication]; $_SESSION[$error_email_duplication] = '';}
                    ?></p>
                </div>
                <div class="control">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="Your Password" required
                        oninput="continuousValidatePassword()" />
                    <p class="error"><?php
                            $ipaddress = $_SERVER['REMOTE_ADDR'];
                            $error_password = $ipaddress . '_error_password';
                            if ($_SESSION[$error_password]) {echo $_SESSION[$error_password]; $_SESSION[$error_password] = '';}
                    ?></p>
                </div>
                <div class="control">
                    <label for="retype_password">Retype Password</label>
                    <input id="retype_password" type="password" name="retype_password" placeholder="Retype Password"
                        required oninput="continuousValidatePassword()" />
                </div>
                <div class="control">
                    <label for="f_name">First Name</label>
                    <input class="input-box" id="f_name" type="text" name="f_name" placeholder="First Name"
                        oninput="continuousValidateFirstName()" />
                    <p class="error"><?php
                            $ipaddress = $_SERVER['REMOTE_ADDR'];
                            $error_fname = $ipaddress . '_error_fname';
                            if ($_SESSION[$error_fname]) {echo $_SESSION[$error_fname]; $_SESSION[$error_fname] = '';}
                    ?></p>
                </div>
                <div class="control">
                    <label for="l_name">Last Name</label>
                    <input class="input-box" id="l_name" type="text" name="l_name" placeholder="Last Name"
                        oninput="continuousValidateLastName()" />
                    <p class="error"><?php
                            $ipaddress = $_SERVER['REMOTE_ADDR'];
                            $error_lname = $ipaddress . '_error_lname';
                            if ($_SESSION[$error_lname]) {echo $_SESSION[$error_lname]; $_SESSION[$error_lname] = '';}
                    ?></p>
                </div>
                <div class="control">
                    <label for="password">Profile Picture</label>
                    <input id="profile-upload" type="file" name="profile_picture" required />
                    <p class="error"><?php
                        $ipaddress = $_SERVER['REMOTE_ADDR'];
                        $error_upload_img = $ipaddress . '_error_upload_img';
                        if ($_SESSION[$error_upload_img]) {echo $_SESSION[$error_upload_img]; $_SESSION[$error_upload_img] = '';}
                    ?></p>
                </div>
                <div class="control">
                    <button class="input-box" type="reset" id="reset" onclick="resetValidate()">
                        Clear
                    </button>
                    <button class="input-box" type="submit" id="submit">
                        Register
                    </button>
                </div>
            </form>
            <?php 
            $ipaddress = $_SERVER['REMOTE_ADDR'];
            $error = $ipaddress . '_error';
            $success = $ipaddress . '_success';
            if ($_SESSION[$success]) {echo "<script>alert(" . $_SESSION[$success] . ")</script>"; $_SESSION[$success] = '';}
            if ($_SESSION[$error]) {echo "<script>alert(" . $_SESSION[$error] . ")</script>"; $_SESSION[$error] = '';}
            ?>
            <div class="link">
                <a href="login-page.php">I want to log in</a>
            </div>
        </div>
    </div>
</body>
<script src="js\register.js"></script>
</html>