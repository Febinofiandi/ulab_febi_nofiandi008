<?php
include "koneksi.php";

$id = $_GET['id'];

$delete = mysqli_query($conn, "DELETE FROM tbl_jabatan WHERE Id_Jabatan='$id'");

if($delete) {
    header("Location: index.php");
} else {
    echo "Gagal menghapus data!";
}