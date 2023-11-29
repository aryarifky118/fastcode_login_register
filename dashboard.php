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
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="content1">
        <img src="arya.png" alt="" class="content1-img">
        <h2 class="content1-h2">
            Welcome, <?php echo $_SESSION['fullname']; ?>
        </h2>
        <div class="content1-a"><a  class="content1-div" href="logout.php">Logout</a></div>
    </div>
</body>
</html>