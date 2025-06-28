<?php
session_start();
include "../model/db.php";


if (isset($_POST["submit"])) {
    $conn = createConn();

    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $result = checkLogin($conn, $username, $password, $role);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['user'] = $username;
        header("Location: ../view/admin_panel.php");
    }
}
