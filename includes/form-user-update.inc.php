<?php
if(isset($_POST["submit"])){
include ("../includes/connect.php");
  $user_id = $_POST['user_id'];
  $username = $_POST['username'];
  $role = $_POST['sellsp'];
    $sql = "UPDATE tb_user SET Username=?, Role=? WHERE User_id=?  ";
    $params = array($username,$role,$user_id);
    $sta = $conn->prepare($sql);
    $kp = $sta->execute($params);
    if ($kp) {
        header("location: ../admin/user.php");
        exit();
    } else {
        echo "Thêm mới không thành công";
    }
}
?>