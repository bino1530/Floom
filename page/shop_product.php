<?php
include ("../main/header1.php");
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
if ($category_id === 'all') {
  $sql = "SELECT * FROM tb_sanpham ORDER BY SanPham_id ASC";
} else {
  $sql = "SELECT * FROM tb_sanpham WHERE Ma_DanhMuc = :Ma_DanhMuc ORDER BY SanPham_id ASC";
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
    <hr>
    <div class="product-layout">
        <div class="product-layout-row row">
            <div class="product-layout-col col-lg-2 col-sm-12 col-12">
                <div class="product-sort">
                    <div class="product-sort-row row">
                        <p class="flip-sort dropdown-status">Price</p>
                        <p class="panel-sort"><input type="checkbox" name="" id=""> < 20$</p>
                        <p class="panel-sort"><input type="checkbox" name="" id=""> 20$ - 50$</p>
                        <p class="panel-sort"><input type="checkbox" name="" id=""> 50$ - 100$</p>
                        <p class="panel-sort"><input type="checkbox" name="" id=""> 100$ - 200$</p>
                        <p class="panel-sort"><input type="checkbox" name="" id=""> > 200$</p>
                    </div>
                    <div class="product-sort-row row">
                        <p class="flip-sort dropdown-status">Popular</p>
                        <?php
                            foreach($productlist as $pdlist){
                        ?>
                        <p class="panel-sort"><input type="checkbox" name="" id=""> <?=$pdlist->TenDanhMuc?></p>
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
                        <p class="panel-sort"><input type="checkbox" name="" id=""> < 20$</p>
                        <p class="panel-sort"><input type="checkbox" name="" id=""> 20$ - 50$</p>
                        <p class="panel-sort"><input type="checkbox" name="" id=""> 50$ - 100$</p>
                        <p class="panel-sort"><input type="checkbox" name="" id=""> 100$ - 200$</p>
                        <p class="panel-sort"><input type="checkbox" name="" id=""> > 200$</p>
                    </div>
                    <div class="product-sort-row row">
                        <p class="flip-sort dropdown-status"> Add on</p>
                        <p class="panel-sort"><input type="checkbox" name="" id=""> < 20$</p>
                        <p class="panel-sort"><input type="checkbox" name="" id=""> 20$ - 50$</p>
                        <p class="panel-sort"><input type="checkbox" name="" id=""> 50$ - 100$</p>
                        <p class="panel-sort"><input type="checkbox" name="" id=""> 100$ - 200$</p>
                        <p class="panel-sort"><input type="checkbox" name="" id=""> > 200$</p>
                    </div>
                </div>
            </div>
            <div class="product-layout-col col-lg-10 col-sm-12 col-12">
                <div class="product-main-row row">
                <?php
                    foreach ($product as $pd) {
                    $profilePic = "data:image/jpeg;base64," . $pd->HinhAnh;
                  ?>
                    <div class="product-main-col col-lg-4 col-sm-6 col-12">
                        <div class="product-image">
                            <img src="<?= $profilePic?>" alt="">
                        </div>
                        <div class="product-info">
                            <p class="product-name"><?=$pd->TenSanPham?></p>
                            <p class="subcribe">Subscribe for 30% off</p>
                        </div>
                        <div class="product-price">
                            <p class="product-price1">From <strong><?=$pd->Gia?>$</strong></p>
                            <a href="">Buy Now</a>
                        </div>
                    </div>
                    <?php
                    }
                  ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include ("../main/footer.php")
?>
