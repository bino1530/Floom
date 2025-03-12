<?php
include("header.php");
//B1 Kết nối CSDL
include("../includes/connect.php");

$sql = "SELECT * FROM tb_sanpham ORDER BY SanPham_id ASC";
$sta = $conn->prepare($sql);
$sta->execute();

$product = array(); // Khởi tạo biến $product để tránh lỗi undefined

if ($sta->rowCount() > 0) {
  $product = $sta->fetchAll(PDO::FETCH_OBJ);
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
            <h2>Product</h2>
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
                      <h6>Product ID</h6>
                    </th>
                    <th class="lead-info">
                      <h6>Product Name</h6>
                    </th>
                    <th class="lead-info">
                      <h6>Product Price </h6>
                    </th>
                    <th class="lead-info">
                      <h6>Quantity</h6>
                    </th>
                    <th class="lead-info">
                      <h6>Creator</h6>
                    </th>
                    <th class="lead-info">
                      <h6>Date</h6>
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
                  if (!empty($product)) {
                    foreach ($product as $product) {
                    $profilePic = "data:image/jpeg;base64," . $product->HinhAnh;
                  ?>
                    <tr>
                      <td class="min-width">
                        <div class="lead">
                          <div class="lead-image">
                            <img src="<?=$profilePic?>" alt='Profile Picture'>
                          </div>
                        </div>
                      </td>
                      <td class="min-width">
                        <p><a href="#0"><?= $product->SanPham_id?></a></p>
                      </td>
                      <td class="min-width">
                        <p><?= $product->TenSanPham ?></p>
                      </td>
                      <td class="min-width">
                        <p><?= $product->Gia ?>$</p>
                      </td>
                      <td class="min-width">
                        <p><?= $product->SLKho ?></p>
                      </td>
                      <td class="min-width">
                        <p><?= $product->NguoiTao ?></p>
                      </td>
                      <td class="min-width">
                        <p><?= $product->NgayTao ?></p>
                      </td>
                      <td>
                        <div class="action">
                          <button class="text-success" onclick="window.open('form-product-update.php?id=<?=$product->SanPham_id?>','_self')">
                            <i class="fa-solid fa-pen"></i>
                          </button>
                        </div>
                      </td>
                      <td>
                        <div class="action">
                          <button name="delete" onclick="window.location.href='../includes/form-product-delete.inc.php?id=<?=$product->SanPham_id?>'" class="text-danger">
                            <i class="lni lni-trash-can"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                  <?php
                    }
                  } else {
                    echo '<tr><td colspan="7">Không có sản phẩm nào trong danh sách.</td></tr>';
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
