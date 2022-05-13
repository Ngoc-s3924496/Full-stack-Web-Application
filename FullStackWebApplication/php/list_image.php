<?php
include_once('functions.php');
if (isset($_POST['manage_image'])) {
    echo "<form action='delete_img_and_post.php' method='post' enctype='multipart/form-data'>";
    $folder = '../../UserData/UserUpload/';
    $user_account = '../../UserData/UserAccounts/accounts.db';
    $data = retrieve_data($user_account);
    $users = [];
    for ($i = 0; $i < count($data); $i++)  {
        $users[] = get_name_via_email($data[$i]['email']);
    }
    for ($i = 0; $i < count($users); $i++) {
        $folder_location = $folder . '/' . $users[$i] . '/Images';
        echo $users[$i] . '<br>';
        if (file_exists($folder_location . '/')) {
            foreach(scandir($folder_location) as $img) {
                $image_location = $folder_location. '/' .$img;
                $post_database = '../../UserData/UserUpload/' . get_name_via_email($data[$i]['email']) . '/posts.db';
                $post_data = retrieve_data($post_database);
                for ($j=0;$j<count($post_data);$j++) {
                    if (explode('@@', explode('.', $img)[0])[1] == $post_data[$j]['created_seconds']) {
                        if (str_contains($post_data[$j]['image']['name'], substr(explode('@', $img)[0], 11))) {
                            echo "<input type='checkbox' name='" . 'deleteimages[]' . "'" . " value='" . $post_data[$j]['created_seconds'] . '@' . get_name_via_email($data[$i]['email']) . '___' . $post_data[$j]['image']['name'] . "'" . ">" . "<img src='" . $image_location . "' alt='User's upload image'>";
                            echo '<pre>';
                            print_r($post_data[$j]['image']);
                            echo '</pre>';
                            break;
                        } else {
                            continue;
                        }
                    } else {
                        continue;
                    }
                }
                echo "<br>";
            }
        } else {
            echo 'no images' . '<br>';
            continue;
        }
    }
    $deletebutton = <<<DELETEBUTTON
        <button type="submit" name="delete">Delete</button>
    DELETEBUTTON;
    echo $deletebutton;
    echo "</form>";
}

