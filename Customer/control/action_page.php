<?php

$fname=$lname=$phone=$email=$gender=$address="";
$fnameError = $lnameError = $phoneError = $emailError = $genderError = $addressError="";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["fname"])) {
    if (empty($_POST["fname"])) {
        $fnameError = "First name is required.";
    } elseif (!preg_match("/^[A-Za-z]+$/", $_POST["fname"])) {
        $fnameError = "Only letters are allowed.";
    } else {
        $fname = $_POST["fname"];
    }

    if (empty($_POST["lname"])) {
        $lnameError = "Last name is required.";
    } elseif (!preg_match("/^[A-Za-z]+$/", $_POST["lname"])) {
        $lnameError = "Only letters are allowed.";
    } else {
        $lname = $_POST["lname"];
    }

    if (empty($_POST["phone"])) {
        $phoneError = "Phone number is required.";
    } elseif (!preg_match("/^\+8801\d{9}$/", $_POST["phone"])) {
        $phoneError = "Phone number must be in the format +8801XXXXXXXXX.";
    } else {
        $phone = $_POST["phone"];
    }
    
    if (empty($_POST["email"])) {
        $emailError = "Email is required.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format.";
    } else {
        $email = $_POST["email"];
    }


    if (empty($_POST["gender"])) {
        $genderError = "Gender is required.";
    } else {
        $gender = $_POST["gender"];
    }

    if (empty($_POST["address"])) {
        $addressError = "Address is required.";
    } else {
        $address = $_POST["address"];
    }

    if (isset($_POST['clear'])) {
        $fname = $lname = $phone = $email = $gender = $address = "";
        $fnameError = $lnameError = $phoneError = $emailError = $genderError = $addressError="";
        $successMessage = "";
    }

    if (!$fnameError && !$lnameError && !$phoneError && !$emailError && !$genderError && !$addressError &&
     !empty($fname) && !empty($lname) && !empty($phone) && !empty($email) && !empty($gender) && !empty($address)) {
        $successMessage.= "Your Form is submitted successfully!";
        $successMessage.= "<br>First Name: $fname";
        $successMessage.= "<br>Last Name: $lname";
        $successMessage.= "<br>Phone: $phone";
        $successMessage.= "<br>Email: $email";
        $successMessage.= "<br>Address: $address";
    }
    
    if($_FILES["myfile"]["name"]==""){
        echo "NO file uploaded";
    }
    else{
        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], "../upload/" . basename($_FILES["myfile"]["name"]))) {
            $successMessage.= "<br>File uploaded successfully.";
        } else {
            $successMessage.= "<br>File uploading failed.";
        }
    }
}