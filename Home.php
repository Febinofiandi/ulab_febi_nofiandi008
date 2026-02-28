<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h2>Halaman Home</h2>
    <a href="dashboard.php">Kembali ke Dashboard</a>
</body>
</html>