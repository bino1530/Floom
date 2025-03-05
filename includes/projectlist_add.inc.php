<?php
include ("../includes/connect.php");
if(isset($_POST['submit'])){
    $project_id = $_POST['project_id'];
    $project_name = $_POST['project_name'];
    $project_subc = $_POST['project_subc'];
    $sql = "INSERT INTO tb_danhmuc";
    $sql .=" VALUES (?,?,?)";
    $params = array($project_id,$project_name,$project_subc);
    $sta = $conn ->prepare($sql);
    $kp = $sta -> execute($params);
    if($kp){
        header("location: ../admin/form-projectlist-elements.php");
        exit();
    }else{
        echo"that bai roi may";
    }
    
}
?>