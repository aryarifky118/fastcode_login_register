<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div class="content1">
        <img src="img/pubg.jpg" alt="" class="content1-img">
        <h2>
            Welcome, <?php echo $_SESSION['fullname']; ?>
        </h2>
        <button type="submit"><a href="logout.php">Logout</a></button>
    </div>
</body>
</html>