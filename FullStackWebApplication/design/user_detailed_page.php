<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    include_once('../php/functions.php');
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="<?php $dir = '../../UserData/ProfileImages/'; echo get_profile_img_path($_SESSION['email_user_detail'], $_SESSION['fname_user_detail'], $_SESSION['lname_user_detail'], $dir);?>" alt="User's profile image">
    <h1><?php echo $_SESSION['fname_user_detail'] . ' ' . $_SESSION['lname_user_detail'] . "'s detailed page"?></h1>
    <form action="../php/reset_password.php" method="Post" enctype="multipart/form-data">
        <p><?php echo 'Email: ' . $_SESSION['email_user_detail']?></p>
        <br>
        <br>
        <label for="new_password">Enter new password:</label>
        <br>
        <input type="text" name="new_password" id="new_password">
        <button type="submit" name="change">Change password</button>
        <p class="error-message"><?php echo $_SESSION['change_password']; $_SESSION['change_password']= "";?></p>
    </form>
</body>
</html>