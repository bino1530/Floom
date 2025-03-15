<?php
include("../main/header1.php");
include("../includes/connect.php");

// Lấy giá trị Ma_DanhMuc từ URL, mặc định là 'all' nếu không được thiết lập
$category_id = isset($_GET['Category_ID']) ? $_GET['Category_ID'] : 'all';
$sql = "SELECT * FROM tb_danhmuc ORDER BY MaDanhMuc ASC";
$sta = $conn->prepare($sql);
$sta->execute();
$productlist = array();
if ($sta->rowCount() > 0) {
    $productlist = $sta->fetchAll(PDO::FETCH_OBJ);
}
// Bắt đầu đếm số trang
$sp_trang = 5;
if ($category_id === 'all') {
    $sql_count = "SELECT COUNT(*) FROM tb_sanpham";
} else {
    $sql_count = "SELECT COUNT(*) FROM tb_sanpham WHERE Ma_DanhMuc = :Ma_DanhMuc";
}
$sta_count = $conn->prepare($sql_count);
if ($category_id !== 'all') {
    $sta_count->bindParam(':Ma_DanhMuc', $category_id, PDO::PARAM_STR);
}
$sta_count->execute();
$tong_sp = $sta_count->fetchColumn();
$tong_trang = ceil($tong_sp / $sp_trang);
$trang_ht = min($tong_trang, max(1, isset($_GET['page']) ? $_GET['page'] : 1));
$vtbd = ($trang_ht - 1) * $sp_trang;
//Xử lý tổng sp và xử lý tổng sp khi mình chọn danh mục khác 
if ($category_id === 'all') {
    $sql = "SELECT * FROM tb_sanpham ORDER BY SanPham_id ASC LIMIT " . $vtbd . ", " . $sp_trang;
} else {
    $sql = "SELECT * FROM tb_sanpham WHERE Ma_DanhMuc = :Ma_DanhMuc ORDER BY SanPham_id ASC LIMIT " . $vtbd . ", " . $sp_trang;
}
$sta = $conn->prepare($sql);
if ($category_id !== 'all') {
    $sta->bindParam(':Ma_DanhMuc', $category_id, PDO::PARAM_STR);
}
$sta->execute();
$product = array();
if ($sta->rowCount() > 0) {
    $product = $sta->fetchAll(PDO::FETCH_OBJ);
}
?>
<main>
    <div class="grid">
        <div class="scroll-list-layout">
            <div class="scroll-list">
                <div class="button-choose">
                    <a href="shop_product.php">All</a>
                    <?php
                    foreach ($productlist as $pdlist) {
                    ?>
                        <a href="?Category_ID=<?= $pdlist->MaDanhMuc ?>"><?= $pdlist->TenDanhMuc ?></a>
                    <?php
                    }
                    ?>
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
                    <div class="product-main-row row">
                        <?php
                        foreach ($product as $pd) {
                            $imagesArray = json_decode($pd->HinhAnh, true);
                            $profilePic = "data:image/jpeg;base64," . $imagesArray[0];                         
                        ?>
                            <div class="product-main-col col-lg-4 col-sm-6 col-12">
                                <div class="product-image">
                                    <img src="<?= $profilePic ?>" alt="">
                                </div>
                                <div class="product-info">
                                    <p class="product-name"><?= $pd->TenSanPham ?></p>
                                    <p class="subcribe">Subscribe for 30% off</p>
                                </div>
                                <div class="product-price">
                                    <p class="product-price1">From <strong><?= $pd->Gia ?>$</strong></p>
                                    <a href="">Buy Now</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="phantrang">
                        <?php
                        for ($so = 1; $so <= $tong_trang; $so++) {
                            if ($so != $trang_ht) {
                        ?>
                                <a href="?Category_ID=<?= $category_id ?>&page=<?= $so ?>"><?= $so ?></a>
                            <?php
                            } else {
                            ?>
                                <span class="current-page"><?= $so ?></span>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include("../main/footer.php")
?>