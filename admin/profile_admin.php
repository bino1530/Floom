<?php
session_start();
if ($_SESSION["role"] !== 'Admin') {
    header("location: ../index.php");
    exit();
}
include_once '../main/header1.php';
?>

<div class="grid">
    <div class="profile-page-row row">
        <div class="profile-page-col col-lg-3 col-sm-12 col-12">
            <ul class="profile_box">
                <li><a href="profile_admin.php?admin=dashboard" class="profile-content" name="dashboard">Dashboard <i class="fa-solid icon-profile fa-gauge"></i></a></li>
                <li><a href="profile_admin.php?admin=update" class="profile-content" name="update">update <i class="fa-solid icon-profile fa-bag-shopping"></i></a></li>
                <li><a href="profile_admin.php?admin=account-details" class="profile-content" name="account-details">Account details <i class="fa-solid icon-profile fa-user"></i></a></li>
                <?php
                if (isset($_SESSION['username'])) {
                    echo " <li><a href='../includes/logout.inc.php' class='profile-content' name='logout'>Log Out <i class='fa-solid icon-profile fa-sign-out-alt'></i></a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="profile-page-col col-lg-9 col-sm-12 col-12">
            <?php
            $admin = isset($_GET['admin']) ? $_GET['admin'] : 'dashboard';
            switch ($admin) {
                case 'profile':
                    include 'profile_dashboard_admin.php';
                    break;
                case 'dashboard':
                    include 'profile_dashboard_admin.php';
                    break;
                case 'update':
                    include 'profile_update_admin.php';
                    break;
                case 'account-details':
                    include 'profile_account_details_admin.php';
                    break;
                default:
                    echo "<h2>404 - Nội dung không tồn tại</h2>";
                    break;
            }
            ?>
        </div>
    </div>

<?php
include_once '../main/footer.php';
?>