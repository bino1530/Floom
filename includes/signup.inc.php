<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $newUsername = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST['pwdrepeat'];

    require_once '../includes/connect.php';
    require_once '../includes/function.inc.php';

    if (emptyInputSignup($name, $email, $newUsername, $pwd, $pwdrepeat) !== false) {
        header("location: ../page/signup.php?error=emptyinput");
        exit();
    }
    if (invalidUid($newUsername) !== false) {
        header("location: ../page/signup.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {  
        header("location: ../page/signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdrepeat) === false) {  
        header("location: ../page/signup.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $newUsername, $email) !== false) {
        header("location: ../page/signup.php?error=usernametaken");
        exit();
    }
    
    createUser($conn, $name, $email, $newUsername, $pwd);
    header("location: ../page/login.php?signup=success");
    exit();
    
    

} else {
    header("location: ../signup.php");
    exit();
}
?>

