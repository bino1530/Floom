<?php
session_start();
include("../includes/connect.php");
$order_id = $_GET['id'] ?? 0;
$stmt = $conn->prepare("
    SELECT c.SoLuong, c.DonGia, s.TenSanPham, s.HinhAnh
    FROM tb_ctdonhang c
    JOIN tb_sanpham s ON c.Ma_SanPham = s.SanPham_id
    WHERE c.Ma_DonHang = ?
");
$total = 0;

$stmt->execute([$order_id]);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($items as $item) {
    $total += $item['DonGia'] * $item['SoLuong'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/order-detail.css">
    <link rel="stylesheet" href="../asset/css/bass.css">
    <title>Order-Details</title>
</head>

<body>
    <h1>Items in this order</h1>
    <div class="order-items">
        <?php foreach ($items as $item): ?>
            <div class="order-item">
                <?php
                $imagesArray = json_decode($item['HinhAnh'], true);
                $imageSrc = "data:image/jpeg;base64," . $imagesArray[0];
                ?>
                <img src="<?= $imageSrc ?>" alt="<?= $item['TenSanPham'] ?>">
                <div class="item-info">
                    <p class="name"><?= $item['TenSanPham'] ?></p>
                    <p>Quantity: <?= $item['SoLuong'] ?></p>
                    <p>Price: <?= number_format($item['DonGia'], 0, ',', '.') ?>$</p>
                    <p>Total: <?= number_format($item['DonGia'] * $item['SoLuong'], 0, ',', '.') ?>$</p>
                </div>

            </div>
        <?php endforeach; ?>
        <div class="order-total">
            <p>Total: <?= number_format($total, 0, ',', '.') ?>$</p>
        </div>
        <a href="profile.php?page=orders" class="btn-back">Back to Orders</a>

    </div>
</body>

</html>