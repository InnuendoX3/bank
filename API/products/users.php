<?php

include '../classes/Db.php';

$dbConnected = new DataBase();
$results = $dbConnected->getAllUsers();

if($results["response"] == 200) {
    http_response_code(200);
    echo json_encode($results["records"]);
} else {
    http_response_code(404);
    // Records should have an Not Found message
    echo json_encode($results["records"]);
}





