<?php
include_once('functions.php');
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['submit'];
    $user_database = '../../UserData/UserAccounts/accounts.db';
    $image_database = '../../UserData/ProfileImages/';
    $data = retrieve_data($user_database);
    for ($i=0; $i<count($data); $i++) {
        if (strtolower($data[$i]['email']) == strtolower($email)) {
            $fname = $data[$i]['f_name'];
            $lname = $data[$i]['l_name'];
            break;
        }
    }
    echo $email;
    echo $fname . $lname;
    $_SESSION['email_user_detail'] = $email;
    $_SESSION['fname_user_detail'] = $fname;
    $_SESSION['lname_user_detail'] = $lname;
    header('Location: ../user_detailed_page.php');
}