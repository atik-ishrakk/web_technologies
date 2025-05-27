<?php
session_start();
include "../model/db.php";


if(isset($_POST["submit"])) {
    $conn = createConn();

    $result = checkLogin($conn, $_POST["username"], $_POST["password"],$_POST["role"]);
    if(mysqli_num_rows($result) > 0) {
        $_SESSION['user'] = $_POST["username"];
        header("Location: ../view/admin_panel.php");
    } 
}
    