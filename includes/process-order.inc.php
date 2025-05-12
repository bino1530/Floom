<?php
ob_start();
include("../mail/index.php");
$mail = new Mailer();
include "connect.php";
session_start();
$cart = $_SESSION['cart'] ?? [];

if (isset($_POST["btn-checkout"])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $province = $_POST['province'];
    $user_id = $_SESSION['userid'];
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    $stmt = $conn->prepare("SELECT * FROM tb_khachhang WHERE Ma_User = ? AND Hoten = ?");
    $stmt->execute([$user_id, $fullname]);
    $existing_customer = $stmt->fetch();
    if ($existing_customer) {
        $khachhang_id = $existing_customer['KhachHang_id'];
    } else {
        $stmt = $conn->prepare("INSERT INTO tb_khachhang (Hoten, Email, SDT, DiaChi, Tinh, Ma_User) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$fullname, $email, $phone, $address, $province, $user_id]);
        $khachhang_id = $conn->lastInsertId();
    }
    $stmt = $conn->prepare("INSERT INTO tb_donhang (NgayLap, TongTien , Ma_KhachHang) VALUES (NOW(), ?, ?)");
    $stmt->execute([$total, $khachhang_id]);
    $order_id = $conn->lastInsertId();
    foreach ($cart as $item) {
        $sanpham_id = $item['id'];
        $quantity = $item['quantity'];
        $price = $item['price'];
        $stmt = $conn->prepare("INSERT INTO tb_ctdonhang (SoLuong, DonGia, Ma_SanPham, Ma_DonHang) VALUES (?, ?, ?, ?)");
        $stmt->execute([$quantity, $price, $sanpham_id, $order_id]);
    }
    $title = "Order Confirmation - Floom";
    $product_list_html = '';
    foreach ($cart as $item) {
        $product_list_html .= '<li>' . $item['name'] . ' x' . $item['quantity'] . ' - ' . number_format($item['price'], 0, ',', '.') . '$</li>';
    }
    $shipping_fee = 30.000;
    $total_price = $total + $shipping_fee;
    $content = '
    <div style="max-width: 600px; margin: auto; font-family: \'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif; border: 1px solid #e0e0e0; padding: 30px; border-radius: 15px; background-color: #ffffff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
        <h2 style="color: #6d4c41; text-align: center; font-size: 24px; margin-bottom: 20px;">🌸 Thank you for your order at <strong style="color: #d32f2f;">Floom</strong></h2>
        <p style="font-size: 16px; color: #333333;">Hello <strong style="color: #d32f2f;">' . $fullname . '</strong>,</p>
        <p style="font-size: 16px; color: #333333;">We have received your order and are currently processing it. Below are the order details:</p>

        <div style="background-color: #f9f9f9; padding: 20px; border-radius: 10px; margin: 25px 0; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
            <p style="font-size: 16px; color: #333333;"><strong>Order ID:</strong> #' . $order_id . '</p>
            <p style="font-size: 16px; color: #333333;"><strong>Date:</strong> ' . date("d/m/Y") . '</p>
            <p style="font-size: 16px; color: #333333;"><strong>Status:</strong> <span style="color: #ffa000;">Pending Confirmation</span></p>
        </div>

        <h3 style="color: #6d4c41; font-size: 20px; margin-top: 20px;">🛍️ Ordered Products:</h3>
        <ul style="padding-left: 20px; color: #333; font-size: 16px; list-style-type: none;">' . $product_list_html . '</ul>

        <p style="font-size: 16px; color: #333333;"><strong>Shipping Fee:</strong> ' . number_format($shipping_fee, 0, ',', '.') . ' $</p>
        <p style="font-size: 18px; font-weight: bold; color: #d32f2f;"><strong>Total:</strong> ' . number_format($total_price, 0, ',', '.') . ' $</p>
        <hr style="margin: 30px 0; border: 1px solid #e0e0e0;">
        <p style="font-size: 14px; color: #555555;">We will notify you once the order has been shipped.</p>
        <p style="font-size: 13px; color: #777777;">If you have any questions, feel free to contact us via email or our hotline.</p>
        <p style="font-size: 14px; color: #777777;">Best regards,<br>The Floom Team 🌸</p>
    </div>';
    $mail->sendMail($title, $content, $email);
    unset($_SESSION['cart']);
    header("Location: ../page/order-detail.php?order_id=" . $order_id);
    exit();
}
?>
