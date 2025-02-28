<?php
include_once 'main/header.php';
?>
<html>

<body>

  <div class="big">
    <main>
    <?php
  //  index.php
  
      $page = isset($_GET['page']) ? $_GET['page'] : 'home'; // Mặc định là 'home'
  
      switch ($page) {
          case 'home':
              include 'page/main.php';
              break;
          case 'login':
              include 'page/login.php';
              break;
          case 'profile':
              include 'page/profile.php';
              break;
          case 'register':
              include 'page/register.php';
              break;
          case 'about':
              include 'page/about.php';
              break;
          default:
              echo "<h2>404 - Trang không tồn tại</h2>";
              break;
              
      }
?>
    </main>
  <?php
  include_once 'main/footer.php';
  ?>
</body>

</html>