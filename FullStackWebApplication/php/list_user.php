<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>List of users</h1>
    <?php
    include_once('functions.php');
    session_start();
    $_SESSION['email_user_detail'] = '';
    $_SESSION['fname_user_detail'] = '';
    $_SESSION['lname_user_detail'] = '';
    if (isset($_POST['manage_user'])) {
        $user_accounts = '../../UserData/UserAccounts/accounts.db';
        $data = retrieve_data($user_accounts);
        echo "<form action='set_detailed_page.php' method='Post' enctype='multipart/form-data'>";
        for ($i = (count($data) - 1); $i >= 0; $i--) {
            $fname = $data[$i]['f_name'];
            $lname = $data[$i]['l_name'];
            $email = $data[$i]['email'];
            $registered_time = $data[$i]['registered_time'];
            $row = <<<USERINFO
                <button type='submit' name='submit' value='$email'>
                    User's first name: $fname; User's last name: $lname; User's email: $email; User's registered time: $registered_time
                </button>
            USERINFO;
            echo $row;
            echo '<br>';
        }
        echo '</form>';
    }
    ?>
</body>
</html>