<?php
include("header.php");
?>


<!-- ========== tab components start ========== -->
<section class="tab-components">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title">
            <h2>product List Update</h2>
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
                <li class="breadcrumb-item"><a href="#0">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  Product List
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

    <!-- ========== form-elements-wrapper start ========== -->
    <div class="form-elements-wrapper">
      <form action="../includes/productlist_add.inc.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-12">
            <!-- input style start -->
            <div class="card-style mb-30">
              <h6 class="mb-25">Product</h6>
              <div class="input-style-1">
                <label>Product List ID</label>
                <input type="text" name="product_id"   placeholder="product List ID" />
              </div>
              <!-- end input -->
              <div class="input-style-2">
                <label>Product List Name</label>
                <input type="text" name="product_name" placeholder="product List Name" />
              </div>
              <!-- end input -->
              <div class="input-style-3">
                <label>Product List Subscription</label>
                <input type="text" name="product_subc" placeholder="product List Subscription" />
              </div>
              <!-- end input -->
              <div class="form-row">
                <button type="submit" name="submit" class="save-changes">Save Changes</button>
              </div>
            </div>
      </form>

      <!-- end card -->

    </div>
    <!-- end col -->
  </div>
  <!-- end row -->
  </div>
  <!-- ========== form-elements-wrapper end ========== -->
  </div>
  <!-- end container -->
</section>
<!-- ========== tab components end ========== -->

<!-- ========== footer start =========== -->
<footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 order-last order-md-first">
        <div class="copyright text-center text-md-start">
          <p class="text-sm">
            Designed and Developed by
            <a href="https://plainadmin.com" rel="nofollow" target="_blank">
              PlainAdmin
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