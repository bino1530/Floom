<?php
if (isset($_POST["submit"])) {
    include_once("connect.php");
    $product_id = null;
    $product_name = $_POST['product_name'];
    $product_subc = $_POST['product_subc'];
    $product_price = $_POST['product_price'];
    $product_quanity = $_POST['product_quanity'];
    if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0) {
        $imageData = file_get_contents($_FILES['hinhanh']['tmp_name']);
        $base64Image = base64_encode($imageData);
    } else {
        $base64Image = null;
    }
    $productlist_id = $_POST['sellsp'];
    $sql = "INSERT INTO tb_sanpham (SanPham_id,TenSanPham, MoTaSP, Gia, SLKho,HinhAnh,Ma_DanhMuc) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $params = array($product_id, $product_name, $product_subc, $product_price, $product_quanity, $base64Image, $productlist_id);
    $sta = $conn->prepare($sql);
    $kp = $sta->execute($params);
    if ($kp) {
        header("location: ../admin/product.php");
        exit();
    } else {
        echo("Thêm mới không thành công");
    }

    $conn = null;
}
?>
