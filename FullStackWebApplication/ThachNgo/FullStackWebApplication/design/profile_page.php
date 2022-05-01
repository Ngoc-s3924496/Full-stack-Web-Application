<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../php/change_image.php" method="post" enctype="multipart/form-data">
        <?php include_once('change_image.php') ?>
        <input type="file" name="change_img" value="Change profile image">
        <input type="submit" name="save" value="Save">
        <br>
        <p><?php echo $update_img_profile ?></p> 
    </form>
</body>
</html>