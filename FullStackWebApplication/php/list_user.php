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
    session_start();
    include_once('functions.php');
    if (isset($_POST['manage_user'])) {
        $user_accounts = '../../UserData/UserAccounts/accounts.db';
        $data = retrieve_data($user_accounts);
        for ($i=0; $i < count($data); $i++) {
            foreach ($data[$i] as $value) {
                $fname = $data[$i]['f_name'];
                $lname = $data[$i]['l_name'];
                $email = $data[$i]['email'];
                $_SESSION['fname_user_detail'] = $fname;
                $_SESSION['lname_user_detail'] = $lname;
                $_SESSION['email_user_detail'] = $email;
                $row = <<<USERINFO
                    <a href='../design/user_detailed_page.php'>User first name:$fname, User last name:$lname, User email:$email</a>
                USERINFO;
                echo $row;
                echo '<br>';
                break;
            }
        }
    }
    ?>
</body>
</html>