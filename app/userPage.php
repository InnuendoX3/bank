<?php

session_start();

if (isset($_POST['send'])) {
    $selected_user_id = $_POST['userId'];
    $_SESSION['login'] = true;
    $_SESSION['id'] = $_POST['userId'];
    //echo $selected_user_id;
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once "./partials/head_jquery.php"; ?>

<body>
    <h1 id="name"></h1>
    <h2>Saldo: <span id="saldo"></span></h2>
    <h3><a href="transfer.php">Make a transfer</a></h3>
    <h3><a href="?q=logout">Logout</a></h3>

    <script>
        // Saves the PHP ID variable to  a JS variable for AJAX function
        let id = <?php echo $selected_user_id ?>
    </script>
    <script src="./scripts/userPage.js"></script>
</body>
</html>