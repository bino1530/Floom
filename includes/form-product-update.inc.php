<?php
include ("connect.php");
if (isset($_POST['submit'])) {
    $existingImages = isset($product->hinhanh) ? json_decode($product->hinhanh, true) : [];
    $keptImages = isset($_POST['kept_images']) ? $_POST['kept_images'] : []; // Ảnh được giữ lại
    $newBase64Images = [];
    if (isset($_FILES['hinhanh'])) {
        foreach ($_FILES['hinhanh']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['hinhanh']['error'][$key] == 0) {
                $imageData = file_get_contents($tmp_name);
                $newBase64Images[] = base64_encode($imageData);
            }
        }
    }
    $updatedImages = array_merge($keptImages, $newBase64Images);
    $base64ImagesJson = json_encode($updatedImages);

    $sql = "UPDATE tb_sanpham SET TenSanPham=?, MoTaSP=?, Gia=?, SLKho=?, HinhAnh=?, Ma_DanhMuc=? WHERE SanPham_id=?";
    $params = array(
        $_POST['product_name'],
        $_POST['product_subc'],
        $_POST['product_price'],
        $_POST['product_quanity'],
        $base64ImagesJson,
        $_POST['sellsp'],
        $_POST['product_id']
    );
    $sta = $conn->prepare($sql);
    $sta->execute($params);

    header("location: ../admin/product.php");
}
?>
