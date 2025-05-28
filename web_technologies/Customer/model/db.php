<?php
if (defined('DB_PHP_INCLUDED')) {
    return;
}
define('DB_PHP_INCLUDED', true);

$servername = "localhost";
$username = "root";
$password = "";
$database = "autodriveDB";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$checkDbQuery = "CREATE DATABASE IF NOT EXISTS $database";
if (!mysqli_query($conn, $checkDbQuery)) {
    die("Error creating database: " . mysqli_error($conn));
}
mysqli_select_db($conn, $database);

$createCustomersTable = "
CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    gender ENUM('male', 'female', 'other', 'prefer-not-to-say') NOT NULL,
    address TEXT NOT NULL,
    file_path VARCHAR(255) NOT NULL
)";

if (!mysqli_query($conn, $createCustomersTable)) {
    die("Error creating customers table: " . mysqli_error($conn));
}

$createLogsTable = "
CREATE TABLE IF NOT EXISTS logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    login_time DATETIME NOT NULL,
    FOREIGN KEY (email) REFERENCES customers(email) ON DELETE CASCADE
)";

if (!mysqli_query($conn, $createLogsTable)) {
    die("Error creating logs table: " . mysqli_error($conn));
}

function loginUser($conn, $table, $email) {
    $query = "SELECT * FROM $table WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    
    return $result;
}
function getUserProfile($conn, $id) {
    $query = "SELECT id, fname, lname, phone, email, gender, address, file_path FROM customers WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}
function updateProfile($conn, $id, $fname, $lname, $phone, $gender, $address, $file_path) {
    $query = "UPDATE customers SET fname = ?, lname = ?, phone = ?, gender = ?, address = ?, file_path = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssssi", $fname, $lname, $phone, $gender, $address, $file_path, $id);
    return mysqli_stmt_execute($stmt);
}
function deleteAccount($conn, $id) {
    // First delete from logs table (due to foreign key constraints)
    $query1 = "DELETE FROM logs WHERE email = (SELECT email FROM customers WHERE id = ?)";
    $stmt1 = mysqli_prepare($conn, $query1);
    mysqli_stmt_bind_param($stmt1, "i", $id);
    mysqli_stmt_execute($stmt1);
    
    $query2 = "DELETE FROM customers WHERE id = ?";
    $stmt2 = mysqli_prepare($conn, $query2);
    mysqli_stmt_bind_param($stmt2, "i", $id);
    return mysqli_stmt_execute($stmt2);
}
?>