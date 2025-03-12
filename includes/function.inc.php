<?php

function emptyInputSignup($name, $email, $newUsername, $pwd, $pwdrepeat)
{
    $result = false;
    if (empty($name) || empty($email) || empty($newUsername) || empty($pwd) || empty($pwdrepeat)) {
        $result = true;
    }
    return $result;
}

function invalidUid($newUsername)
{
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $newUsername)) {
        $result = true;
    }
    return $result;
}

function invalidEmail($email)
{
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat)
{
    $pwd = trim($pwd);
    $pwdrepeat = trim($pwdrepeat);
    $result = false;
    if ($pwd == $pwdrepeat) {
        $result = true;
    }
    return $result;
}

function uidExists($conn, $newUsername, $email)
{
    $sql = "SELECT * FROM tb_user WHERE Username = :username OR Email = :email";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':username', $newUsername);
    $stmt->bindParam(':email', $email);

    $stmt->execute();
    $resultData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultData) {
        return $resultData;
    } else {
        return false;
    }
}

function createUser($conn, $name, $email, $newUsername, $pwd)
{
    $defaultImagePath = '../asset/image/index/smile.png';
    $defaultImage = file_get_contents($defaultImagePath);

    $sql = "INSERT INTO tb_user (Username, Email, HoTen, Userpassword, HinhAnh) VALUES (:username, :email, :name, :pwd, :image)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $newUsername);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':pwd', $pwd);
    $stmt->bindParam(':image', $defaultImage, PDO::PARAM_LOB);
    $stmt->execute();
}

function emptyInputLogin($newUsername, $pwd)
{
    $result = false;
    if (empty($newUsername) || empty($pwd)) {
        $result = true;
    }
    return $result;
}
function loginUser($conn, $newUsername, $pwd) {
    $uidExists = uidExists($conn, $newUsername, $newUsername);

    if ($uidExists === false) {
        header("location: ../page/login.php?error=wronglogin");
        exit();
    }

    $storedPwd = $uidExists["Userpassword"];
    $role = $uidExists["Role"];

    if ($pwd !== $storedPwd) {
        header("location: ../page/login.php?error=wronglogin");
        exit();
    } else {
        session_start();
        $_SESSION["userid"] = $uidExists['User_id'];
        $_SESSION["username"] = $uidExists['Username'];
        $_SESSION["fullname"] = $uidExists['HoTen'];
        $_SESSION["email"] = $uidExists['Email'];
        $_SESSION["userpassword"] = $uidExists['Userpassword'];
        $_SESSION["role"] = $role;

        if ($role === 'Admin') {
            header("location: ../admin/index.php");
        } else {
            header("location: ../index.php");
        }
        exit();
    }
}

?>
