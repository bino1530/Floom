<?php
if(isset($_POST["submit"])){
    include ("../includes/connect.php");
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_subc = $_POST['product_subc'];
    $sql = "UPDATE tb_danhmuc SET TenDanhMuc=?,MoTaDM=? WHERE MaDanhMuc=?  ";
    $params = array($product_name,$product_subc,$product_id);
    $sta = $conn->prepare($sql);
    $kp = $sta->execute($params);
    if ($kp) {
        header("location: ../admin/productlist.php");
        exit();
    } else {
        echo "Thêm mới không thành công";
    }
}
?>