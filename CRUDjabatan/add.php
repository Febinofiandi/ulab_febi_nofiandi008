<?php
include "../koneksi.php";

if(isset($_POST['submit'])) {
    $nama = $_POST['nama_jabatan'];
    $gaji = $_POST['gaji_pokok'];
    $tunjangan = $_POST['tunjangan'];

    $insert = mysqli_query($conn, "INSERT INTO tbl_jabatan (Nama_Jabatan, Gaji_Pokok, Tunjangan_Jabatan) 
        VALUES ('$nama', '$gaji', '$tunjangan')");

    if($insert) {
        header("Location: index.php");
    } else {
        echo "Gagal menambahkan data!";
    }
}
?>

<h3>Tambah Jabatan</h3>
<form method="post">
    Nama Jabatan: <input type="text" name="nama_jabatan" required><br><br>
    Gaji Pokok: <input type="number" name="gaji_pokok" required><br><br>
    Tunjangan: <input type="number" name="tunjangan" required><br><br>
    <input type="submit" name="submit" value="Simpan">
</form>
<a href="index.php">Kembali</a>