<?php
include("header.php");
//B1 Kết nối CSDL
include("../includes/connect.php");

$sql = "Select * from tb_user";
$sql .= " order by User_id ASC";


$sta = $conn->prepare($sql);
$sta->execute();

if ($sta->rowCount()) {
  $user = $sta->fetchAll(PDO::FETCH_OBJ);
}

?>

<!-- ========== table components start ========== -->
<section class="table-components">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title">
            <h2>User</h2>
          </div>
        </div>
        <!-- end col -->
        <div class="col-md-6">
          <div class="breadcrumb-wrapper">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#0">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Tables
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <!-- ========== tables-wrapper start ========== -->
    <div class="tables-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <div class="card-style mb-30">
            <div class="table-wrapper table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <h6>Image</h6>
                    </th>
                    <th class="lead-info">
                      <h6>User ID</h6>
                    </th>
                    <th class="lead-info">
                      <h6>User Name</h6>
                    </th>
                    <th class="lead-info">
                      <h6>Email </h6>
                    </th>
                    <th class="lead-info">
                      <h6>Password</h6>
                    </th>
                    
                    <th class="lead-company">
                      <h6>Delete</h6>
                    </th>
                  </tr>
                  <!-- end table row-->
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($user as $us) {
                    $sql = "SELECT HinhAnh FROM tb_user WHERE User_id = :userid";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':userid', $us->User_id);
                    $stmt->execute();
                    $userPic = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($userPic && !empty($userPic["HinhAnh"])) {
                      $profilePic = "data:image/jpeg;base64," . base64_encode($userPic["HinhAnh"]);
                    } else {
                      $profilePic = "../asset/image/index/smile.png";
                    }
                  ?>
                    <tr>
                    <tr>
                      <td class="min-width">
                        <div class="lead">
                          <div class="lead-image">
                            <img src="<?= $profilePic ?>" alt='Profile Picture'>
                          </div>
                        </div>
                      </td>

                      <td class="min-width">
                        <p><a href="#0"><?=$i ?></a></p>
                      </td>
                      <td class="min-width">
                        <p><?= $us->Username ?></p>
                      </td>
                      <td class="min-width">
                        <p><?= $us->Email ?></p>
                      </td>
                      <td class="min-width">
                        <p><?= $us->Userpassword ?></p>
                      </td>
                     
                      <td>
                        <div class="action">
                          <button class="text-danger">
                            <i onclick="window.location.href='../includes/form-user-delete.inc.php?id=<?=$us->User_id?>'" class="lni lni-trash-can"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <!-- end table row -->
                  <?php
                  $i++;
                  }
                  ?>
                </tbody>
              </table>
              <!-- end table -->
            </div>
          </div>
          <!-- end card -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->


      <!-- ========== tables-wrapper end ========== -->
    </div>
    <!-- end container -->
</section>
<!-- ========== table components end ========== -->

<!-- ========== footer start =========== -->
<footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 order-last order-md-first">
        <div class="copyright text-center text-md-start">
          <p class="text-sm">
            Designed and Developed by
            <a href="https://plainadmin.com" rel="nofollow" target="_blank">
              Bino
            </a>
          </p>
        </div>
      </div>
      <!-- end col-->
      <div class="col-md-6">
        <div class="terms d-flex justify-content-center justify-content-md-end">
          <a href="#0" class="text-sm">Term & Conditions</a>
          <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
        </div>
      </div>
    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</footer>
<!-- ========== footer end =========== -->
</main>
<!-- ======== main-wrapper end =========== -->

<!-- ========= All Javascript files linkup ======== -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/Chart.min.js"></script>
<script src="assets/js/dynamic-pie-chart.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/fullcalendar.js"></script>
<script src="assets/js/jvectormap.min.js"></script>
<script src="assets/js/world-merc.js"></script>
<script src="assets/js/polyfill.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>