<?php
include_once '../main/header1.php';
?>
<div class="grid">
    <div class="profile-page-row row">
        <div class="profile-page-col col-lg-3 col-sm-12 col-12">
            <ul class="profile_box">
                <li><a href="profile.php?page=dashboard" class="profile-content" name="dashboard">Dashboard <i class="fa-solid icon-profile fa-gauge"></i></a></li>
                <li><a href="profile.php?page=orders" class="profile-content" name="orders">Orders <i class="fa-solid icon-profile fa-bag-shopping"></i></a></li>
                <li><a href="profile.php?page=addresses" class="profile-content" name="addresses">Addresses <i class="fa-solid icon-profile fa-location-dot"></i></a></li>
                <li><a href="profile.php?page=account-details" class="profile-content" name="account-details">Account details <i class="fa-solid icon-profile fa-user"></i></a></li>
                <?php
                if (isset($_SESSION['username'])) {
                    echo " <li><a href='../includes/logout.inc.php' class='profile-content' name='logout'>Log Out <i class='fa-solid icon-profile fa-sign-out-alt'></i></a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="profile-page-col col-lg-9 col-sm-12 col-12 profile-main">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; // Mặc định là dashboard
            switch ($page) {
                case 'profile':
                    include 'profile_dashboard.php';
                    break;
                case 'dashboard':
                    include 'profile_dashboard.php';
                    break;
                case 'orders':
                    include 'profile_orders.php';
                    break;
                case 'addresses':
                    include 'profile_addresses.php';
                    break;
                case 'account-details':
                    include 'profile_account_details.php';
                    break;
                default:
                    echo "<h2>404 - Nội dung không tồn tại</h2>";
                    break;
            }
            ?>
        </div>
    </div>
</div>
<?php
include_once '../main/footer.php';
?>