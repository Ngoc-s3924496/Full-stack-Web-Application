<?php session_start()?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
    <form action="../php/search.php" method="get" enctype="multipart/form-data">
        <input type="text" name = "user_search">
        <input type="submit" name="search">
    </form>
    <?php
        echo "<pre>";
        print_r($_SESSION['result']);
        echo "</pre>";
        $_SESSION['result'] = [];
    ?>
</body>
</html>