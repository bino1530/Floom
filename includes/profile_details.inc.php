<?php
include_once '../includes/connect.php';
include_once '../main/header1.php';

$user_id = $_SESSION['userid'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['full_name']) && isset($_POST['email_address'])) {
    $HoTen = $_POST['full_name'];
    $Email = $_POST['email_address'];

    $stmt = $conn->prepare("UPDATE tb_user SET HoTen = :HoTen, Email = :Email WHERE user_id = :user_id");
    $stmt->bindParam(':HoTen', $HoTen, PDO::PARAM_STR);
    $stmt->bindParam(':Email', $Email, PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

}
$stmt = $conn->prepare("SELECT HoTen, Email FROM tb_user WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
$HoTen = $result['HoTen'];
$Email = $result['Email'];
?>