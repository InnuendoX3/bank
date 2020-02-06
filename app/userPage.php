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

<body class="row d-flex justify-content-center text-center">
    <div class="mt-5">
    <h1 id="name"></h1>
    <a href="/bank/app/login.php?q=logout">Logout</a>
    <h2>Saldo: <span id="saldo"></span></h2>
    <form action="/bank/API/providers/transfer.php" method="post">
        <div class="form-group">
            <label>Select recipient </label>
            <select name="subUserId" id="usersDropdown" class="form-control">
                <option value="" disabled selected>Choose an user</option>
                <!-- Here AJAX gets the users -->
            </select>
        </div>
        <p> <strong>Account nr. </strong><span id="account">---</span></p>
        <p> <strong>Mobilephone: </strong><span id="phone">---</span></p>
        <div class="form-group">
            <label for="amount">Enter amount </label>
            <input type="number" name="amount" class="form-control">
        </div>
        <input type="hidden" name="bigUserId" value="<?php echo $_SESSION['id'] ?>">
        <input type="submit" id="botoncito" value="transfer" name="send" class="form-control btn btn-primary"> 
    </form>
    </div>

    <script>
        // Saves the PHP ID variable to  a JS variable for AJAX function
        let idFromLogin = <?php echo $selected_user_id ?> // Try Session UserID ?
    </script>
    <script src="./scripts/userPage.js"></script>

    <?php require_once "./partials/scripts_jqueryB.php "; ?>
</body>
</html>