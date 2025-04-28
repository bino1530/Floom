<?php
session_start();
require_once 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["product_id"];
    $name = $_POST["product_name"]; 
    $price = $_POST["price"];
    $quantity = isset($_POST["quantity"]) ? intval($_POST["quantity"]) : 1;
    $stmt = $conn->prepare("SELECT HinhAnh FROM tb_sanpham WHERE SanPham_id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($product && !empty($product["HinhAnh"])) {
        $imagesArray = json_decode($product["HinhAnh"], true);
        if (is_array($imagesArray) && count($imagesArray) > 0) {
            $imageBase64 = "data:image/jpeg;base64," . $imagesArray[0];
        } else {
            $imageBase64 = "data:image/png;base64,DEFAULT_IMAGE_BASE64"; 
        }
    } else {
        $imageBase64 = "data:image/png;base64,DEFAULT_IMAGE_BASE64";
    }
    if (!isset($_SESSION["cart"])) $_SESSION["cart"] = [];
    if (isset($_SESSION["cart"][$id])) {
        $_SESSION["cart"][$id]["quantity"] += $quantity;
    } else {
        $_SESSION["cart"][$id] = [
            "id" => $id, "name" => $name, "price" => $price, "image" => $imageBase64, "quantity" => $quantity
        ];
    }
}
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();

?>
