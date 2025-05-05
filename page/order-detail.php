<?php
include "../includes/connect.php";
session_start();
$order_id = $_GET['order_id'] ?? 0;
$stmt = $conn->prepare("
    SELECT d.NgayLap, d.TongTien, k.HoTen, k.Email, k.SDT, k.DiaChi, k.Tinh
    FROM tb_donhang d
    JOIN tb_khachhang k ON d.Ma_KhachHang = k.KhachHang_id
    WHERE d.DonHang_id = ?
");
$stmt->execute([$order_id]);
$order = $stmt->fetch();
if (!$order) {
    echo "khong tim thay";
    exit;
}
$stmt = $conn->prepare("
    SELECT c.SoLuong, c.DonGia, s.TenSanPham
    FROM tb_ctdonhang c
    JOIN tb_sanpham s ON c.Ma_SanPham = s.SanPham_id
    WHERE c.Ma_DonHang = ?
");
$stmt->execute([$order_id]);
$items = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Details #<?= $order_id ?></title>
    <link rel="stylesheet" href="../asset/css/order-detail.css">
    <link rel="stylesheet" href="../asset/css/bass.css">
</head>

<body>
    <div class="container-order-details">
        <h2>Order Details #<?= $order_id ?></h2>
        <div class="info">
            <p><strong>👤 Recipient:</strong> <?= $order['HoTen'] ?></p>
            <p><strong>📧 Email:</strong> <?= $order['Email'] ?></p>
            <p><strong>📞 Phone:</strong> <?= $order['SDT'] ?></p>
            <p><strong>🏠 Address:</strong> <?= $order['DiaChi'] ?>, <?= $order['Tinh'] ?></p>
            <p><strong>📅 Order Date:</strong> <?= $order['NgayLap'] ?></p>
        </div>
        <p class="total">💰 Total Amount: <?= number_format($order['TongTien'], 0, ',', '.') ?>đ</p>
        <div style="text-align: center;">
            <a href="../index.php" class="btn-back">🛍️ Continue Shopping</a>
        </div>
    </div>
</body>

</html>
