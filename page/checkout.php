<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../page/login.php");
    exit();
}
$cart = $_SESSION["cart"] ?? [];
$total = 0;
$provinces = [
    "An Giang",
    "Bà Rịa - Vũng Tàu",
    "Bắc Giang",
    "Bắc Kạn",
    "Bạc Liêu",
    "Bắc Ninh",
    "Bến Tre",
    "Bình Định",
    "Bình Dương",
    "Bình Phước",
    "Bình Thuận",
    "Cà Mau",
    "Cần Thơ",
    "Cao Bằng",
    "Đà Nẵng",
    "Đắk Lắk",
    "Đắk Nông",
    "Điện Biên",
    "Đồng Nai",
    "Đồng Tháp",
    "Gia Lai",
    "Hà Giang",
    "Hà Nam",
    "Hà Nội",
    "Hà Tĩnh",
    "Hải Dương",
    "Hải Phòng",
    "Hậu Giang",
    "Hòa Bình",
    "Hưng Yên",
    "Khánh Hòa",
    "Kiên Giang",
    "Kon Tum",
    "Lai Châu",
    "Lâm Đồng",
    "Lạng Sơn",
    "Lào Cai",
    "Long An",
    "Nam Định",
    "Nghệ An",
    "Ninh Bình",
    "Ninh Thuận",
    "Phú Thọ",
    "Phú Yên",
    "Quảng Bình",
    "Quảng Nam",
    "Quảng Ngãi",
    "Quảng Ninh",
    "Quảng Trị",
    "Sóc Trăng",
    "Sơn La",
    "Tây Ninh",
    "Thái Bình",
    "Thái Nguyên",
    "Thanh Hóa",
    "Thừa Thiên Huế",
    "Tiền Giang",
    "TP. Hồ Chí Minh",
    "Trà Vinh",
    "Tuyên Quang",
    "Vĩnh Long",
    "Vĩnh Phúc",
    "Yên Bái"
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="../asset/css/checkout.css">
    <link rel="stylesheet" href="../asset/css/bass.css">
</head>

<body>
    <div class="checkout-wrapper">

        <?php if (empty($cart)): ?>
            <p class="empty-cart">Your cart is empty. <a href="../page/shop_product.php">Shop now</a></p>
        <?php else: ?>
            <form action="../includes/process-order.inc.php" method="POST" class="checkout-container">
                <div class="checkout-left">
                    <a href="../index.php" class="btn-back">Back to Floom</a>

                    <h1>Checkout</h1>

                    <input type="text" name="fullname" placeholder="Full Name" required value="<?= $_SESSION['fullname'] ?? '' ?>">
                    <input type="email" name="email" placeholder="Email address" required value="<?= $_SESSION['email'] ?? '' ?>">
                    <input type="text" name="phone" placeholder="Phone number" required>
                    <input type="text" name="address" placeholder="Address" required>

                    <select name="province" required>
                        <option value="">Select City</option>
                        <?php foreach ($provinces as $province): ?>
                            <option value="<?= $province ?>"><?= $province ?></option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit" name="btn-checkout" class="btn-checkout">Place Order</button>
                </div>

                <div class="checkout-right">
                    <h2>Review your cart</h2>
                    <?php foreach ($cart as $item):
                        $total += $item["price"] * $item["quantity"];
                    ?>
                        <div class="checkout-item">
                            <img src="<?= $item["image"] ?>" alt="<?= $item["name"] ?>">
                            <div class="item-details">
                                <a href="shop_product_main.php?id=<?= $item['id'] ?>">
                                    <p><strong><?= $item["name"] ?></strong></p>
                                </a>
                                <p><?= $item["quantity"] ?>x - $<?= $item["price"] ?></p>
                            </div>

                        </div>
                    <?php endforeach; ?>
                    <div class="checkout-summary">
                        <div class="summary-line"><span>Subtotal:</span> <span>$<?= number_format($total, 2) ?></span></div>
                        <div class="summary-line"><span>Shipping:</span> <span>$5.00</span></div>
                        <div class="summary-line total"><span>Total:</span> <span>$<?= number_format($total + 5, 2) ?></span></div>
                    </div>
                </div>

            </form>

        <?php endif; ?>
    </div>
</body>

</html>