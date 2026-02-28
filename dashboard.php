<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Administrator</title>
</head>
<body>
    <h2>Selamat datang, <?php echo $user['User_Name']; ?> di Dashboard APP EXAM</h2>
    <nav>
         <a href="home.php">Home</a> |
        <a href="pengguna.php">Pengguna</a> |
        <a href="CRUDjabatan/index.php">Jabatan</a> |
        <a href="karyawan.php">Karyawan</a> |
        <a href="transaksi.php">Transaksi</a> |
        <a href="laporan.php">Laporan</a> |
        <a href="logout.php">Keluar</a>
    </nav>
</body>
</html>