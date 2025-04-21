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
  <link rel="icon" type="image/png" href="../asset/image/index/logo.png">
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
  <script src="../asset/js/quanity.js"></script>
  <link rel="stylesheet" href="../asset/css/bass.css" />
  <link rel="stylesheet" href="../asset/css/style.css" />
  <link rel="stylesheet" href="../asset/css/responsive.css" />
  <link rel="stylesheet" href="../asset/css/anim.css" />
  <link rel="stylesheet" href="../asset/css/profilee.css">
  <link rel="stylesheet" href="../asset/css/shop-product.css">
  <link rel="stylesheet" href="../asset/css/shop-product-main.css">
  <link rel="stylesheet" href="../asset/css/checkout.css">
  <script></script>
  <title>Shop</title>
</head>

<body>
 
  <div class="header-off">
    <div class="announcement_header">
      <p>
        Welcome To Floom
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
                $cartCount = 0;
                if (!empty($_SESSION['cart'])) {
                  foreach ($_SESSION['cart'] as $item) $cartCount += $item['quantity'];
                }
                echo "
                <span class='cart-wrapper'>
                    <i onclick='toggleSidebarcart()' class='fa-solid fa-bag-shopping cartbutton fa-lg'></i>
                    <span class='cart-count'>$cartCount</span>
                </span>";            
              }
        } else {
          $cartCount = 0;
          if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) $cartCount += $item['quantity'];
          }
          echo "<a href='../page/login.php'><i class='fa-solid fa-user fa-lg'></i></a>";
          echo "
          <span class='cart-wrapper'>
              <i onclick='toggleSidebarcart()' class='fa-solid fa-bag-shopping cartbutton fa-lg'></i>
              <span class='cart-count'>$cartCount</span>
          </span>";
        }
        ?>
      </div>
      <div class="custom-sidebar-cart">
  <i onclick="hideSidebarcart()" class="fa-solid fa-xmark close-cart-icon"></i>
  <div class="sidebar-content-cart">
      <?php if (!empty($_SESSION['cart'])): ?>
          <div class="cart-items-list">
              <?php foreach ($_SESSION['cart'] as $item): 
                  $imageSrc = strpos($item['image'], 'data:image') === 0 ? $item['image'] : 'data:image/jpeg;base64,' . base64_encode($item['image']);
              ?>
                  <div class="cart-item">
                      <img src="<?= $imageSrc ?>" alt="<?= $item['name'] ?>" class="cart-thumb">
                      <div class="cart-info">
                          <p class="cart-name"><?= $item['name'] ?></p>
                          <p class="cart-qty">Qty: <?= $item['quantity'] ?></p>
                          <p class="cart-price"><?= $item['price'] * $item['quantity'] ?>$</p>
                      </div>
                      <form method="post" action="includes/cart_trash.inc.php">
                          <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                          <button type="submit" class="cart-remove-btn"><i class="fa-solid fa-trash"></i></button>
                      </form>
                  </div>
              <?php endforeach; ?>
          </div>

          <div class="cart-footer">
              <div class="cart-total">Total: <strong>
                  <?= array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $_SESSION['cart'])) ?>$
              </strong></div>
              <a href="../page/checkout.php" class="btn btn-primary cart-checkout-btn">Checkout</a>
          </div>
      <?php else: ?>
          <div class="cart-empty">
              <img src="../asset/image/index/cart-icon.png" alt="Empty Cart" class="cart-empty-image">
              <div class="cart-word">
                  <p><strong>Oh no! Your cart is empty</strong></p>
                  <a href="../page/shop_product.php" class="cart-shop">Go To Shopping</a>
              </div>
          </div>
      <?php endif; ?>
  </div>
</div>

      <div class="sidebar">
        <ul>
          <i onclick="hideSidebar()" class="fa-solid fa-xmark"></i>
          <li class="dropdown-topic-main"><a href="page/shop_product.php">Shop</a></li>
          <li class="dropdown-topic-main"><a href="">Subscription</a></li>
          <li class="dropdown-topic-main"><a href="">About Us</a></li>
        </ul>
      </div>
    </div>
  </header>
</div>