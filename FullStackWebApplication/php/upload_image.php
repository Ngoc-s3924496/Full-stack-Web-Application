<?php
include('functions.php');
session_start();
if (isset($_POST['upload'])) {
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $email = $_SESSION['email'];
    $email_name = get_name_via_email($email);   
    $caption = htmlspecialchars($_POST['description']);
    $sharing_level = $_POST['privacy'];
    $upload_image = $_FILES['file_upload'];
    date_default_timezone_set('UTC');
    $database_location = '../../UserData/UserUpload/';
    $posts_location = $database_location . $email_name;
    $posts_database = $posts_location . '/' . 'posts.db';
    $img_database_location = $posts_location . '/' . 'Images' . '/';
    $uploadOK = true;
    

    $post_data = [
        'caption' => $caption,
        'sharing_level' => $sharing_level,
        'created_time' => date('d/m/Y H:i:s e'),
        'created_seconds' => time(),
        'image' => $upload_image
    ];

    if ($uploadOK == true) {
        if (!file_exists($posts_location)) {
            if (mkdir($posts_location . '/', 0777, true)) {
                if (mkdir($img_database_location, 0777, true)) {
                    echo 'yes';
    
                }
            }
        }


        if (filesize($posts_database) == 0) {
            $first_record = [$post_data];
            $data_to_save = $first_record;
        } else {
            $old_records = json_decode(file_get_contents($posts_database));
            array_push($old_records, $post_data);
            $data_to_save = $old_records;
        }
        if (file_put_contents($posts_database, json_encode($data_to_save, JSON_PRETTY_PRINT), LOCK_EX)) {
            if (verify_update_img($upload_image, $img_database_location)) {
                $accounts = retrieve_data($posts_database);
                upload_img($upload_image, $email, $fname, $lname, time(), $database_location);
            }
        } else {
            echo 'failed';
        }
    }
}
