<?php
include '../model/db.php';

$email = $password = "";
$emailError = $passwordError = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['register'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $isValid = true;

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Valid email is required.";
        $isValid = false;
    }
    if (empty($password)) {
        $passwordError = "Password is required.";
        $isValid = false;
    }
    if ($isValid) {
        $sql = "INSERT INTO logs(email, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $email, $password);

            if (mysqli_stmt_execute($stmt)) {
                $successMessage = "User Registration successful!";
                $email = $password = "";
            } else {
                $successMessage = "Error inserting data: " . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
        } else {
            $successMessage = "SQL error: " . mysqli_error($conn);
        }
    }
} elseif (isset($_POST['clear'])) {
    $email = $password ="";
    $emailError = $passwordError ="";
    $successMessage = "";
}
?>