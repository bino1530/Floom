<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/loginn.css">
    <link rel="stylesheet" href="../asset/css/bass.css">
    <link rel="stylesheet" href="../asset/css/responsive.css">
    <title>Document</title>
</head>
<?php
 $uidError = "";
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'emptyinput') {
         $uidError =  "Fill in all fields";
    } elseif ($_GET['error'] == "wronglogin") {
        $uidError = "Incorrect login infomation";
    }
}
?>
<body>
    <header>
        <div class="logo-image">
            <a href="../index.php"><img src="../asset/image/index/floom.png" alt=""></a>
        </div>
    </header>
    <hr>
    <main class="design">
            <section class="login-form">
                <h3>Log In</h3>
                <form action="../includes/login.inc.php" method="post">
                    <div class="row">
                        <label for="">User Name</label>
                        <input type="text" name="uid" placeholder="User Name/Email...">
                    </div>
                    <div class="row">
                        <label for="">Password</label>
                        <input type="password" name="pwd" placeholder="PassWord...">
                    </div>
                    <div class="row">
                        <?php if (!empty($uidError)) echo "<p class='error'>$uidError</p>"; ?>
                    </div>
                    <input type="submit" name="login-submit" value="Log In">
                    <div class="row">
                    <?php if (!empty($loginError)) echo "<p class='error'>$loginError</p>"; ?>
                    </div>
                    <div class="row">
                        <p class="presslogin">Don’t have an account?<a href="signup.php"> Sign up</a></p>
                    </div>
                </form>
            </section>

    </main>

</body>

</html>