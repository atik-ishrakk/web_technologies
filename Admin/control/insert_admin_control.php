<?php
session_start();
include "../model/db.php";

$usernameError = $passwordError = $roleError = $firstNameError = $lastNameError = $phoneNumberError = $emailError = $dobError = $genderError = "";

$username = $password = $role = $firstName = $lastName = $phoneNumber = $email = $dob = $gender = $address = $nationality = $occupation = $nid = $file = "";

function validate_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Username
    if (empty($_POST["username"])) {
        $usernameError = '* UserName is required';
    } else {
        $username = validate_input($_POST["username"]); // Fixed typo
    }

    // Password
    if (empty($_POST['password'])) {
        $passwordError = '* Password is required';
    } else {
        $password = validate_input($_POST['password']);
    }

    // Role
    if (isset($_POST["role"])) {
        $role = validate_input($_POST["role"]);
        $allowedRole = ['admin', 'user'];
        if (!in_array($role, $allowedRole)) {
            $roleError = "* Invalid role";
        }
    }

    // DOB
    if (empty($_POST["dob"])) {
        $dobError = "* Date of birth is required.";
    } else {
        $dob = validate_input($_POST["dob"]);
        $today = date("Y-m-d");
        if ($dob >= $today) {
            $dobError = " Date of birth must be in the past.";
        }
    }

    // Phone Number

    if (empty($_POST['phoneNumber'])) {
        $phoneNumberError = '* insert valid phone number.';
    } else {
        $phoneNum = $_POST['phoneNumber'];
        $numericPhone = preg_replace("/\D/", "", $phoneNum); // Strip non-digits

        if (strlen($numericPhone) !== 11) {
            echo 'Phone number must be exactly 11 digits.';
            exit();
        }
    }


    // Email
    if (empty($_POST["email"])) {
        $emailError = "Email is required.";
    } else {
        $email = validate_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format.";
        }
    }

    // Gender
    if (!empty($_POST["gender"])) {
        $gender = validate_input($_POST["gender"]);
        $allowedGenders = ['male', 'female', 'other', 'preferNotToSay'];
        if (!in_array($gender, $allowedGenders)) {
            $genderError = "Invalid gender selected.";
        }
    }

    // File Upload
    if (!empty($_FILES['serviceHistoryFile']['name'])) {
        $uploadDir = "../uploads/";
        $fileName = time() . "-" . basename($_FILES['serviceHistoryFile']['name']);
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['serviceHistoryFile']['tmp_name'], $targetPath)) {
            $_SESSION['uploaded_file'] = $fileName;
        }
    }

    $address = validate_input($_POST['address'] ?? '');
    $nationality = validate_input($_POST['nationality'] ?? '');
    $occupation = validate_input($_POST['occupation'] ?? '');
    $nid = validate_input($_POST['idNumber'] ?? '');

    if (empty($usernameError) && empty($passwordError) && empty($roleError) && empty($phoneNumberError) && empty($emailError) && empty($dobError) && empty($genderError)) {
        $conn = createconn();

        $_SESSION['user_data'] = [
            'username' => $username,
            'role' => $role,
            'phone' => $phoneNumber,
            'email' => $email,
            'dob' => $dob,
            'gender' => $gender
        ];


        if (!empty($username)) {
            setcookie("userInfo", 1, time() + (86400 * 30));
        }

        $conn = createConn();
        if (insertData($conn, $username, $password, $role, $phoneNumber, $email, $dob, $gender, $address, $nationality, $occupation, $nid, $file)) {

            // close for using javascript
            ?>

            <script type="text/javascript">alert("Data inserted successfully");
                window.open("http://localhost/WebTech_Project/Admin/view/admin_panel.php", '_self');
            </script>

            <?php

        } else {

            ?>

            <script type="text/javascript">alert("Data insertion failed");


            </script>

            <?php
        }
        closeConn($conn);

    } else {
        $_SESSION['form_errors'] = [
            'usernameError' => $usernameError,
            'passwordError' => $passwordError,
            'roleError' => $roleError,
            'phoneNumberError' => $phoneNumberError,
            'emailError' => $emailError,
            'dobError' => $dobError,
            'genderError' => $genderError
        ];
    }


}

?>