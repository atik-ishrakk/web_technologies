<?php
include '../control/update_admin_control.php';
// include '../model/db.php';

$conn = createconn();
$id = $_GET['id'];
$select = "SELECT * FROM user_registration where id='$id'";
$data = mysqli_query($conn, $select);
$row = mysqli_fetch_array($data);

?>
<link rel="stylesheet" href="../css/login.css">


<form method='post' action="" enctype="multipart/form-data">
    <!-- Pass the ID via a hidden input -->
    <input type="hidden" name="id" value="<?php echo $id; ?>">


    <!-- User Management -->
    <center>
        <h2 id="user-management">Admin Panel</h2>
    </center>
    <fieldset>
        <legend>User Registration</legend>
        <table>
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" id="username" name="username" placeholder="Soumik Sarker"
                        value="<?php echo $row['username'] ?>"></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password" placeholder="Ss1@"></td>
            </tr>
            <tr>
                <td><label for="role">Role:</label></td>
                <td>
                    <select id="role" name="role" onchange="if(this.value == '') alert('Please select a role.')">
                        <option value="<?php echo $row['role'] ?>"><?php echo $row['role'] ?></option>">
                        <option value="admin">admin</option>
                        <option value="user">user</option>
                    </select>

                </td>
            </tr>

            <tr>
                <td><label for="phoneNumber">Phone Number:</label></td>
                <td colspan="2"><input type="text" id="phoneNumber" name="phoneNumber" placeholder="01XXXXXXXXX"
                        value="<?php echo $row['phone'] ?>" onblur=" validatePhone(this)"></td>

                </td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td colspan="2"><input type="email" id="email" name="email" value="<?php echo $row['email'] ?>"
                        placeholder="sarker@gmail.com" onblur="validateEmail(this)">

                </td>
            </tr>
            <tr>
                <td><label for="dob">Date of Birth:</label></td>
                <td colspan="2"><input type="date" id="dob" name="dob" value="<?php echo $row['dob'] ?>"
                        onchange="validateDOB(this)">


                </td>
            </tr>
            <tr>
                <td><label for="gender">Gender:</label></td>
                <td colspan='2'>
                    <select id="gender" name="gender">
                        <option value="<?php echo $row['gender'] ?>"><?php echo $row['gender'] ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                        <option value="PreferNotToSay">Prefer not to say</option>

                    </select>


                </td>
            </tr>
            <tr>
                <td><label for="address">Address:</label></td>
                <td><input type="text" id="address" name="address" placeholder="Type your address"
                        value="<?php echo $row['address'] ?>"></td>
            </tr>
            <tr>
                <td><label for="nationality">Nationality:</label></td>
                <td><input type="text" id="nationality" name="nationality" value="<?php echo $row['nationality'] ?>">
                </td>
            </tr>
            <tr>
                <td><label for="occupation">Occupation:</label></td>
                <td><input type="text" id="occupation" name="occupation" value="<?php echo $row['occupation'] ?>"></td>
            </tr>
            <tr>
                <td><label for="idNumber">Identification Number:</label></td>
                <td colspan="2"><input type="text" id="idNumber" name="idNumber" placeholder="NID Number"
                        value="<?php echo $row['nid'] ?>" onblur="validateNID(this)">
                    <span id="nidError" class="error"></span>
                </td>
            </tr>
        </table>
        <center>
            <input type="submit" name='update' value="Update">
            <button type="button" onclick="window.location.href='../view/admin_panel.php'">Back</button>
        </center>

    </fieldset>
</form>