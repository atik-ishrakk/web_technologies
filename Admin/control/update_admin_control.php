<?php
include "../model/db.php";

if (isset($_POST['update'])) {
    $conn = createconn();

    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $nationality = $_POST['nationality'];
    $occupation = $_POST['occupation'];
    $nid = $_POST['idNumber'];
    $file = $_POST['file'];


    // Handle file upload if present
    $file = '';
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../uploads/";
        $fileName = time() . "-" . basename($_FILES['file']['name']);
        $targetPath = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetPath)) {
            $file = $fileName;
        }
    }


    if (updateData($conn, $id, $username, $password, $role, $phoneNumber, $email, $dob, $gender, $address, $nationality, $occupation, $nid, $file)) {


        // close for using javascript
        ?>

        <script type="text/javascript">alert("Data updated successfully");
            window.open("http://localhost/WebTech_Project/Admin/view/admin_panel.php", '_self');
        </script>

        <?php

    } else {

        ?>

        <script type="text/javascript">alert("Data updation failed");</script>

        <?php
    }
    closeConn($conn);

}

?>