<?php
function clean_text($data_string) {
    $data_string = trim($data_string);
    $data_string = stripslashes($data_string);
    $data_string = htmlspecialchars($data_string);
    return $data_string;
}

function check_img_type($image) {
    $img_type = ['jpeg', 'jpg', 'png', 'gif'];
    if (in_array(strtolower(pathinfo($image, PATHINFO_EXTENSION)), $img_type)) {
        return true;
    } else {
        return false;
    }
}

function check_email($email_string) {
    $pattern = "/^[a-zA-Z0-9_\-.]+@[a-zA-Z0-9\-.]+$/i";
    if (preg_match($pattern, $email_string)) {
        return true;
    } else {
        return false;
    }
}

function check_password($password_string) {
    $pattern = "/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(.{8,21})$/";
    if (preg_match($pattern, $password_string)) {
        return true;
    } else {
        return false;
    }
}

function check_name($name_string) {
    if ((strlen($name_string)) > 1 and (strlen($name_string) < 21)) {
        return true;
    } else {
        return false;
    }
}

function check_img_real($img) {
    $check = getimagesize($img["tmp_name"]);
    if ($check !== false) {
        return true;
    } else {
        return false;
    }
}

function check_img_exist($img) {
    if (file_exists($img)) {
        return true;
    } else {
        return false;
    }
}

function check_file_size($img) {
    if ($img["size"] > 10000000) {
        return false;
    } else {
        return true;
    }
} 

function upload_img($img_file) {
    $target_dir = "../../UserData/UploadImage/";
    $target_file = $target_dir . basename($img_file["name"]);
    if (move_uploaded_file($img_file['tmp_name'], $target_file)) {
        echo "<script>alert('Upload successfully')</script>";
    } else {
        echo "<script>alert('Upload failed')</script>";
    }
}

function verify_img($img_file) {
    $target_dir = "../../UserData/UploadImage/";
    $target_file = $target_dir . basename($img_file["name"]);
    if (check_img_real($img_file)) {
        if (!check_img_exist($target_file)) {
            if (check_file_size($img_file)) {
                if (check_img_type($target_file)) {
                    return true;
                } else {
                    echo "<script>alert('Only JPG, JPEG, PNG and GIF files are allowed!')</script>";
                    return false;
                }
            } else {
                echo "<script>alert('Your file is too large!')</script>";
                return false;
            }   
        } else {
            echo "<script>alert('File is already exist!')</script>";
            return false;
        }
    } else {
        echo "<script>alert('File is not an image!')</script>";
        return false;
    }
}
