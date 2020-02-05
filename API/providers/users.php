<?php

include '../classes/Db.php';
include '../classes/User.php';
header('Content-Type: application/json');

$db = new DataBase();
$user = new User($db);
$users = $user->getAllUsersEver();

if ($users["response"] == 200) {
    http_response_code(200);
    echo json_encode($users);
} else {
    http_response_code(404);
    // Records should have an Not Found message
    echo json_encode($users);
}
