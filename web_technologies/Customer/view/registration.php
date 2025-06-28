<?php
include "../Control/reg_control.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Auto Drive</title>
    <link rel="stylesheet" href="../css/form.css">
</head>
<body>
    <div class="container">
        <div class="headline">Vehicle<br>Registration<br>Form</div>
        <img src="../image/vehicle.jpg" class="image">
        <div class="success-message" id="success-message">
            <?php echo $successMessage; ?>
        </div>
    <div><form id="regForm" action="" method="post" autocomplete="on">
        <fieldset>
            <legend>User Registration</legend>
            <table>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="@gmail.com"></td>
                    <td><span class="error"><?php echo $emailError; ?></span></td>
                </tr>
                <tr>
                        <td><label for="password">Password:</label></td>
                        <td><input type="text" id="password" name="password" value="<?php echo htmlspecialchars($password); ?>"></td>
                        <td><span class="error"><?php echo $passwordError; ?></span></td>
                </tr>
                
            </table>
        </fieldset>
            <input type="submit" name="register" value="Register" class="button submit">
            <input type="submit" name="clear" value="Clear" class="button clear">
    </form></div>
</body>
</html>