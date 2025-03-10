<?php
include ("../includes/connect.php");
if(isset($_POST['submit'])){
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_subc = $_POST['product_subc'];
    $sql = "INSERT INTO tb_danhmuc";
    $sql .=" VALUES (?,?,?)";
    $params = array($product_id,$product_name,$product_subc);
    $sta = $conn ->prepare($sql);
    $kp = $sta -> execute($params);
    if($kp){
        header("location: ../admin/productlist.php");
        exit();
    }else{
        echo"that bai roi may";
    }
}
?>