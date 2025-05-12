<?php
session_start();
include("../main/header1.php");
?>
<main>
    <?php
    if (isset($_POST['submit'])) {
        $error = [];
        $email = trim($_POST['email']);

        // Check for empty input
        if ($email == '') {
            $error['email'] = "Email is required. Please enter your email.";
        }

        if (empty($error)) {
            include("../includes/connect.php");
            $sql = "SELECT * FROM tb_user WHERE Email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if ($user) {
                // Email exists, generate and send code
                $code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
                $title = "Reset Password";
                $content = '
                    <div style="max-width: 600px; margin: auto; font-family: Arial, sans-serif; border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
                        <h2 style="color: #1e2934; text-align: center;">🌸 Floom - Forgot Password</h2>
                        <p>Hello,</p>
                        <p>We received a request to reset your password. Here is your verification code:</p>
                        <div style="text-align: center; margin: 20px 0;">
                            <span style="font-size: 28px; font-weight: bold; color: #1e2934; background-color: #f0f0f0; padding: 10px 20px; border-radius: 6px; display: inline-block;">' . $code . '</span>
                        </div>
                        <p>Please use this code within <strong>5 minutes</strong> to verify your request.</p>
                        <hr style="margin: 20px 0;">
                        <p style="font-size: 13px; color: #777;">If you did not request a password reset, please ignore this email or contact our support team.</p>
                        <p style="font-size: 13px; color: #777;">Best regards,<br>The Floom Team</p>
                    </div>';

                // Make sure $mail is initialized
                $mail->sendMail($title, $content, $email);

                $_SESSION['reset_code'] = $code;
                $_SESSION['email_reset'] = $email;

                header("Location: Verification.php");
                exit();
            } else {
                $error['email'] = "Email does not exist in our system.";
            }
        }
    }
    ?>

<div class="bg-reset">
    <div class="reset-container">
        <div class="reset-header">
            <h2>Forgot Password</h2>
            <p>Please enter your email to receive a verification code.</p>
        </div>

        <div class="reset-content">
            <form action="" method="post">
                <?php if (isset($error['email'])): ?>
                    <div class="error-message"><?= $error['email'] ?></div>
                <?php endif; ?>

                <input class="reset-input" type="email" name="email" placeholder="Enter your email">
                <button type="submit" name="submit" class="reset-btn">Send Verification Code</button>
            </form>
        </div>
    </div>
</div>
</main>
