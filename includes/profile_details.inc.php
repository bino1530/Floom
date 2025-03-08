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
    if ($stmt->execute()) {
        $successMessage = "Thay đổi đã được lưu thành công!";
    }
    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['current-password']) && isset($_POST['new-password']) && isset($_POST['repeat-password'])) {
    $currentPassword = $_POST['current-password'];
    $newPassword = $_POST['new-password'];
    $repeatPassword = $_POST['repeat-password'];
    if ($newPassword == $repeatPassword) {
        $stmt = $conn->prepare("UPDATE tb_user SET Userpassword = :Userpassword WHERE user_id = :user_id");
        $stmt->bindParam(':Userpassword', $newPassword, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $successMessage1 = "Password has been successfully changed!";
        }
    } else {
        $errorMessage = "New passwords do not match!";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['hinhanh'];
    $fileType = mime_content_type($file['tmp_name']);
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (in_array($fileType, $allowedTypes)) {
        $fileData = file_get_contents($file['tmp_name']);

        $stmt = $conn->prepare("UPDATE tb_user SET HinhAnh = :hinhanh WHERE user_id = :user_id");
        $stmt->bindParam(':hinhanh', $fileData, PDO::PARAM_LOB);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $successMessage = "Ảnh đại diện đã được cập nhật!";
        }
    } else {
        $errorMessage = "Loại tệp không hợp lệ. Chỉ chấp nhận JPEG, PNG và GIF.";
    }
}
$stmt = $conn->prepare("SELECT HoTen, Email FROM tb_user WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
$HoTen = $result['HoTen'];
$Email = $result['Email'];
?>

