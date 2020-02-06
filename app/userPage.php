<?php

session_start();

if (isset($_POST['send'])) {
    $_SESSION['login'] = true;
    $_SESSION['id'] = $_POST['userId'];
}
$selected_user_id = $_SESSION['id'];

/* echo "<pre>";
print_r($_POST);
echo "</pre>"; */

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once "./partials/head_jquery.php"; ?>

<body>
    <h1 id="name"></h1>
    <a href="/bank/app/login.php?q=logout">Logout</a>
    <h2>Saldo: <span id="saldo"></span></h2>
    <form action="/bank/API/providers/transfer.php" method="post">
        <label>Select recipient </label>
        <select name="subUserId" id="usersDropdown">
            <option value="" disabled selected>Choose an user</option>
            <!-- Here AJAX gets the users -->
        </select>
        <br>
        <p>Account nr. <span id="account"></span></p>
        <p>Mobilephone: <span id="phone"></span></p>
        <label for="amount">Enter amount </label>
        <input type="number" name="amount" id="">
        <input type="hidden" name="bigUserId" value="<?php echo $_SESSION['id'] ?>">
        <input type="submit" id="botoncito" value="transfer" name="send"> 
    </form>

    <script>
        // Saves the PHP ID variable to  a JS variable for AJAX function
        let idFromLogin = <?php echo $selected_user_id ?> // Try Session UserID ?
    </script>
    <script src="./scripts/userPage.js"></script>

    <?php require_once "./partials/scripts_jqueryB.php "; ?>
</body>
</html>