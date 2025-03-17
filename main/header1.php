<?php
session_start();
require_once '../includes/connect.php';

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];

    $sql = "SELECT HinhAnh FROM tb_user WHERE Username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && !empty($user["HinhAnh"])) {
        $profilePic = "data:image/jpeg;base64," . base64_encode($user["HinhAnh"]);
    } else {
        $profilePic = "../asset/image/index/smile.png"; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="website icon" type="png" href=".asset/image/index/logo.png" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="../asset/js/announcement.js"></script>
  <script src="../asset/js/nav.js"></script>
  <script src="../asset/js/slideshow.js"></script>
  <script src="../asset/js/dropdown.js"></script>
  <script src="../asset/js/appear.js"></script>
  <link rel="stylesheet" href="../asset/css/bass.css" />
  <link rel="stylesheet" href="../asset/css/style.css" />
  <link rel="stylesheet" href="../asset/css/responsive.css" />
  <link rel="stylesheet" href="../asset/css/anim.css" />
  <link rel="stylesheet" href="../asset/css/profilee.css">
  <link rel="stylesheet" href="../asset/css/shop-product.css">
  <link rel="stylesheet" href="../asset/css/shop-product-main.css">
  <script></script>
  <title>Document</title>
</head>

<body>
  <div class="header-off">
    <div class="announcement_header">
      <p>
        Save 20% On The Perfect Valentine's Day Bouquet! Use Code VDAYHEAT
      </p>
    </div>
    <header>
      <div class="overlay" id="overlay"></div>
      <div class="header_nav_row">
        <div class="navigation">
          <ul class="fix">
            <li>
              <i class="fa-solid fa-bars bars" onclick="showSidebar()"></i>
            </li>
            <li><a class="nav-off" href="../page/shop_product.php">Shop</a></li>
            <li><a class="nav-off" href="">Subscription</a></li>
            <li><a class="nav-off" href="">About Us</a></li>
          </ul>
        </div>
        <div class="logo">
          <a href="../index.php"><img src="../asset/image/index/floom.png" alt="" /></a>
        </div>
        <div class="login">
        <?php
          if (isset($_SESSION["username"])) {
            if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Admin') {
                echo "<a href='../admin/index.php' class='username'>". $_SESSION["username"]  . "<img src='" . $profilePic . "' class='profile-image' alt='Profile Picture'> </a>";
              } else {
                
                echo "<a href='../page/profile.php' class='username'>". $_SESSION["username"]  . "<img src='" . $profilePic . "' class='profile-image' alt='Profile Picture'> </a>";
                echo "<a href=''><i class='fa-solid fa-bag-shopping fa-lg'></i></a> ";
            
              }
        } else {
            echo "<a href='../page/login.php'><i class='fa-solid fa-user fa-lg'></i></a>";
            echo "<span href=''><i onclick='toggleSidebar-cart()' class='fa-solid fa-bag-shopping cartbutton fa-lg'></i></span> ";
        }
          ?>
        </div>
        <div class="custom-sidebar-cart">
            <i onclick="hideSidebarcart()" class="fa-solid fa-xmark"></i>
            <div class="sidebar-content-cart">
                <div class="cart-empty-image">
                    <img src="../asset/image/index/cart-icon.png" alt="">
                </div>
            </div>
            <div class="cart-word"> 
                    <p><strong>Oh no! Your cart is empty</strong></p>
                    <a href="../page/shop_product.php" class="cart-shop">Go To Shopping</a>
                </div>
          </div>
        <div class="sidebar">
          <ul>
            <i onclick="hideSidebar()" class="fa-solid fa-xmark"></i>
            <li class="dropdown-topic-main"><a href="../page/shop_product.php">Shop</a></li>
            <li class="dropdown-topic-main"><a href="">Subscription</a></li>
            <li class="dropdown-topic-main"><a href="">Roses</a></li>
          </ul>
        </div>
      </div>
    </header>
  </div>