<?php
    include_once ("../includes/profile_details.inc.php");
    ?>
<body>
    <div class="profile_content_layout" id="account-details">
        <h2>Account Details</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" value="<?php echo $HoTen; ?>" required>
            </div>
            <div class="form-row">
                <label for="email_address">Email Address:</label>
                <input type="email" id="email_address" name="email_address" value="<?php echo $Email; ?>" required>
            </div>
            <div class="form-row">
                <label for="hinhanh">Profile Image:</label>
                <input type="file" id="hinhanh" name="hinhanh">
            </div>
            <div class="form-row">
                <button type="submit" class="save-changes">Save Changes</button>
            </div>
        </form>

        <?php if (isset($successMessage)) { ?>
            <div class="success-message"><?php echo $successMessage; ?></div>
        <?php } ?>

        <div class="password-section">
            <div class="password-title">Change Password</div>
            <form action="" method="post">
                <div class="form-row">
                    <label for="current-password">Current Password:</label>
                    <input type="password" id="current-password" name="current-password" required>
                </div>
                <div class="form-row">
                    <label for="new-password">New Password:</label>
                    <input type="password" id="new-password" name="new-password" placeholder="Enter your new password" required>
                </div>
                <div class="form-row">
                    <label for="repeat-password">Repeat New Password:</label>
                    <input type="password" id="repeat-password" name="repeat-password" placeholder="Repeat your new password" required>
                </div>
                <div class="form-row">
                    <button type="submit" class="save-changes">Save Changes</button>
                </div>
            </form>
            <?php if (isset($successMessage1)) { ?>
                <div class="success-message"><?php echo $successMessage1; ?></div>
            <?php } ?>
        </div>
    </div>
</body>
