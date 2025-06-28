<?php
include '../model/db.php';

$fname = $lname = $phone = $email = $gender = $address = "";
$fnameError = $lnameError = $phoneError = $emailError = $genderError = $addressError = $fileError = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['Submit'])) {
    $fname = trim($_POST['fname'] ?? '');
    $lname = trim($_POST['lname'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $address = trim($_POST['address'] ?? '');

    $isValid = true;

    if ($fname === '') {
        $fnameError = "First name is required.";
        $isValid = false;
    }
    if ($lname === '') {
        $lnameError = "Last name is required.";
        $isValid = false;
    }
    if ($phone === '') {
        $phoneError = "Phone number is required.";
        $isValid = false;
    }
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Valid email is required.";
        $isValid = false;
    }
    if (!in_array($gender, ['male', 'female', 'other', 'prefer-not-to-say'])) {
        $genderError = "Please select a gender.";
        $isValid = false;
    }
    if ($address === '') {
        $addressError = "Address is required.";
        $isValid = false;
    }

    // Handle file upload
    $uploadDir = '../upload/';
    $uploadedFilePath = "";
    if (isset($_FILES['myfile']) && $_FILES['myfile']['error'] == 0) {
        $fileName = basename($_FILES['myfile']['name']);
        $fileTmp = $_FILES['myfile']['tmp_name'];
        $targetPath = $uploadDir . $fileName;

        // Simple validation
        $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf'];
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowedTypes)) {
            $fileError = "Only JPG, JPEG, PNG, and PDF files are allowed.";
            $isValid = false;
        } elseif (!move_uploaded_file($fileTmp, $targetPath)) {
            $fileError = "File upload failed.";
            $isValid = false;
        } else {
            $uploadedFilePath = $targetPath;
        }
    } else {
        $fileError = "Please upload a file.";
        $isValid = false;
    }

    if (isset($_FILES["myfile"]) && $_FILES["myfile"]["error"] == 0) {
        $filename = basename($_FILES["myfile"]["name"]);
        $target = "../uploads/" . $filename;
        move_uploaded_file($_FILES["myfile"]["tmp_name"], $target);
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO users (fname, lname, phone, email, gender, address, file_path) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $fname, $lname, $phone, $email, $gender, $address, $filename);

    if ($stmt->execute()) {
        $successMessage = "Registration successful!";
        $_SESSION["email"] = $email;  // store email for profile
    } else {
        $successMessage = "Error: " . $stmt->error;
    }
    $stmt->close();
    } elseif (isset($_POST['clear'])) {
    $fname = $lname = $phone = $email = $gender = $address = "";
    $fnameError = $lnameError = $phoneError = $emailError = $genderError = $addressError = $fileError = "";
    $successMessage = "";
}
?>