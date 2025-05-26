<?php 
session_start(); // ✅ Required for using $_SESSION

$usernameError = $passwordError = $roleError = $firstNameError = $lastNameError = $phoneNumberError = $emailError = $dobError = $genderError = "";

$username = $password = $role = $firstName = $lastName = $phoneNumber = $email = $dob = $gender = "";

function validate_input($data){
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

    // Firstname
    if (empty($_POST['firstname'])) {
        $firstNameError = '* Firstname is required'; 
    } else {
        $firstName = validate_input($_POST["firstname"]);
    }

    // Lastname
    if (empty($_POST['lastname'])) {
        $lastNameError = '* Lastname is required'; 
    } else {
        $lastName = validate_input($_POST["lastname"]);
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
    if (!empty($_POST["phoneNumber"])) {
        $phoneNumber = validate_input($_POST["phoneNumber"]);
        if (!preg_match("/^\+8801[3-9][0-9]{8}$/", $phoneNumber)) {
            $phoneNumberError = "* Invalid Bangladeshi phone number format.";
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

    // If no validation errors, store values in session
    if (empty($usernameError) && empty($passwordError) && empty($roleError) && empty($firstNameError) && empty($lastNameError) && empty($phoneNumberError) && empty($emailError) && empty($dobError) && empty($genderError)) {
        
        $_SESSION['user_data'] = [
            'username' => $username,
            'role' => $role,
            'firstname' => $firstName,
            'lastname' => $lastName,
            'phone' => $phoneNumber,
            'email' => $email,
            'dob' => $dob,
            'gender' => $gender
        ];

       
        if (!empty($_POST['username'])) {
            setcookie("userInfo", 1, time() + (86400 * 30));
            if(isset($_COOKIE['userInfo'])){
                echo 'Welcome to my page';
            }
            else{
                echo 'You have already visited to our webpage';
            }
        }

        echo "<h2>Form Submitted Successfully!</h2>";
    } else {
        
        $_SESSION['form_errors'] = [
            'usernameError' => $usernameError,
            'passwordError' => $passwordError,
            'roleError' => $roleError,
            'firstNameError' => $firstNameError,
            'lastNameError' => $lastNameError,
            'phoneNumberError' => $phoneNumberError,
            'emailError' => $emailError,
            'dobError' => $dobError,
            'genderError' => $genderError
        ];
    }
}
?>
