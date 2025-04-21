<?php
include "connect.php";
session_start();
$cart = $_SESSION['cart'] ?? [];

if(isset($_POST["btn-checkout"])){
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$province = $_POST['province'];
$user_id = $_SESSION['userid'];
$total = 0; 
foreach ($cart as $item){
    $total += $item['price'] * $item['quantity'];
}
$stmt = $conn->prepare("SELECT * FROM tb_khachhang WHERE Ma_User = ?");
$stmt->execute([$user_id]);
$existing_customer = $stmt->fetch();
if ($existing_customer) {
    $khachhang_id = $existing_customer['KhachHang_id'];
} else {
    $stmt = $conn->prepare("INSERT INTO tb_khachhang (Hoten, Email, SDT, DiaChi, Tinh, Ma_User) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$fullname, $email, $phone, $address, $province, $user_id]);
    $khachhang_id = $conn->lastInsertId();
}

    $stmt = $conn->prepare("INSERT INTO tb_donhang (NgayLap,TongTien , Ma_KhachHang) VALUES (NOW(),?, ?)");
    $stmt->execute([$total,  $khachhang_id]);
    $order_id = $conn->lastInsertId();

    foreach ($cart as $item){
        $sanpham_id = $item['id'];
        $quantity = $item['quantity'];
        $price = $item['price'];
        $stmt = $conn->prepare("INSERT INTO tb_ctdonhang (SoLuong, DonGia, Ma_SanPham, Ma_DonHang) VALUES (?, ?, ?, ?)");
        $stmt->execute([$quantity, $price, $sanpham_id, $order_id]);
    }
    unset($_SESSION['cart']);
    header("Location: ../page/order-detail.php?order_id=" . $order_id);
    exit();
}

?>