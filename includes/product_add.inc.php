<?php
if (isset($_POST["submit"])) {
    session_start();

    include_once("connect.php");
    $product_id = null; 
    $product_name = $_POST['product_name'];
    $product_subc = $_POST['product_subc'];
    $product_price = $_POST['product_price'];
    $product_quanity = $_POST['product_quanity'];
    $base64Images = array(); // Khởi tạo một mảng để lưu hình ảnh base64
    if (isset($_FILES['hinhanh'])) {
        foreach ($_FILES['hinhanh']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['hinhanh']['error'][$key] == 0) {
                $imageData = file_get_contents($tmp_name);
                $base64Images[] = base64_encode($imageData);
            }
        }
    }
    $base64ImagesJson = json_encode($base64Images);
    $username = $_SESSION['username']; 
    $productlist_id = $_POST['sellsp'];
    $sql = "INSERT INTO tb_sanpham (TenSanPham, MoTaSP, Gia, SLKho, HinhAnh, NguoiTao, NgayTao, Ma_DanhMuc) VALUES (:TenSanPham, :MoTaSP, :Gia, :SLKho, :HinhAnh, :NguoiTao, NOW(), :Ma_DanhMuc)";
    $sta = $conn->prepare($sql);
    $params = array(
        ':TenSanPham' => $product_name,
        ':MoTaSP' => $product_subc,
        ':Gia' => $product_price,
        ':SLKho' => $product_quanity,
        ':HinhAnh' => $base64ImagesJson,
        ':NguoiTao' => $username,
        ':Ma_DanhMuc' => $productlist_id
    );
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
