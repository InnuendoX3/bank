<?php

session_start();
/* if (!isset($_SESSION['login'])) {
    header("location: userPage.php");
} */

if (isset($_REQUEST['q'])) {
    session_destroy();
    echo "You logged out (In DEV terms: Session destroyed)";
    //header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once "./partials/head_jquery.php"; ?>

<body>
    <h3>Login as</h3>
    <form action="/bank/app/userPage.php" method="POST">
        <select name="userId" id="usersDropdown">
            <option value="" disabled selected>Choose an user</option>
            <!-- Here AJAX gets the users -->
        </select>
        <input type="submit" id="botoncito" value="Login" name="send">   
    </form>
    
    <script src="./scripts/login.js"></script>
</body>
</html>
