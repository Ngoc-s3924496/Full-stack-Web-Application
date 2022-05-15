<?php
include_once('functions.php');
if (isset($_POST['delete'])) {
    $folder = '../../UserData/UserUpload/';
    $user_account = '../../UserData/UserAccounts/accounts.db';
    $post_file = $folder . 'posts.db';
    $post_database = retrieve_data($post_file);
    $image_folder = $folder . 'Images';
    $data = retrieve_data($user_account);
    $delete_img_array = $_POST['deleteimages'];
    foreach ($delete_img_array as $img) {
        $username = explode('___', (explode('@', $img)[1]))[0];
        $time = explode('@', $img)[0];
        $image_name = explode('___', $img)[1];
        for ($i = 0; $i < count($post_database); $i++) {
            if ($image_name === $post_database[$i]['image']['name']) {
                if (array_splice($post_database, $i, 1)) {
                    echo 'deleted from db' . '<br>';
                } else {
                    echo 'failed to delete from db' . '<br>';
                }
                break;
            }
        }
        if (file_put_contents($post_file, json_encode($post_database, JSON_PRETTY_PRINT), LOCK_EX)) {
            echo 'update db successful' . '<br>';
        } else {
            echo 'update db failed' . '<br>';
        }
        $img_verify_1 = $username . '@@' . $time;
        $img_verify_2 = $image_name;
        foreach (scandir($image_folder) as $post_img) {
            if (str_contains($post_img, $img_verify_1) && str_contains($img_verify_2, substr(explode('@', $post_img)[0], 11))) {
                if (unlink($image_folder . '/' . $post_img)) {
                    echo 'deleted in folder' . '<br>';
                } else {
                    echo 'fail to delete in folder' . '<br>';
                }
                break;
            }
        }
    }
}