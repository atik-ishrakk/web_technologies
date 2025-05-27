<?php
session_start();
include '../model/db.php'; // Contains procedural MySQLi functions

$email = $password = "";
$emailError = $passwordError = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $isValid = true;

    // Validation
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Valid email is required.";
        $isValid = false;
    }
    if (empty($password)) {
        $passwordError = "Password is required.";
        $isValid = false;
    }

    if ($isValid) {
        // Check login (procedural approach)
        $result = loginUser($conn, "logs", $email); // Using procedural function
        
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            
            if ($password === $user["password"]) {
                $_SESSION["email"] = $email;
                header("Location: ../view/customer.php");
                exit();
            } else {
                $passwordError = "Wrong password!";
            }
        } else {
            $emailError = "User not found!";
        }
    }
}
?>