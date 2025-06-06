<?php
// include "../control/manage_login.php";
include '../model/db.php';
?>
<link rel="stylesheet" href="../css/login.css">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table border='1px' cellpadding='10px' cellspacing='0'>
        <tr>
            <th>id</th>
            <th>username</th>
            <th>role</th>
            <th>phone</th>
            <th>email</th>
            <th>dob</th>
            <th>gender</th>
            <th>address</th>
            <th>nationality</th>
            <th>occupation</th>
            <th>nid</th>
            <th>file</th>
            <th colspan='2'>Actions</th>
        </tr>

        <?php
        $conn = createconn();

        $sql = "SELECT * FROM user_registration";
        $data = mysqli_query($conn, $sql);

        if ($data) {
            $result = mysqli_num_rows($data);

            if ($result > 0) {
                while ($row = mysqli_fetch_assoc($data)) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['role']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['nationality']; ?></td>
                        <td><?php echo $row['occupation']; ?></td>
                        <td><?php echo $row['nid']; ?></td>
                        <td><?php echo $row['file']; ?></td>
                        <td><a href="../view/update_admin.php?id=<?php echo $row['id']; ?>">EDIT</a></td>
                        <td><a onclick="return confirm('Sure, Are you want to delete? ')"
                                href="../control/delete_admin_control.php?id=<?php echo $row['id']; ?>">DELETE</a></td>
                    </tr>

                    <?php
                }

            } else {
                ?>
                <tr>
                    <td colspan="14">No data found.</td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='14'>Query failed: " . mysqli_error($conn) . "</td></tr>";
        }

        // mysqli_close($conn);
        ?>
    </table>

    <center><button type="button" onclick="window.location.href='../control/logout.php'">LOGOUT</button></center>


</body>

</html>