<?php
$servername = "localhost";
$username = "atik";
$password = "123";
$database = "vreg";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function loginUser($conn, $table, $email) {
    // ✅ Use the passed $conn, don't reconnect inside the function
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
?>
