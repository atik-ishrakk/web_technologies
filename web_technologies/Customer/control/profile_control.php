<?php
session_start();
include '../model/db.php';

$id = $fname = $lname = $phone = $email = $gender = $address = $file_path = "";
$fnameError = $lnameError = $phoneError = $emailError = $genderError = $addressError = $fileError = "";
$successMessage = "";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $stmt = $conn->prepare("SELECT id, fname, lname, phone, email, gender, address, file_path FROM customers WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $id = $user['id'];
        $fname = $user['fname'];
        $lname = $user['lname'];
        $phone = $user['phone'];
        $email = $user['email'];
        $gender = $user['gender'];
        $address = $user['address'];
        $file_path = $user['file_path'];
    } else {
        $successMessage = "User not found.";
    }
    $stmt->close();
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $fname = trim($_POST['fname'] ?? '');
        $lname = trim($_POST['lname'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
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
        if (!in_array($gender, ['male', 'female', 'other', 'prefer-not-to-say'])) {
            $genderError = "Please select a gender.";
            $isValid = false;
        }
        if ($address === '') {
            $addressError = "Address is required.";
            $isValid = false;
        }

        $uploadDir = '../Uploads/';
        $uploadedFilePath = $file_path;

        if (isset($_FILES['myfile']) && $_FILES['myfile']['error'] == 0) {
            $filename = basename($_FILES['myfile']['name']);
            $fileTmp = $_FILES['myfile']['tmp_name'];
            $targetPath = $uploadDir . $filename;

            $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf'];
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if (!in_array($ext, $allowedTypes)) {
                $fileError = "Only JPG, JPEG, PNG, and PDF files are allowed.";
                $isValid = false;
            } elseif ($_FILES['myfile']['size'] > 5 * 1024 * 1024) { // 5MB limit
                $fileError = "File size must not exceed 5MB.";
                $isValid = false;
            } elseif (!move_uploaded_file($fileTmp, $targetPath)) {
                $fileError = "File upload failed.";
                $isValid = false;
            } else {
                $uploadedFilePath = $targetPath;
            }
        }

        if ($isValid) {
            $stmt = $conn->prepare("UPDATE customers SET fname=?, lname=?, phone=?, gender=?, address=?, file_path=? WHERE id=?");
            $stmt->bind_param("ssssssi", $fname, $lname, $phone, $gender, $address, $uploadedFilePath, $id);
            
            if ($stmt->execute()) {
                $successMessage = "Profile updated successfully!";
            } else {
                $successMessage = "Error updating profile: " . $stmt->error;
            }
            $stmt->close();
        }
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM customers WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            session_destroy();
            header("Location: ../view/login.php");
            exit();
        } else {
            $successMessage = "Error deleting account: " . $stmt->error;
        }
        $stmt->close();
    } elseif (isset($_POST['logout'])) {
        session_destroy();
        header("Location: ../view/login.php");
        exit();
    }
}
?>