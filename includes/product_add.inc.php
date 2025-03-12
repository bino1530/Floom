<?php
if (isset($_POST["submit"])) {
    session_start(); // Khởi tạo session

    include_once("connect.php");
    $product_id = null; // Hoặc giá trị tự động tăng trong CSDL
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
    $username = $_SESSION['username']; // Lấy giá trị username từ session
    $productlist_id = $_POST['sellsp'];
    
    $sql = "INSERT INTO tb_sanpham (TenSanPham, MoTaSP, Gia, SLKho, HinhAnh, NguoiTao, NgayTao, Ma_DanhMuc) VALUES (:TenSanPham, :MoTaSP, :Gia, :SLKho, :HinhAnh, :NguoiTao, NOW(), :Ma_DanhMuc)";
    
    $sta = $conn->prepare($sql);
    
    $params = array(
        ':TenSanPham' => $product_name,
        ':MoTaSP' => $product_subc,
        ':Gia' => $product_price,
        ':SLKho' => $product_quanity,
        ':HinhAnh' => $base64Image,
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
