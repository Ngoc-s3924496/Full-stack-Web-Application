<?php
include_once('functions.php');
if (isset($_GET['search'])) {
    $userAccountFolder = '../../UserData/UserAccounts/accounts.db';
    $data = retrieve_data($userAccountFolder);
    $_SESSION['result'] = [];
    $user_search = clean_text($_GET['user_search']);
    for ($i=0;$i<=count($data);$i++) {
        $resultOK = 1;
        foreach ($data[$i] as $key => $value) {
            if (str_contains(strtolower($data[$i]['f_name']), strtolower($user_search))) {
                $_SESSION['result'][] = [$data[$i]['f_name'],$data[$i]['l_name']];
                break;
            }
            if (str_contains(strtolower($data[$i]['l_name']), strtolower($user_search))) {
                $_SESSION['result'][] = [$data[$i]['f_name'],$data[$i]['l_name']];
                break;
            }
            if (str_contains(strtolower($data[$i]['email']), strtolower($user_search))) {
                $_SESSION['result'][] = [$data[$i]['f_name'],$data[$i]['l_name']];
                break;
            }
            if (str_contains(strtolower(get_name_via_email($data[$i]['email'])), strtolower($user_search))) {
                $_SESSION['result'][] = [$data[$i]['f_name'],$data[$i]['l_name']];
                break;
            }
        }
    }
    if (empty($_SESSION['result'])) {
        $_SESSION['result'] = 'No results';
    }
    header("Location: ../design/testing.php");

}