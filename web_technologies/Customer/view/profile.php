<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

include "../model/db.php";

$email = $_SESSION["email"];
$query = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
?>

<html>
<body>
    <h1>User Profile</h1>
    <?php if ($user): ?>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($user['fname'] . " " . $user['lname']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
        <p><strong>Gender:</strong> <?php echo htmlspecialchars($user['gender']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
        <?php if ($user['filename']): ?>
            <p><strong>Uploaded File:</strong><br><img src="../uploads/<?php echo htmlspecialchars($user['filename']); ?>" width="200"></p>
        <?php endif; ?>
    <?php else: ?>
        <p>User not found.</p>
    <?php endif; ?>
    <br>
    <a href="../control/logout.php">Logout</a>
</body>
</html>
