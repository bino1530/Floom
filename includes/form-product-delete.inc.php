<?php
  if(isset($_GET['id'])){
    $product = $_GET['id'];
    include_once('connect.php');
        $query = 'DELETE FROM tb_sanpham WHERE SanPham_id = :Sanpham_id';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':Sanpham_id', $product, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: ../admin/product.php');
  }else{
    echo"xoa that bai";
  }
?>