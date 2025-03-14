<?php if (isset($_GET['id'])) {
  $productlist = $_GET['id'];
  include_once('connect.php');
  $query = 'DELETE FROM tb_user WHERE User_id = :User_id';
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':User_id', $productlist, PDO::PARAM_INT);
  $stmt->execute();
  header('Location: ../admin/user.php');
} else {
  echo "xoa that bai";
}
