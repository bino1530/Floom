<?php
include 'connect.php';
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$sql = "SELECT * FROM tb_sanpham WHERE TenSanPham LIKE :search";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_OBJ); 

?>