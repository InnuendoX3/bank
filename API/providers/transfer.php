<?php

include '../classes/Db.php';
include '../classes/User.php';
include '../classes/Account.php';
include '../classes/Transfer.php';
header('Content-Type: application/json');

$db = new DataBase();
$user1 = new User($db);
$user1->constructUser(9);
$cuenta1 = new Account($user1);
$user2 = new User($db);
$user2->constructUser(3);
$cuenta2 = new Account($user2);
echo $cuenta1->getUserId() . PHP_EOL;
echo $cuenta1->getBalance() . $cuenta1->getCurrency() . PHP_EOL;
echo $cuenta2->getUserId() . PHP_EOL;
echo $cuenta2->getBalance() . $cuenta2->getCurrency() . PHP_EOL;

$transferencia = new Transfer($cuenta1, $cuenta2, 50099, $db);
if ($transferencia->isSaldoEnough()) {
    $transferencia->makeTransfer();
    echo "Es suficiente";
} else {
    echo "No es suficiente";
}


//print_r($user->constructUser(9));
