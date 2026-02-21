<?php
$host = "localhost";
$user = "root";
$pass = "";
$nama_db = "febi_ulab008";

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $pass, $nama_db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi dengan database gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi berhasil!";
}
?>