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
    loginUser($conn, $newUsername, $pwd);
} else {
    header("location: ../login.php");
    exit();
}
