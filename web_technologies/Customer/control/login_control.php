<?php
session_start();
include '../model/db.php';

$email = $password = '';
$emailError = $passwordError = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $isValid = true;

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Valid email is required.';
        $isValid = false;
    }
    if (empty($password)) {
        $passwordError = 'Password is required.';
        $isValid = false;
    }

    if ($isValid) {

        $result = loginUser($conn, 'logs', $email);
        
        if ($result && mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);
            
            if ($password === $user['password']) {
                session_regenerate_id(true);
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['logged_in'] = true;
                header('Location: ../view/customer.php');
                exit();
            } else {
                $passwordError = 'Password incorrect';
            }
        } else {
            $emailError = 'User not found';
        }
    }
}
?>