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
    <a href="/bank/app/login.php?q=logout">Logout</a>
    <h2>Saldo: <span id="saldo"></span></h2>
    <!-- <h3><a href="transfer.php">Make a transfer</a></h3> -->
    <form action="/userPage.php" method="post">
        <select name="userId" id="usersDropdown">
            <option value="" disabled selected>Choose an user</option>
            <!-- Here AJAX gets the users -->
        </select>
        
        <input type="submit" id="botoncito" value="Login" name="send"> 
    </form>

    <script>
        // Saves the PHP ID variable to  a JS variable for AJAX function
        let id = <?php echo $selected_user_id ?>
    </script>
    <script src="./scripts/userPage.js"></script>
</body>
</html>