<?php
if(isset($_POST["submit"])){
    include_once("connect.php");
    $product_id = null;
    $product_name = $_POST['product_name'];
    $product_subc = $_POST['product_subc'];
    $product_price = $_POST['product_price'];
    $product_quanity = $_POST['product_quanity'];
    $hinhanh = $_FILES['hinhanh']['error']==0? $_FILES['hinhanh']['name']:"";
        if($hinhanh != ""){
            move_uploaded_file($_FILES['hinhanh']['tmp_name'],"../asset/image/Valenties/$hinhanh");
            $hinhanh = $_FILES['hinhanh']['name'];
        }else{
            $hinhanh = "no,";
        }
    $productlist_id = $_POST['sellsp'];

    $sql = "INSERT INTO tb_sanpham";
    $sql .= " VALUES (?,?,?,?,?,?,?)";
    $params = array($product_id,$product_name,$product_subc,$product_price,$product_quanity,$hinhanh,$productlist_id);
    $sta = $conn -> prepare($sql);
    $kp = $sta -> execute($params);
    if ($kp) {
        header("location: ../admin/product.php");
        exit();
    }else{
        echo("thêm mới không thành công");
    }
    $conn = null;
}
?>