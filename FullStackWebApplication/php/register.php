<?php
include_once("functions.php");
if (isset($_POST['submit'])) {
    $registerOK = 1;
    date_default_timezone_set('UTC');
    $register_time = date('d/m/Y H:i:s e');
    $fname = clean_text($_POST['f_name']);
    $lname = clean_text($_POST['l_name']);
    $email = clean_text($_POST['email']);
    $password = clean_text($_POST['password']);
    $profile_img = $_FILES['profile_picture'];
    // Verify first name
    if (!check_name($fname)) {
        $registerOK = 0;
    }
    // Verify last name
    if (!check_name($lname)) {
        $registerOK = 0;
    }
    // Verify email
    if (!check_email($email)) {
        $registerOK = 0;
    }
    // Verify password and hash password
    if (check_password($password)) {
        $registerOK = 1;
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $registerOK = 0;
    }
    //  Verify image
    if (!verify_img($profile_img)) {
        $registerOK = 0;
    }
    // Bring the data all together inside an array
    $form_data = [
        'f_name' => $fname,
        'l_name' => $lname,
        'email' => $email,
        'password' => $hashed_password,
        'profile_picture' => $profile_img,
        'registered_time' => $register_time
    ];
    if ($registerOK == 1) {
        upload_img($profile_img);
        if (filesize('../../UserData/UserAccounts/accounts.db') == 0) {
            $first_record = [$form_data];
            $data_to_save = $first_record;
        } else {
            $old_records = json_decode(file_get_contents('../../UserData/UserAccounts/accounts.db'));
            array_push($old_records, $form_data);
            $data_to_save = $old_records;
        }
        if (file_put_contents('../../UserData/UserAccounts/accounts.db', json_encode($data_to_save, JSON_PRETTY_PRINT), LOCK_EX)) {
            echo "<script>alert('Register successfully')</script>";
            header("Location: /FullStackWebApplication/login/login-page.php");
            exit;
            $success = 'Register successfully';
        } else {
            $error = 'Register failed, please try again';
            exit;
        }
    } else {
        echo "<script>alert('Register failed')</script>";
        header("Location: /FullStackWebApplication/login/login-page.php");
        exit;
    }
    
}