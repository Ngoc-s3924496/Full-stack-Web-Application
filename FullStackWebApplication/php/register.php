<?php
include_once("functions.php");
if (isset($_POST['submit'])) {
    session_start();
    $registerOK = 1;
    date_default_timezone_set('UTC');
    $register_time = date('d/m/Y H:i:s e');
    $fname = clean_text($_POST['f_name']);
    $lname = clean_text($_POST['l_name']);
    $email = clean_text($_POST['email']);
    $password = clean_text($_POST['password']);
    $profile_img = $_FILES['profile_picture'];
    $user_img_database = "../../UserData/ProfileImages/";
    $user_account_database = '../../UserData/UserAccounts/accounts.db';
    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $success = $ipaddress . "_success";
    $error = $ipaddress . '_error';

    // Verify first name
    if (!check_name($fname)) {
        $registerOK = 0;
        $error_fname = $ipaddress . '_error_fname';
        $_SESSION[$error_fname] = 'First name must have more than 1 and less than 22 characters!';
    }

    // Verify last name
    if (!check_name($lname)) {
        $registerOK = 0;
        $error_lname = $ipaddress . "_error_lname";
        $_SESSION[$error_lname] = 'Last name must have more than 1 and less than 22 characters!';
    }

    // Verify email
    if (!check_email($email)) {
        $registerOK = 0;
        $error_email = $ipaddress . '_error_email';
        $_SESSION[$error_email] = 'Email is in uncorrect format';
    }

    // Check email duplications
    if (check_email_duplicated($email, $user_account_database)) {
        $registerOK = 0;
        $error_email_duplication = $ipaddress . '_error_email_duplication';
        $_SESSION[$error_email_duplication] = 'Email is already used';
    }

    // Verify password and hash password
    if (check_password($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $registerOK = 0;
        $error_password = $ipaddress . '_error_password';
        $_SESSION[$error_password] = 'Password is not strong enough';
    }

    //  Verify image
    if ($profile_img['size'] > 0 && $profile_img['error'] == 0) {
        $target_file = $user_img_database . basename($img_file["name"]);
        $error_upload_img = $ipaddress . '_error_upload_img';
        if (check_img_real($profile_img)) {
            if (!check_img_exist($target_file)) {
                if (check_file_size($profile_img)) {
                    if (!check_img_type($target_file)) {
                        $_SESSION[$error_upload_img] = 'Only JPG, JPEG, PNG and GIF files are allowed!';
                        $registerOK = 0;
                    }
                } else {
                    $_SESSION[$error_upload_img] = 'Your file is too large!';
                    $registerOK = 0;
                }   
            } else {
                $_SESSION[$error_upload_img] = 'File is already exist!';
                $registerOK = 0;
            }
        } else {
            $_SESSION[$error_upload_img] = 'File is not an image!';
            $registerOK = 0;
        }
    }

    // Bring the data all together inside an array
    $form_data = [
        'f_name' => $fname,
        'l_name' => $lname,
        'email' => $email,
        'password' => $hashed_password,
        'registered_time' => $register_time
    ];
    if ($registerOK == 1) {
        upload_img_profile($profile_img, $email, $fname, $lname, $user_img_database);
        if (filesize($user_account_database) == 0) {
            $first_record = [$form_data];
            $data_to_save = $first_record;
        } else {
            $old_records = json_decode(file_get_contents($user_account_database));
            array_push($old_records, $form_data);
            $data_to_save = $old_records;
        }
        if (file_put_contents($user_account_database, json_encode($data_to_save, JSON_PRETTY_PRINT), LOCK_EX)) {
            $_SESSION[$success] = 'Register successfully!';
            header("Location: /FullStackWebApplication/login/login-page.php");
        } else {
            $_SESSION[$error] = 'Register failed, please try again!';
            header("Location: /FullStackWebApplication/login/register-page.php");
        }
    } else {
        $_SESSION[$error] = 'Register failed, please check your information again!';
        header("Location: /FullStackWebApplication/login/register-page.php");
    }
}