<?php
$servername = "localhost";
$username = "atik";
$password = "123";
$database = "vreg";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
