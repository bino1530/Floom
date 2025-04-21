<?php

include("../main/header1.php");
include("../includes/connect.php");
include("../includes/search.inc.php");
include("../includes/page.php");
?>

<main>
    <div class="grid">
        <div class="scroll-list-layout">
            <div class="scroll-list">
                <div class="button-choose">
                    <a href="shop_product.php" class="<?= !isset($_GET['Category_ID']) ? 'active' : '' ?>">All</a>
                    <?php foreach ($productlist as $pdlist): ?>
                        <a href="?Category_ID=<?= $pdlist->MaDanhMuc ?>" class="<?= isset($_GET['Category_ID']) && $_GET['Category_ID'] == $pdlist->MaDanhMuc ? 'active' : '' ?>">
                            <?= $pdlist->TenDanhMuc ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="grid">
        <div class="product-layout">
            <div class="product-layout-row row">
                <div class="product-layout-col col-lg-2 col-sm-12 col-12">
                    <div class="product-sort">
                        <div class="product-sort-row row">
                            <p class="flip-sort dropdown-status">Price</p>
                            <p class="panel-sort"><input type="checkbox" name="" id="">
                                < 20$</p>
                                    <p class="panel-sort"><input type="checkbox" name="" id=""> 20$ - 50$</p>
                                    <p class="panel-sort"><input type="checkbox" name="" id=""> 50$ - 100$</p>
                                    <p class="panel-sort"><input type="checkbox" name="" id=""> 100$ - 200$</p>
                                    <p class="panel-sort"><input type="checkbox" name="" id=""> > 200$</p>
                        </div>
                        <div class="product-sort-row row">
                            <p class="flip-sort dropdown-status">Popular</p>
                            <?php
                            foreach ($productlist as $pdlist) {
                            ?>
                                <p class="panel-sort"><input type="checkbox" name="" id=""> <?= $pdlist->TenDanhMuc ?></p>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="product-sort-row row">
                            <p class="flip-sort dropdown-status"> Pet Friendly</p>
                            <p class="panel-sort"><input type="checkbox" name="" id=""> Yes</p>
                        </div>
                        <div class="product-sort-row row">
                            <p class="flip-sort dropdown-status"> Air Cleaner </p>
                            <p class="panel-sort"><input type="checkbox" name="" id=""> Yes</p>
                        </div>
                        <div class="product-sort-row row">
                            <p class="flip-sort dropdown-status"> Add on</p>
                            <p class="panel-sort"><input type="checkbox" name="" id=""> Yes</p>

                        </div>
                    </div>
                </div>
                <span class="filterbutton" onclick="toggleSidebar()">Sort/Filter</span>
                <div class="custom-sidebar">
                    <span class="filter">Sort/Filter</span>
                    <div class="sidebar-content">
                        <div class="product-layout-col col-lg-2 col-sm-12 col-12">
                            <div class="product-sort1">
                                <div class="product-sort-row row">
                                    <p class="flip-sort dropdown-status">Price</p>
                                    <p class="panel-sort"><input type="checkbox" name="" id="">
                                        < 20$</p>
                                            <p class="panel-sort"><input type="checkbox" name="" id=""> 20$ - 50$</p>
                                            <p class="panel-sort"><input type="checkbox" name="" id=""> 50$ - 100$</p>
                                            <p class="panel-sort"><input type="checkbox" name="" id=""> 100$ - 200$</p>
                                            <p class="panel-sort"><input type="checkbox" name="" id=""> > 200$</p>
                                </div>
                                <div class="product-sort-row row">
                                    <p class="flip-sort dropdown-status">Popular</p>
                                    <?php
                                    foreach ($productlist as $pdlist) {
                                    ?>
                                        <p class="panel-sort"><input type="checkbox" name="" id=""> <?= $pdlist->TenDanhMuc ?></p>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="product-sort-row row">
                                    <p class="flip-sort dropdown-status"> Pet Friendly</p>
                                    <p class="panel-sort"><input type="checkbox" name="" id=""> Yes</p>
                                </div>
                                <div class="product-sort-row row">
                                    <p class="flip-sort dropdown-status"> Air Cleaner </p>
                                    <p class="panel-sort"><input type="checkbox" name="" id=""> Yes</p>
                                </div>
                                <div class="product-sort-row row">
                                    <p class="flip-sort dropdown-status"> Add on</p>
                                    <p class="panel-sort"><input type="checkbox" name="" id=""> Yes</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-layout-col col-lg-10 col-sm-12 col-12">
                    <div class="product-main-row row g-4">
                        <div class="product-main-col col-lg-12 col-sm-12 col-12">
                            <div class="search">
                                <form action="" class="search" method="GET">
                                    <input type="text" name="search" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" placeholder="Search...">
                                    <input type="submit" value="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="product-main-row row g-4">
                        <?php if (!empty($product)) { ?>
                            <?php foreach ($product as $pd) {
                                $imagesArray = json_decode($pd->HinhAnh, true);
                                $profilePic = !empty($imagesArray) ? "data:image/jpeg;base64," . $imagesArray[0] : "default-image.jpg";
                            ?>
                                <div class="product-main-col col-lg-4 col-sm-6 col-12">
                                    <div class="product-image">
                                        <img src="<?= $profilePic ?>" onclick="window.open('shop_product_main.php?id=<?= $pd->SanPham_id ?>','_self')" alt="">
                                    </div>
                                    <div class="product-info">
                                        <p class="product-name"><?= $pd->TenSanPham ?></p>
                                        <p class="product-price1">From <strong><?= $pd->Gia ?>$</strong></p>
                                    </div>
                                    <div class="product-price">
                                        <p class="subcribe">Subscribe for 30% off</p>
                                        <p class="product-price1">From <strong><?= round($pd->Gia * 0.7, 2) ?>$</strong></p>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <p class="no-products">Không có sản phẩm nào.</p>
                        <?php } ?>
                    </div>

                    <div class="phantrang">
                        <?php for ($so = 1; $so <= $tong_trang; $so++) { ?>
                            <a href="?Category_ID=<?= $category_id ?>&page=<?= $so ?>" class="<?= ($so == $trang_ht) ? 'current-page' : '' ?>">
                                <?= $so ?>
                            </a>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<?php
include("../main/footer.php")
?>