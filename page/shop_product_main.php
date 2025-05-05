<?php
include "../main/header1.php";
include "../includes/connect.php";
if (isset($_GET['id'])) {
    $sanphamid = $_GET['id'];
    include("../includes/connect.php");
    $sql = "SELECT * FROM tb_sanpham WHERE SanPham_id = :SanPham_id";
    $sta = $conn->prepare($sql);
    $sta->bindParam(':SanPham_id', $sanphamid, PDO::PARAM_INT);
    $sta->execute();
    if ($sta->rowCount()) {
        $product = $sta->fetch(PDO::FETCH_OBJ);
    }
?>
    <main>
        <div class="grid">
            <div class="shopping-layout-row row">
                <div class="shopping-layout-col col-lg-1 col-sm-1 col-12">
                    <?php
                    $imagesArray = json_decode($product->HinhAnh, true);
                    if (!empty($imagesArray)) {
                        foreach ($imagesArray as $image) {
                    ?>
                            <div class="shopping-image-small-col col-lg-12 col-sm-12 col-12">
                                <img src="data:image/jpeg;base64,<?= $image ?>" alt="">
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="shopping-layout-col col-lg-5 col-sm-5 col-12">
                    <div class="shopping-image-row row">
                        <div class="shopping-image-col col-lg-12 col-sm-12 col-12">
                            <?php
                            $imagesArray = json_decode($product->HinhAnh, true);
                            if (!empty($imagesArray)) {
                                $image = "data:image/jpeg;base64," . $imagesArray[0];
                            ?>
                                <div class="shopping-image-col col-lg-12 col-sm-12 col-12">
                                    <img src="<?= $image ?>" alt="First Product Image">
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="shopping-layout-col col-lg-6 col-sm-6 col-12">
                    <div class="shopping-content-row row">
                        <div class="shopping-content-col col-lg-12 col-sm-12 col-12">
                            <div class="shopping-topic">
                                <h1 class="topic"><?= $product->TenSanPham ?></h1>
                                <p><?= $product->MoTaSP ?></p>
                            </div>
                            <div class="select-size">
                                <p><strong>Select-size</strong></p>
                                <div class="select-size-item">
                                    <div class="select-size-image">
                                        <?php
                                        $imagesArray = json_decode($product->HinhAnh, true);
                                        if (!empty($imagesArray)) {
                                            $image = "data:image/jpeg;base64," . $imagesArray[0];
                                        ?>
                                            <img src="<?= $image ?>" alt="First Product Image">

                                            <p class="topic-stem">15 Stems</p>
                                            <p class="topic-stem">From <?= $product->Gia ?>$</p>
                                    </div>
                                    <div class="select-size-image">
                                        <img src="<?= $image ?>" alt="First Product Image">
                                        <p class="topic-stem">+20 Stems</p>
                                        <p class="topic-stem">From <?= round($product->Gia + 10) ?>$</p>
                                    </div>
                                    <div class="select-size-image">
                                        <img src="<?= $image ?>" alt="First Product Image">
                                        <p class="topic-stem">+30 Stems</p>
                                        <p class="topic-stem">From <?= round($product->Gia + 20) ?>$</p>
                                    </div>
                                    <div class="select-size-image">
                                        <img src="<?= $image ?>" alt="First Product Image">
                                    <?php
                                        }
                                    ?>
                                    <p class="topic-stem">+40 Stems</p>
                                    <p class="topic-stem">From <?= round($product->Gia + 30) ?>$</p>
                                    </div>
                                </div>
                            </div>
                            <form method="post" action="../includes/cart.inc.php">
                                <input type="hidden" name="product_id" value="<?= $product->SanPham_id ?>">
                                <input type="hidden" name="product_name" value="<?= $product->TenSanPham ?>">
                                <input type="hidden" name="price" value="<?= $product->Gia ?>">
                                <input type="hidden" name="image" value="<?= $imagesArray[0] ?>">
                                <div class="quantity-wrapper">
                                    <button type="button" class="qty-btn minus">-</button>
                                    <input type="number" name="quantity" value="1" min="1" class="qty-input">
                                    <button type="button" class="qty-btn plus">+</button>
                                </div>
                                <button type="submit" class="addtocartbutton">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
}
    ?>
    <hr>
    <div class="grid">
        <div class="subcriptionss">
            <h2>Details, Details, Details</h2>
        </div>
        <div class="subcriptions-content">
            <ul>
                <li>"Gold You So” is a design-it-yourself arrangement of fifty (50!) grower's choice daffodils. Daffodils ship straight from the Oregon Farm where they grown to your doorstep wrapped in some protective paper, a piece of burlap, and tied with a bow!</li>
                <li><strong>What does grower's choice mean?</strong> You bouquet could be fifty of the same variety and/or color or it could be a combination of two (or more!) varieties and/or colors! Sorry, we cannot accommodate special requests for specific colors of varieties.</li>
                <li>Daffodils arrive ready for a quick trim, your design prowess, and a vase (or vases!) of your choosing from your own private collection. Pro tip: Choose something short (5-6” tall) to fully appreciate these daffs’ dainty stem length!</li>
                <li><strong>Patience required – Daffodils</strong> will arrive mostly budded, but a little time (a day or two) and TLC (a fresh trim and a vaseful of water) is all they need to blossom awesomely! If you're ordering "Gold You So” for a special event, have it arrive ahead of the occasion to ensure they are fully bloomed for the big day.</li>
                <li><strong>Fragrant</strong> flowers – Some specialty daffodils are naturally fragrant. For this reason, we don’t recommend sending "Gold You So” to scent-sensitive folks.</li>
            </ul>
            <p>
                The Floom Promise: While working with Mother Nature means we can’t guarantee that the flower varieties and colors will be exactly as pictured, we can guarantee that we always ship the highest quality stems we can source from our growers and that your arrangement will be fresh, beautiful, and you (or your recipient!) will love it.
            </p>
            <p>
                Please note: Sale items are not eligible for additional discounts.
            </p>
        </div>
    </div>
    <hr>
    </main>
    <?php
    include "../main/footer.php";
    ?>