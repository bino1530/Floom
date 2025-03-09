<?php if (isset($_GET['id'])) {
  $productlist = $_GET['id'];
  include_once('connect.php');
  $query = 'DELETE FROM tb_danhmuc WHERE MaDanhMuc = :MaDanhMuc';
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':MaDanhMuc', $productlist, PDO::PARAM_INT);
  $stmt->execute();
  header('Location: ../admin/productlist.php');
} else {
  echo "xoa that bai";
}
