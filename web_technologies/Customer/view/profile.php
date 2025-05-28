<?php
include "../control/profile_control.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Auto Drive (Profile)</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container">
        <div class="headline">Vehicle<br>Registration<br>Form</div>
        <img src="../image/vehicle.jpg" class="image">
        <div class="success-message" id="success-message">
            <?php echo htmlspecialchars($successMessage); ?>
        </div>
        <div>
            <form id="profile" action="" method="post" autocomplete="on" enctype="multipart/form-data">
                <fieldset>
                    <legend>User Profile</legend>
                    <table>
                        <tr>
                            <td><label for="id">ID:</label></td>
                            <td>
                                <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($id ?? ''); ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="fname">First Name:</label></td>
                            <td>
                                <input type="text" id="fname" name="fname" placeholder="Atik" 
                                       value="<?php echo htmlspecialchars($fname ?? ''); ?>">
                            </td>
                            <td><span class="error"><?php echo htmlspecialchars($fnameError ?? ''); ?></span></td>
                        </tr>
                        <tr>
                            <td><label for="lname">Last Name:</label></td>
                            <td>
                                <input type="text" id="lname" name="lname" placeholder="Ishrak" 
                                       value="<?php echo htmlspecialchars($lname ?? ''); ?>">
                            </td>
                            <td><span class="error"><?php echo htmlspecialchars($lnameError ?? ''); ?></span></td>
                        </tr>
                        <tr>
                            <td><label for="phone">Phone Number:</label></td>
                            <td>
                                <input type="text" id="phone" name="phone" 
                                       value="<?php echo htmlspecialchars($phone ?? ''); ?>" placeholder="+880">
                            </td>
                            <td><span class="error"><?php echo htmlspecialchars($phoneError ?? ''); ?></span></td>
                        </tr>
                        <tr>
                            <td><label for="email">Email:</label></td>
                            <td>
                                <input type="text" id="email" name="email" 
                                       value="<?php echo htmlspecialchars($email ?? ''); ?>" readonly>
                            </td>
                            <td><span class="error"><?php echo htmlspecialchars($emailError ?? ''); ?></span></td>
                        </tr>
                        <tr>
                            <td><label>Your Gender:</label></td>
                            <td>
                                <?php
                                $genders = [
                                    'male' => 'Male',
                                    'female' => 'Female',
                                    'other' => 'Other',
                                    'prefer-not-to-say' => 'Prefer not to say'
                                ];
                                foreach ($genders as $value => $label) {
                                    echo '<input type="radio" name="gender" value="' . htmlspecialchars($value) . '" ' .
                                         (($gender ?? '') === $value ? 'checked' : '') . '> ' . htmlspecialchars($label) . ' ';
                                }
                                ?>
                            </td>
                            <td><span class="error"><?php echo htmlspecialchars($genderError ?? ''); ?></span></td>
                        </tr>
                        <tr>
                            <td><label for="address">Address:</label></td>
                            <td>
                                <textarea id="address" name="address" rows="4" cols="50" 
                                          placeholder="Your Address"><?php echo htmlspecialchars($address ?? ''); ?></textarea>
                            </td>
                            <td><span class="error"><?php echo htmlspecialchars($addressError ?? ''); ?></span></td>
                        </tr>
                        <tr>
                            <td><label>Current File:</label></td>
                            <td>
                                <?php if (!empty($file_path)): ?>
                                    <a href="<?php echo htmlspecialchars($file_path); ?>" target="_blank">View Uploaded File</a>
                                <?php else: ?>
                                    No file uploaded
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="myfile">Upload New File:</label></td>
                            <td>
                                <input type="file" name="myfile" id="myfile">
                                <small>(JPG, PNG, PDF, max 5MB)</small>
                            </td>
                            <td><span class="error"><?php echo htmlspecialchars($fileError ?? ''); ?></span></td>
                        </tr>
                    </table>
                </fieldset>
                <input type="submit" name="update" value="Update" class="button update">
                <input type="submit" name="delete" value="Delete Account" class="button delete" 
                       onclick="return confirm('Are you sure you want to delete your account?');">
                <input type="submit" name="logout" value="Logout" class="button logout">
            </form>
        </div>
    </div>
</body>
</html>