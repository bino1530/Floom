<?php
if(isset($_POST["submit"])){
    include ("../includes/connect.php");
  $project_id = $_POST['project_id'];
  $project_name = $_POST['project_name'];
  $project_subc = $_POST['project_subc'];
    $sql = "UPDATE tb_danhmuc SET TenDanhMuc=?,MoTaDM=? WHERE MaDanhMuc=?  ";
    $params = array($project_name,$project_subc,$project_id);
    $sta = $conn->prepare($sql);
    $kp = $sta->execute($params);
    if ($kp) {
        header("location: ../admin/projectlist.php");
        exit();
    } else {
        echo "Thêm mới không thành công";
    }
}
?>