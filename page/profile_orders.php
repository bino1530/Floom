<?php
include ("../includes/connect.php");
$user_id = $_SESSION['userid'];
$orders = [];

$sql = "SELECT KhachHang_id FROM tb_khachhang WHERE Ma_user = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$khachang = $stmt->fetch(PDO::FETCH_ASSOC);
if($khachang){
    $khid = $khachang['KhachHang_id'];
    $sql_orders = "SELECT * FROM tb_donhang WHERE Ma_KhachHang = :khid ORDER BY NgayLap DESC";
    $stmt_orders = $conn->prepare($sql_orders);
    $stmt_orders->bindParam(':khid', $khid);
    $stmt_orders->execute();
    $orders = $stmt_orders->fetchAll(PDO::FETCH_ASSOC);
}
?>
<div class="profile_content_layout" id="orders">
    <h2>Orders</h2>
    <?php if (count($orders) === 0): ?>
        <div class="have-no-order">
            <p><a href="shop.php">Go To The Shop</a> No order has been made yet</p>
        </div>
    <?php else: ?>
        <div class="orders-list">
            <?php foreach ($orders as $order): ?>
                <div class="order-card">
                    <p><strong>Order ID:</strong> <?= $order['DonHang_id'] ?></p>
                    <p><strong>Date:</strong> <?= date("d/m/Y", strtotime($order['NgayLap'])) ?></p>
                    <p><strong>Total:</strong> <?= number_format($order['TongTien'], 0, ',', '.') ?>₫</p>
                    <a href="order-detail-main.php?id=<?= $order['DonHang_id'] ?>">View Details</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>