<?php
include_once("functions.php");
if (isset($_POST['login'])) {
    session_start();
    global $error_login;
    $email = clean_text($_POST['email_login']);
    $password = clean_text($_POST['password_login']);
    $user_database_path = '../../UserData/UserAccounts/accounts.db';
    $data = retrieve_data($user_database_path);
    $_SESSION['email'] = $email;
    if (check_email_password_matched($email, $password, $user_database_path)) {
        for ($i = 0; $i <= count($data); $i++) {
            foreach ($data[$i] as $key => $value) {
                if (strtolower($email) === $data[$i]['email']) {
                    $fname = $data[$i]['f_name'];
                    $lname = $data[$i]['l_name'];
                    $_SESSION['fname'] = $fname;
                    $_SESSION['lname'] = $lname;
                    break;
                }
            }
        }
        header("Location: /FullStackWebApplication/design/profile_page.php");
    } else {
        $error_login = 'Wrong email or password!';
        header("Location: /FullStackWebApplication/login/login-page.php");
    }
}






