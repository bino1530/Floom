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
$nameError = $emailError = $uidError = $pwdError = $pwdRepeatError = "";
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'emptyinput') {
        $nameError = $emailError = $uidError = $pwdError = $pwdRepeatError = "Fill in all fields";
    } elseif ($_GET['error'] == "invaliduid") {
        $uidError = "Choose a proper user name";
    } elseif ($_GET['error'] == "invalidemail") {
        $emailError = "Choose a proper email";
    } elseif ($_GET['error'] == "passworddontmatch") {
        $pwdError = $pwdRepeatError = "Passwords do not match";
    } elseif ($_GET['error'] == "stmtfailed") {
        echo "<p> Something went wrong, try again </p>";
    } elseif ($_GET['error'] == "usernametaken") {
        $uidError = "Username already taken";
    } elseif ($_GET['error'] == "none") {
        $gerneralError =  "<p> You have signed up! </p>";
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
    <main>
        <div class="grid">
            <section class="signup-form">
                <h3>Sign Up</h3>
                <form action="../includes/signup.inc.php" method="post">
                <div class="row">
                        <label for="">Full Name</label>
                        <input type="text" name="name" placeholder="Full Name...">
                        <?php if (!empty($nameError)) echo "<p class='error'>$nameError</p>"; ?>
                    </div>
                    <div class="row">
                        <label for="">Email</label>
                        <input type="text" name="email" placeholder="Email...">
                        <?php if (!empty($emailError)) echo "<p class='error'>$emailError</p>"; ?>
                    </div>
                    <div class="row">
                        <label for="">User Name</label>
                        <input type="text" name="uid" placeholder="User Name...">
                        <?php if (!empty($uidError)) echo "<p class='error'>$uidError</p>"; ?>
                    </div>
                    <div class="row">
                        <label for="">Password</label>
                        <input type="password" name="pwd" placeholder="PassWord...">
                        <?php if (!empty($pwdError)) echo "<p class='error'>$pwdError</p>"; ?>
                    </div>
                    <div class="row">
                        <label for="">Password Repeat</label>
                        <input type="password" name="pwdrepeat" placeholder="PassWord Repeat...">
                        <?php if (!empty($pwdRepeatError)) echo "<p class='error'>$pwdRepeatError</p>"; ?>
                    </div>
                    <input type="submit" name="submit" value="Sign Up">
                    <div class="row">
                        <p class="presslogin">Already have an account? <a href="login.php"> Sign in</a></p>
                    </div>
                </form>
            </section>
        </div>

    </main>

</body>

</html>