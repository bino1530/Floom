<?php
include("connect.php");

$category_id = isset($_GET['Category_ID']) ? $_GET['Category_ID'] : 'all';
$sp_trang = 5;
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Lấy danh mục sản phẩm
$sql = "SELECT * FROM tb_danhmuc ORDER BY MaDanhMuc ASC";
$sta = $conn->prepare($sql);
$sta->execute();
$productlist = $sta->fetchAll(PDO::FETCH_OBJ);

// Đếm số lượng sản phẩm
$sql_count = ($category_id === 'all') ?
    "SELECT COUNT(*) FROM tb_sanpham WHERE TenSanPham LIKE :search" :
    "SELECT COUNT(*) FROM tb_sanpham WHERE Ma_DanhMuc = :Ma_DanhMuc AND TenSanPham LIKE :search";

$sta_count = $conn->prepare($sql_count);
$sta_count->bindValue(':search', "%$search%", PDO::PARAM_STR);
if ($category_id !== 'all') {
    $sta_count->bindValue(':Ma_DanhMuc', $category_id, PDO::PARAM_STR);
}
$sta_count->execute();
$tong_sp = $sta_count->fetchColumn();
$tong_trang = ceil($tong_sp / $sp_trang);

// Xác định trang hiện tại và vị trí bắt đầu
$trang_ht = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$trang_ht = max(1, min($tong_trang, $trang_ht));
$vtbd = ($trang_ht - 1) * $sp_trang;

// Truy vấn sản phẩm
$sql = ($category_id === 'all') ?
    "SELECT * FROM tb_sanpham WHERE TenSanPham LIKE :search ORDER BY SanPham_id ASC LIMIT :vtbd, :sp_trang" :
    "SELECT * FROM tb_sanpham WHERE Ma_DanhMuc = :Ma_DanhMuc AND TenSanPham LIKE :search ORDER BY SanPham_id ASC LIMIT :vtbd, :sp_trang";

$sta = $conn->prepare($sql);
$sta->bindValue(':search', "%$search%", PDO::PARAM_STR);
$sta->bindValue(':vtbd', (int)$vtbd, PDO::PARAM_INT);
$sta->bindValue(':sp_trang', (int)$sp_trang, PDO::PARAM_INT);
if ($category_id !== 'all') {
    $sta->bindValue(':Ma_DanhMuc', $category_id, PDO::PARAM_STR);
}
$sta->execute();
$product = $sta->fetchAll(PDO::FETCH_OBJ);
?>
