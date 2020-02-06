<?php

include '../classes/Db.php';
include '../classes/User.php';
include '../classes/Account.php';
include '../classes/Transfer.php';


if (isset($_POST['send'])) {
    $bigUserId = $_POST['bigUserId'];
    $subUserId = $_POST['subUserId'];
    $amount = $_POST['amount'];
}

/* echo "<pre>";
print_r($_POST);
echo "</pre>"; */

// Create database
$db = new DataBase();

// Create User and Account: User that logged in.
$bigUser = new User($db);
$bigUser->constructUser($bigUserId);
$bigUserAccount = new Account($bigUser);

// Create User and Account: User choosed to transfer
$subUser = new User($db);
$subUser->constructUser($subUserId);
$subUserAccount = new Account($subUser);

// Create transfer
$transferencia = new Transfer($bigUserAccount, $subUserAccount, $amount, $db);

// Some variables to print out on $message
$currency = $bigUserAccount->getCurrency();
$toAccountId = $subUserAccount->getAccountId();
$balance = $bigUserAccount->getBalance();

$message = '';

// If enough money... do transfer. Save message.
if ($transferencia->isSaldoEnough()) {
    $transferencia->makeTransfer();

    $message = "You transfered $amount $currency to 
                account nr. $toAccountId";
} else {
    $message = "You cannot transfer $amount $currency. 
                Your balance is: $balance $currency";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transfer</title>
</head>
<body>
    <p><?php echo $message ?></p>
    <a href="/bank/app/userPage.php">Go back</a>
    
</body>
</html>

