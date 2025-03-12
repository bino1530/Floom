<?php
if (isset($_POST["login-submit"])) {
    $newUsername = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once "../includes/connect.php";
    require_once "../includes/function.inc.php";
    if (emptyInputLogin($newUsername, $pwd) !== false) {
        header("location: ../page/login.php?error=emptyinput");
        exit();
    }

    $loginError = loginUser($conn, $newUsername, $pwd);
    if ($loginError !== false) {
        header("location: ../page/login.php?error=wronglogin");
        exit();
    }
} else {
    header("location: ../page/login.php");
    exit();
}
?>
