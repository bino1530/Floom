<div class="profile_content_layout" id="dashboard">
    <p class="account">Hello
        <?php
        if (isset($_SESSION["username"])) {
            echo "<a href='' class='username-account'>" . $_SESSION["username"] . "</a>";
        }
        ?>
        (not
        <?php
        if (isset($_SESSION["username"])) {
            echo "<a href='' class='username-account'>" . $_SESSION["username"] . "</a>";
        }
        ?>
        ?<?php
            if (isset($_SESSION['username'])) {
                echo " <a href='../includes/logout.inc.php' >Log Out </a>";
            }
            ?>)</p>
    <p class="account">From your account dashboard you can view your recent orders, manage your shipping and billing addresses,
        and edit your password and account details.
    </p>
</div>