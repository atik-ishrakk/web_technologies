<?php
// include '../view/admin_panel.php';
include '../model/db.php';

// conn create
$conn = createConn();

//delete request
if (isset($_GET['id'])) {
    $deleteId = $_GET['id'];
    deleteData($conn, $deleteId);

}

header('Location:../view/admin_panel.php');

// // Fetch all users
// $users = getAllUsers($conn);

closeConn($conn);

?>