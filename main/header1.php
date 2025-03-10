<?php
session_start();
require_once '../includes/connect.php'; // Ensure this file contains your database connection

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
            <li class="dropdown-btn">
              <a class="nav-off" href="#" onclick="toggleShopDropdown()">Shop</a>
              <div id="shop-dropdown" class="dropdown-menu">
                <div class="dropdown-column">
                  <h4>Shop All</h4>
                  <a href="#">All</a>
                  <a href="#">Valentine</a>
                  <a href="#">Flowers</a>
                  <a href="#">Gifts</a>
                  <a href="#">Birthday</a>
                </div>
                <div class="dropdown-column">
                  <h4>Fantastic flowers</h4>
                  <a href="#">Roses</a>
                  <a href="#">Orchids</a>
                  <a href="#">Succulents</a>
                </div>
                <div class="dropdown-column">
                  <h4>Perfect plants</h4>
                  <a href="#">Indoor Plants</a>
                  <a href="#">Monstera</a>
                  <a href="#">Cactus</a>
                </div>
              </div>
            </li>
            <li><a class="nav-off" href="">Same-Day</a></li>
            <li><a class="nav-off" href="">Subscription</a></li>
            <li><a class="nav-off" href="">Roses</a></li>
          </ul>
        </div>
        <div class="logo">
          <a href="../index.php"><img src="../asset/image/index/floom.png" alt="" /></a>
        </div>
        <div class="login">
        <?php
          if (isset($_SESSION["username"])) {
            if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Admin') {
                echo "<a href='admin/index.php' class='username'>". $_SESSION["username"]  . "<img src='" . $profilePic . "' class='profile-image' alt='Profile Picture'> </a>";
              } else {
                
                echo "<a href='page/profile.php' class='username'>". $_SESSION["username"]  . "<img src='" . $profilePic . "' class='profile-image' alt='Profile Picture'> </a>";
                echo "<a href=''><i class='fa-solid fa-bag-shopping fa-lg'></i></a> ";
            
              }
        } else {
            echo "<a href='page/login.php'><i class='fa-solid fa-user fa-lg'></i></a>";
            echo "<a href=''><i class='fa-solid fa-bag-shopping fa-lg'></i></a> ";
        }
          ?>
        </div>
        <div class="sidebar">
          <ul>
            <i onclick="hideSidebar()" class="fa-solid fa-xmark"></i>
            <li
              class="dropdown-topic-main"
              onclick="toggleShopDropdownSidebar()">
              <a href="#">Shop</a>
            </li>
            <ul id="shop-dropdown-sidebar" class="sidebar-dropdown">
              <li class="dropdown-topic"><strong>All</strong></li>
              <li class="dropdown-content"><a href="#">Valentine</a></li>
              <li class="dropdown-content"><a href="#">Flowers</a></li>
              <li class="dropdown-content"><a href="#">Gifts</a></li>
              <li class="dropdown-content"><a href="#">Birthday</a></li>
              <li class="dropdown-topic">
                <strong>Fantastic flowers</strong>
              </li>
              <li class="dropdown-content"><a href="#">Roses</a></li>
              <li class="dropdown-content"><a href="#">Orchids</a></li>
              <li class="dropdown-content"><a href="#">Succulents</a></li>
              <li class="dropdown-topic">
                <strong>Perfect plants</strong>
              </li>
              <li class="dropdown-content">
                <a href="#">Perfect plants</a>
              </li>
              <li class="dropdown-content"><a href="#">Monstera</a></li>
              <li class="dropdown-content"><a href="#">Cactus</a></li>
            </ul>
            <li class="dropdown-topic-main">
              <a href="">Same-Day Delivery</a>
            </li>
            <li class="dropdown-topic-main"><a href="">Subscription</a></li>
            <li class="dropdown-topic-main"><a href="">Roses</a></li>
          </ul>
        </div>
      </div>
    </header>
  </div>