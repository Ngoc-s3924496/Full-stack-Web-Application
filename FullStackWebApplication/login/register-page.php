<html lang="en">

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
                <!-- <div class="card-front">
                    <h2>LOGIN</h2>
                    <form action="../php/login.php" method="post" enctype="multipart/form-data">
                        <?php require_once('../php/login.php');?>
                        <input type="text" name="email_login" class="input-box" placeholder="Your Email" required />
                        <input type="password" name="password_login" class="input-box" placeholder="Your Password" required />
                        <button type="submit" class="submit-btn" name="login">Log In</button>
                    </form>
                    
                    <button type="button" class="btn" onclick="openRegister()">
                        Don't have an account? Register here
                    </button>
                </div> -->
                <div class="card-back">
                    <h2>REGISTER</h2>
                    <form action="../php/register.php" method="post" enctype="multipart/form-data">
                        <?php 
                            require_once '../php/register.php';
                        ?>
                        <input class="input-box" id="email" type="email" name="email" placeholder="Your Email"
                            required oninput="continuousValidateEmail()" />
                        <p class="error"><?php echo $error_email?></p>
                        <p class="error"><?php echo $error_email_duplication?></p>

                        <input class="input-box" id="password" type="password" name="password"
                            placeholder="Your Password" required oninput="continuousValidatePassword()"/>
                        <p class="error"><?php echo $error_password?></p>
                        
                        <input class="input-box" id="retype_password" type="password" name="retype_password"
                            placeholder="Retype Password" required oninput="continuousValidatePassword()"/>
                        
                        <input class="input-box" id="f_name" type="text" name="f_name" placeholder="First Name" oninput="continuousValidateFirstName()"/>
                        <p class="error"><?php echo $error_fname?></p>

                        <input class="input-box" id="l_name" type="text" name="l_name" placeholder="Last Name" oninput="continuousValidateLastName()"/>
                        <p class="error"><?php echo $error_lname?></p>

                        <input class="input-box" id="profile-upload" type="file" name="profile_picture" onchange="fileValidation()" placeholder="Profile Picture"/>
                        <p class="error"><?php echo $error_image?></p>
                            
                        <button class="input-box" type="reset" id="reset" onclick="resetValidate()">Clear</button>
                        <button class="input-box" name="submit" type="submit" id="submit">Register</button>
                    </form>
                    <button type="button" class="btn" onclick="openLogin()" id="back-btn">
                        Go Back
                    </button>
                    <div>
                        <p class="error"><?php echo $error?></p>
                        <p class="success"><?php echo $success?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="\js\login-page.js"></script>
</body>
<!-- <script>
var fileInput = document.getElementById('profile-upload');
      
 function fileValidation() {
     
    var filePath = fileInput.value;
    
    // Allowing file type
    var allowedExtensions = 
            /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    alert(filePath);
    alert(filePath.substr(filePath.lastIndexOf('\\') + 1));
        
    if (!allowedExtensions.exec(filePath)) {
        alert('Invalid file type');
        fileInput.value = '';
        alert(filePath);
        return false;
    } 
}
</script> -->
</html>
