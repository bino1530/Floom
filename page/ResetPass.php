<?php include("../main/header1.php"); ?>

<main>
    <div class="bg-reset">
        <div class="reset-container">
            <div class="reset-header">
                <h2>Reset Password</h2>
            </div>

            <div class="reset-content">
                <form action="" method="post">
                    <?php
                        if (isset($_POST['submit'])) {
                            $error = [];
                            $newpass = $_POST['newpass'] ?? '';
                            $repass = $_POST['repass'] ?? '';
                        
                            if ($newpass !== $repass) {
                                $error['fail'] = 'Password confirmation does not match!';
                            } elseif (empty($newpass)) {
                                $error['fail'] = 'Password cannot be empty!';
                            } else {
                                $userEmail = $_SESSION['email_reset'];
                                $pass = $newpass;

                                $sql = "UPDATE tb_user SET Userpassword = ? WHERE Email = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute([$pass, $userEmail]);

                                $error['success'] = 'Password changed successfully! Redirecting in 3 seconds.';
                                header("refresh:3;url=login.php");
                            }
                        }
                    ?>

                    <?php if (isset($error['fail'])): ?>
                        <div class="error-message" style="background: #f8d7da; color: darkred;">
                            <?= $error['fail'] ?>
                        </div>
                    <?php elseif (isset($error['success'])): ?>
                        <div class="success-message">
                            <?= $error['success'] ?>
                        </div>
                    <?php else: ?>
                        <div class="success-message" style="background-color: var(--green-color); color: white;">
                            Reset your new password here
                        </div>
                    <?php endif; ?>

                    <input class="reset-input" type="password" name="newpass" placeholder="Enter new password" required>
                    <input class="reset-input" type="password" name="repass" placeholder="Confirm password" required>

                    <button type="submit" name="submit" class="reset-btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>
