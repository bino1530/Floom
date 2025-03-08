<?php
if(isset($_POST["submit"])){
    include ("../includes/connect.php");
  $project_id = $_POST['project_id'];
  $project_name = $_POST['project_name'];
  $project_subc = $_POST['project_subc'];
  $project_price = $_POST['project_price'];
  $project_quanity = $_POST['project_quanity'];
  $hinhanh = $_FILES['hinhanh']['error']==0? $_FILES['hinhanh']['name']:"";
      if($hinhanh != ""){
          move_uploaded_file($_FILES['hinhanh']['tmp_name'],"../asset/image/Valenties/$hinhanh");
          $hinhanh = $_FILES['hinhanh']['name'];
      }else{
          $hinhanh = $_POST['hinh'];
      }
  $projectlist_id = $_POST['sellsp'];
    $sql = "UPDATE tb_sanpham SET TenSanPham=?,MoTaSP=?,Gia=?,SLKho=?,HinhAnh=?,Ma_DanhMuc=? WHERE SanPham_id=?  ";
    $params = array($project_name,$project_subc,$project_price,$project_quanity,$hinhanh,$projectlist_id,$project_id);
    $sta = $conn->prepare($sql);
    $kp = $sta->execute($params);
    if ($kp) {
        header("location: ../admin/project.php");
        exit();
    } else {
        echo "Thêm mới không thành công";
    }
}
?>