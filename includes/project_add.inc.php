<?php
if(isset($_POST["submit"])){
    include_once("connect.php");
    $project_id = null;
    $project_name = $_POST['project_name'];
    $project_subc = $_POST['project_subc'];
    $project_price = $_POST['project_price'];
    $project_quanity = $_POST['project_quanity'];
    $hinhanh = $_FILES['hinhanh']['error']==0? $_FILES['hinhanh']['name']:"";
        if($hinhanh != ""){
            move_uploaded_file($_FILES['hinhanh']['tmp_name'],"../asset/image/Valenties/$hinhanh");
            $hinhanh = $_FILES['hinhanh']['name'];
        }else{
            $hinhanh = "no,";
        }
    $projectlist_id = $_POST['sellsp'];

    $sql = "INSERT INTO tb_sanpham";
    $sql .= " VALUES (?,?,?,?,?,?,?)";
    $params = array($project_id,$project_name,$project_subc,$project_price,$project_quanity,$hinhanh,$projectlist_id);
    $sta = $conn -> prepare($sql);
    $kp = $sta -> execute($params);
    if ($kp) {
        header("location: ../admin/form-project-elements.php");
        exit();
    }else{
        echo("thêm mới không thành công");
    }
    $conn = null;
}
?>