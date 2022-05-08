<?php
include_once("functions.php");
if (isset($_POST['login'])) {
    session_start();
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $unique_mail_id = $ip_address . '_email';
    $unique_fname_id = $ip_address . '_fname';
    $unique_lname_id = $ip_address . '_lname';
    global $error_login;
    $email = clean_text($_POST['email_login']);
    $password = clean_text($_POST['password_login']);
    $user_database_path = '../../UserData/UserAccounts/accounts.db';
    $data = retrieve_data($user_database_path);
    $_SESSION[$unique_mail_id] = $email;
    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $error_login = $ipaddress . '_error_login';
    if (check_email_password_matched($email, $password, $user_database_path)) {
        for ($i = 0; $i <= count($data); $i++) {
            foreach ($data[$i] as $key => $value) {
                if (strtolower($email) === strtolower($data[$i]['email'])) {
                    $fname = $data[$i]['f_name'];
                    $lname = $data[$i]['l_name'];
                    $_SESSION[$unique_fname_id] = $fname;
                    $_SESSION[$unique_lname_id] = $lname;
                    break;
                }
            }
        }
        header("Location: /FullStackWebApplication/design/profile_page.php");
    } else {
        $_SESSION[$error_login] = 'Wrong email or password!';
        header("Location: /FullStackWebApplication/login/login-page.php");
    }
}






