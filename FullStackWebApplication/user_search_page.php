<?php session_start()?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
    <form action="php/search.php" method="get" enctype="multipart/form-data">
        <input type="text" name = "user_search">
        <input type="submit" name="search">
    </form>
    <?php
        $_SESSION['email_user_detail'] = '';
        $_SESSION['fname_user_detail'] = '';
        $_SESSION['lname_user_detail'] = '';
        echo "<form action='php/set_detailed_page.php' method='post' enctype='multipart/form-data'>";
        for ($i = 0; $i < (count($_SESSION['search-result'])); $i++) {
            foreach ($_SESSION['search-result'] as $key => $value) {
                $fname = $_SESSION['search-result'][$i]['fname'];
                $lname = $_SESSION['search-result'][$i]['lname'];
                $email = $_SESSION['search-result'][$i]['email'];
                $result = <<<SEARCHRESULT
                    <button type='submit' name='submit' value='$email'>
                        User's name: $fname $lname; User's email: $email
                    </button>
                SEARCHRESULT;
                echo $result . "<br>";
                break;
            }
        }
        echo '</form>';
        $_SESSION['search-result'] = [];
    ?>
</body>
</html>