<?php
include "../control/manage_login.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container">
        <div class="image-container">
        </div>
            
            <form id="adminForm" action="" method="POST" enctype="multipart/form-data">
            <center><h3><b><div class="form-title">LOGIN</div></b></h3></center>
            <div class="form-columns">
                    <table>
                        <tr>
                            <td><label for="username">Username:</label></td>
                            <td><input type="text" id="fullname" name="username" placeholder="Enter your full name" >
                        </td>
                        </tr>
                        <tr>
                            <td><label for="pass">Password:</label></td>
                            <td><input type="password" id="password" name="password" placeholder="Enter your password" >                        
                        </tr>
                        <tr>
                        <td><label for="role">Role:</label></td>
                        <td>
                            <select id="role" name="role">
                                <option value="">Select role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        
                        </td>
                        </tr>
                    </table>
                </div>
                <div class="button-container">
                <center><input type="submit" id="submit" name= "submit" class="submit" value="Submit">
                <input type="reset" id="reset" name= "reset" value="Clear"></center><br><br>
                </div>
                <center>Don't have an account?<a href="../view/Admin.php">Create an account</a></center>
            </div>
             
            </form> 
        </div>
</body>
</html>

