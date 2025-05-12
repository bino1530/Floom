<?php
include("../main/header1.php");
?>
<main>
    <div class="bg-reset">
        <div class="reset-container">
            <div class="reset-header">
                <h2>Enter Verification Code</h2>
            </div>

            <div class="reset-content">
                <form action="" method="post">
                    <?php
                        if(isset($_POST['submit'])){
                            $error = [];
                            if($_POST['text'] != $_SESSION['reset_code']){
                                $error['fail'] = 'Invalid verification code!';
                            } else {
                                header('location: ResetPass.php');
                            }
                        }
                    ?>

                    <?php if(isset($error['fail'])): ?>
                        <div class="error-message" style="background: #f8d7da; color: darkred;">
                            <?= $error['fail'] ?>
                        </div>
                    <?php else: ?>
                        <div class="success-message">
                            Please enter the verification code we sent to your email.
                        </div>
                    <?php endif; ?>

                    <input class="reset-input" type="text" name="text" placeholder="Enter verification code">

                    <button type="submit" name="submit" class="reset-btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>
