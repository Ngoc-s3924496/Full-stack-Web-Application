<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../php/change_image.php" method="post" enctype="multipart/form-data">
        <input type="file" name="change_img" value="Change profile image">
        <input type="submit" name="save" value="Save">
        <button type="button" id='open'>Log Out</button>
        <div id="modal_container">
            <div>
                <p>Are you sure you want to log out?</p>
                <button type="button" id="close">Cancel</button>
                <button type="button"><a href="../php/logout.php">Log Out</a></button>
            </div>
        </div>
        <br>
        <p><?php 
            $ipaddress = $_SERVER['REMOTE_ADDR'];
            $update_profile_img_status = $ipaddress . '_update_img_status';
            if ($_SESSION[$update_profile_img_status]) {echo $_SESSION[$update_profile_img_status]; $_SESSION[$update_profile_img_status] = '';}
            ?></p>
    </form>
    <script src="logout.js"></script>
</body>
</html>