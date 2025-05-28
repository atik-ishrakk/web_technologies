<?php
include '../model/db.php';
$id=$_GET['id'];
?>
<h3>Admin Panel</h3>
    <!-- <form method="post" action ="../control/Admin_action.php" enctype='multipart/form-data'>   -->
    <form method='post' action="">
  

       <!-- User Management -->
        <h4 id="user-management">User Management</h4>
        <fieldset>
            <legend>Create User</legend>
            <table>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" id="username" name="username" placeholder="Soumik Sarker"
                    ></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" id="password" name="password" placeholder="Ss1@"
                    ></td>
                </tr>
                <tr>
                    <td><label for="role">Role:</label></td>
                    <td>
                        <select id="role" name="role" onchange="if(this.value == '') alert('Please select a role.')">
                            <option value="">Select role</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                        <span id="roleError" class="error"><?php echo $roleError; ?></span>
                    </td>
                </tr>

                <tr>
                    <td><label for="phoneNumber">Phone Number:</label></td>
                    <td colspan="2"><input type="tel" id="phoneNumber" name="phoneNumber" value="+8801"
                            onblur="validatePhone(this)">
                        <span id="phoneError" class="error"><?php echo $phoneNumberError; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td colspan="2"><input type="email" id="email" name="email" placeholder="sarker@gmail.com"
                            onblur="validateEmail(this)">
                        <span id="emailError" class="error"><?php echo $emailError; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="dob">Date of Birth:</label></td>
                    <td colspan="2"><input type="date" id="dob" name="dob" onchange="validateDOB(this)">
                        <span id="dobError" class="error"><?php echo $dobError; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="gender">Gender:</label></td>
                    <td colspan = '2'>
                        <select id="gender" name="gender">
                            <option value="choose">Choose one</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                            <option value="preferNotToSay">Prefer not to say</option>
                            <span class = 'error'><?php echo $genderError; ?></span>
                        </select>
                        <span id="genderError" class="error"><?php echo $genderError; ?></span>

                    </td>
                </tr>
                <tr>
                    <td><label for="address">Address:</label></td>
                    <td><input type="text" id="address" name="address" placeholder="Type your address"></td>
                </tr>
                <tr>
                    <td><label for="nationality">Nationality:</label></td>
                    <td><input type="text" id="nationality" name="nationality"></td>
                </tr>
                <tr>
                    <td><label for="occupation">Occupation:</label></td>
                    <td><input type="text" id="occupation" name="occupation"></td>
                </tr>
                <tr>
                    <td><label for="idNumber">Identification Number:</label></td>
                    <td colspan="2"><input type="text" id="idNumber" name="idNumber" placeholder="NID Number"
                            onblur="validateNID(this)">
                        <span id="nidError" class="error"></span>
                    </td>
                </tr>
            </table>
            <input type="submit" value="Create User">

        </fieldset>