<?php
include("header.php");
include("../includes/connect.php");
if (isset($_GET['id'])) {
  $user = $_GET['id'];
  $sql = "SELECT * FROM tb_user WHERE User_id = :User_id";
  $sta = $conn->prepare($sql);
  $sta->bindParam(':User_id', $user, PDO::PARAM_INT);
  $sta->execute();
  if ($sta->rowCount()) {
    $user = $sta->fetch(PDO::FETCH_OBJ);
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
              <h2>User Update</h2>
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
                    User Update
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
        <form action="../includes/form-user-update.inc.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-12">
              <!-- input style start -->
              <div class="card-style mb-30">
                <div class="input-style-2">
                  <label>Username</label>
                  <input type="text" name="username" value="<?= $user->Username ?>" placeholder="product Name" />
                </div>
                <div class="select-style-1">
                  <label>Role</label>
                  <div class="select-position">
                    <select name="sellsp" id="" class="boloc">
                    <option value="Admin" <?= ($user->Role == 'Admin') ? 'selected' : '' ?>>Admin</option>
                    <option value="User" <?= ($user->Role == 'User') ? 'selected' : '' ?>>User</option>
                    </select>

                  </div>

                </div>
                <div class="form-row">
                  <input type="hidden" name="user_id" value="<?= $user->User_id ?>">
                  <button type="submit" name="submit" class="save-changes">Save Changes</button>
                </div>
              </div>
            </div>
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