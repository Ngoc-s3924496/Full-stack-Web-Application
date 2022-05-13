<?php
include_once("functions.php");
if (isset($_POST['save'])) {
    session_start();
    // $ipaddress = $_SERVER['REMOTE_ADDR'];
    // $unique_mail_id = $ipaddress . '_email';
    // $unique_fname_id = $ipaddress . '_fname';
    // $unique_lname_id = $ipaddress . '_lname';
    $email = $_SESSION['email'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    // $update_profile_img_status = $ipaddress . '_update_img_status';
    $uploadOK = 1;
    $new_img = $_FILES['change_img'];
    $user_database = "../../UserData/UserAccounts/accounts.db";
    $data = retrieve_data($user_database);
    $img_database = "../../UserData/ProfileImages/";
    $file = substr($email, 0, strpos($email, '@'));
    $file_path = $img_database . $file . '/' . '*';
    $file_location = glob($file_path);
    for ($i = 0; $i <= count($data); $i++) {
        if (strtolower($email) === strtolower($data[$i]['email'])) {
            if (!empty($file_location)) {
                if (verify_update_img($new_img, $img_database)) {
                    foreach ($file_location as $file_img) {
                        if (unlink($file_img)) {
                            $uploadOK = 1;
                            break;
                        } else {
                            $uploadOK = 0;
                        }
                    }
                    if ($uploadOK) {
                        if (update_img_profile($new_img, $email, $fname, $lname, $img_database)) {
                            $_SESSION[$update_profile_img_status] = 'Profile picture is updated!';
                            header('Location: /FullStackWebApplication/design/profile_page.php');
                        }
                    } else {
                        $_SESSION[$update_profile_img_status] = 'Profile picture cannot be updated!';
                        header('Location: /FullStackWebApplication/design/profile_page.php');
                    }
                    break;
                } else {
                    $_SESSION[$update_profile_img_status] = $_SESSION[$error_update_img];
                    header('Location: /FullStackWebApplication/design/profile_page.php');
                }
            } else {
                if (verify_update_img($new_img, $img_database)) {
                    if (update_img_profile($new_img, $email, $fname, $lname, $img_database)) {
                        $_SESSION[$update_profile_img_status] = 'Profile picture is updated!';
                        header('Location: /FullStackWebApplication/design/profile_page.php');
                    }
                } else {
                    $_SESSION[$update_profile_img_status] = $_SESSION[$error_update_img];
                    header('Location: /FullStackWebApplication/design/profile_page.php'); 
                }
            }
        } else {
            continue;
        }
    }
}