<?php 
include "../control/action_page.php"; 
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
    <div><form id="customer" action="" method="post" autocomplete="on" enctype="multipart/form-data">
        <fieldset>
            <legend>Owner Details</legend>
            <table>
                <tr>
                    <td><label for="fname">First Name:</label></td>
                    <td><input type="text" id="fname" name="fname" placeholder="Atik" value="<?php echo htmlspecialchars($fname); ?>"></td>
                    <td><span class="error"><?php echo $fnameError; ?></span></td>
                </tr>
                <tr>
                    <td><label for="lname">Last Name:</label></td>
                    <td><input type="text" id="lname" name="lname" placeholder="Ishrak" value="<?php echo htmlspecialchars($lname); ?>"></td>
                    <td><span class="error"><?php echo $lnameError; ?></span></td>
                </tr>
                <tr>
                    <td><label for="phone">Phone Number:</label></td>
                    <td><input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" placeholder="+880"></td>
                    <td><span class="error"><?php echo $phoneError; ?></span></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="atik.ishrak@gmail.com"></td>
                    <td><span class="error"><?php echo $emailError; ?></span></td>
                </tr>
                <tr>
                    <td><label>Your Gender:</label></td>
                    <td>
                        <input type="radio" name="gender" value="male" <?php if ($gender == "male") echo "checked"; ?>> Male
                        <input type="radio" name="gender" value="female" <?php if ($gender == "female") echo "checked"; ?>> Female
                        <input type="radio" name="gender" value="other" <?php if ($gender == "other") echo "checked"; ?>> Other
                        <input type="radio" name="gender" value="prefer-not-to-say" <?php if ($gender == "prefer-not-to-say") echo "checked"; ?>> Prefer not to say
                    </td>
                    <td><span class="error"><?php echo $genderError; ?></span></td>
                </tr>
                <tr>
                    <td><label for="address">Address:</label></td>
                    <td><textarea id="address" name="address" rows="4" cols="50" placeholder="Your Address"><?php echo htmlspecialchars($address); ?></textarea></td>
                    <td><span class="error"><?php echo $addressError; ?></span></td>
                </tr>
                <tr>
                    <td><label for="myfile">Upload File:</label></td>
                    <td><input type="file" name="myfile" id="myfile"></td>
                    <td><span class="error"><?php echo $fileError; ?></span></td>
                </tr>
            </table>
        </fieldset>
            <input type="submit" name="Submit" value="Submit" class="button submit">
            <input type="submit" name="clear" value="Clear" class="button clear">
    </form></div>
</body>
</html>