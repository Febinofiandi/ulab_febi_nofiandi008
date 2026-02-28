<?php
include "../koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM tbl_jabatan WHERE Id_Jabatan='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])) {
    $nama = $_POST['nama_jabatan'];
    $gaji = $_POST['gaji_pokok'];
    $tunjangan = $_POST['tunjangan'];

    $update = mysqli_query($conn, "UPDATE tbl_jabatan SET 
        Nama_Jabatan='$nama', 
        Gaji_Pokok='$gaji', 
        Tunjangan_Jabatan='$tunjangan' 
        WHERE Id_Jabatan='$id'");

    if($update) {
        header("Location: index.php");
    } else {
        echo "Gagal update data!";
    }
}
?>

<h3>Edit Jabatan</h3>
<form method="post">
    Nama Jabatan: <input type="text" name="nama_jabatan" value="<?php echo $row['Nama_Jabatan']; ?>" required><br><br>
    Gaji Pokok: <input type="number" name="gaji_pokok" value="<?php echo $row['Gaji_Pokok']; ?>" required><br><br>
    Tunjangan: <input type="number" name="tunjangan" value="<?php echo $row['Tunjangan_Jabatan']; ?>" required><br><br>
    <input type="submit" name="update" value="Update">
</form>
<a href="index.php">Kembali</a>