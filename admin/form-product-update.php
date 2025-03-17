<?php
include("header.php");
include("../includes/connect.php");
if (isset($_GET['id'])) {
  $Maloai = $_GET['id'];
  $sql = "SELECT * FROM tb_sanpham WHERE SanPham_id = :SanPham_id";
  $sta = $conn->prepare($sql);
  $sta->bindParam(':SanPham_id', $Maloai, PDO::PARAM_INT);
  $sta->execute();
  if ($sta->rowCount()) {
    $product = $sta->fetch(PDO::FETCH_OBJ);
  }
  $sql_lsp = "SELECT * from tb_danhmuc";
  $sql_sp = "SELECT * from tb_sanpham";
  if (isset($_POST['btntim']) && !empty($_POST['sellsp'])) {
    $maloai = $_POST['sellsp'];
    $sql_sp .= " WHERE MaDanhMuc = '" . $maloai . "'";
  }
  $sql_sp .= " order by TenSanPham ASC";

  $lsp = $conn->prepare($sql_lsp);
  $lsp->execute();

  if ($lsp->rowCount() > 0) {
    $loaisp = $lsp->fetchAll(PDO::FETCH_OBJ);
  }

?>


  <!-- ========== tab components start ========== -->
  <section class="tab-components">
    <div class="container-fluid">
      <!-- ========== title-wrapper start ========== -->
      <div class="title-wrapper pt-30">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="title">
              <h2>product Update</h2>
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
                    Product Update
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
        <form action="../includes/form-product-update.inc.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-12">
              <!-- input style start -->
              <div class="card-style mb-30">
                <div class="input-style-2">
                  <label>Product Name</label>
                  <input type="text" name="product_name" value="<?= $product->TenSanPham ?>" placeholder="product Name" />
                </div>
                <!-- end input -->
                <div class="input-style-3">
                  <label>Product Subscription</label>
                  <input type="text" name="product_subc" value="<?= $product->MoTaSP ?>" placeholder="product Subscription" />
                </div>
                <div class="input-style-1">
                  <label>Product Price</label>
                  <input type="number" name="product_price" value="<?= $product->Gia ?>" placeholder="product Price" />
                </div>
                <!-- end input -->
                <div class="input-style-2">
                  <label>Warehouse Quantity</label>
                  <input type="text" name="product_quanity" value="<?= $product->SLKho ?>" placeholder="Warehouse Quantity" />
                </div>
                <!-- end input -->
                <div class="input-style-3">
                  <label>Product Images</label>

                  <!-- Hiển thị ảnh hiện tại -->
                  <?php
                  $existingImages = json_decode($product->HinhAnh, true);
                  if (!empty($existingImages)) {
                    echo '<div style="display: flex; flex-wrap: wrap; gap: 20px;">'; 
                    foreach ($existingImages as $key => $image) {
                        echo <<<HTML
                        <div style="width: 150px; border: 1px solid #ddd; border-radius: 8px; padding: 10px; text-align: center; background: #f9f9f9; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <img src="data:image/jpeg;base64,$image" alt="Product Image" style="width: 100%; height: auto; border-radius: 8px; margin-bottom: 10px;" />
                            <div>
                                <input type="checkbox" name="kept_images[]" value="$image" checked style="margin-right: 5px;" />
                                <label>Giữ lại</label>
                            </div>
                        </div>
                        HTML;
                    }
                    echo '</div>'; 
                  }

                  ?>
                  <!-- Thêm hình ảnh mới -->
                  <input type="file" name="hinhanh[]" multiple placeholder="Add new product images" />
                </div>
                <div class="select-style-1">
                  <label>Category</label>
                  <div class="select-position">
                    <select name="sellsp" id="" class="boloc">
                      <?php
                      foreach ($loaisp as $lspham) {
                        $selected = (isset($_POST['sellsp']) && $_POST['sellsp'] == $lspham->MaLoai) ? "selected" : "";
                      ?>
                        <option value="<?= $lspham->MaDanhMuc ?>" <?= $selected ?>><?= $lspham->TenDanhMuc ?></option>
                      <?php
                      }
                      ?>
                    </select>

                  </div>
                  <div class="form-row">
                    <input type="hidden" name="product_id" value="<?= $product->SanPham_id ?>">
                    <button type="submit" name="submit" class="save-changes">Save Changes</button>
                  </div>
                  <!-- end select -->
                </div>
                <!-- end input -->
              </div>
              <!-- end card -->
              <!-- ======= input style end ======= -->

              <!-- ======= select style start ======= -->

              <!-- end card -->
              <!-- ======= select style end ======= -->


              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
        </form>
      <?php
    }
      ?>
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