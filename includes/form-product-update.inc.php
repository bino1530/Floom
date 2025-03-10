<?php
if (isset($_POST["submit"])) {
    include ("../includes/connect.php");
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_subc = $_POST['product_subc'];
    $product_price = $_POST['product_price'];
    $product_quanity = $_POST['product_quanity'];
    if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0) {
        $imageData = file_get_contents($_FILES['hinhanh']['tmp_name']);
        $base64Image = base64_encode($imageData);
    } else {
        $base64Image = $_POST['hinh'];
    }
    $productlist_id = $_POST['sellsp'];
    $sql = "UPDATE tb_sanpham SET TenSanPham=?, MoTaSP=?, Gia=?, SLKho=?, HinhAnh=?, Ma_DanhMuc=? WHERE SanPham_id=?";
    $params = array($product_name, $product_subc, $product_price, $product_quanity, $base64Image, $productlist_id, $product_id);
    $sta = $conn->prepare($sql);
    $kp = $sta->execute($params);

    if ($kp) {
        header("location: ../admin/product.php");
        exit();
    } else {
        echo "Thêm mới không thành công";
    }

    $conn = null;
}
?>
