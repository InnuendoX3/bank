<?php

include '../classes/Db.php';
include '../classes/User.php';
include '../classes/Account.php';
header('Content-Type: application/json');

$db = new DataBase();
$user = new User($db);
$user->constructUser(9);
$cuenta = new Account($user);
echo $cuenta->getBalance();

//print_r($user->constructUser(9));
