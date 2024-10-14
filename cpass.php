<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="cpass.css">
</head>
<body>

    <div class="password-form">
        <h2>Change Password</h2>
        <form link=newcpass.php action=home.php>
            <label for="old-password">Old Password:</label>
            <input type="password" id="old-password" name="op" placeholder="Enter old password" required>

            <label for="new-password">New Password:</label>
            <input type="password" id="new-password" name="np" placeholder="Enter new password" required>

            <label for="confirm-password">Confirm New Password:</label>
            <input type="password" id="confirm-password" name="cp" placeholder="Confirm new password" required>

            <!-- Change Password Button -->
            <button type="submit" name="ubut" value="changepassword">Change Password</button>
            <!-- Reset Button -->
            <input type="reset" class="reset-button" value="Reset">
        </form>
    </div>

</body>
</html>
