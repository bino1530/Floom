<?php
include("header.php");
//B1 Kết nối CSDL
include("../includes/connect.php");

$sql = "Select * from tb_danhmuc";
$sql .= " order by MaDanhMuc ASC";


$sta = $conn->prepare($sql);
$sta->execute();

if ($sta->rowCount()) {
  $productlist = $sta->fetchAll(PDO::FETCH_OBJ);
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
            <h2>Product List</h2>
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
                    <th class="lead-info">
                      <h6>Product List ID</h6>
                    </th>
                    <th class="lead-info">
                      <h6>Product List Name</h6>
                    </th>
                    <th class="lead-info">
                      <h6>Product List Subcription </h6>
                    </th>
                    <th class="lead-company">
                      <h6>Update</h6>
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
                  foreach ($productlist as $productlist) {
                  ?>
                    <tr>
                    <tr>
                      <td class="min-width">
                        <p><a href="#0"><?= $productlist->MaDanhMuc?></a></p>
                      </td>
                      <td class="min-width">
                        <p><?= $productlist-> TenDanhMuc?></p>
                      </td>
                      <td class="min-width">
                        <p><?= $productlist->MoTaDM ?></p>
                      </td>
                      <td>
                        <div class="action">
                          <button class="text-success " onclick="window.open('form-productlist-update.php?id=<?=$productlist->MaDanhMuc?> ','_self')">
                            <i class="fa-solid fa-pen"></i> </button>
                        </div>
                      </td>
                      <td>
                        <div class="action">
                          <button class="text-danger" onclick="window.location.href='../includes/form-productlist-delete.inc.php?id=<?=$productlist -> MaDanhMuc?>'">
                            <i class="lni lni-trash-can"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <!-- end table row -->
                  <?php
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