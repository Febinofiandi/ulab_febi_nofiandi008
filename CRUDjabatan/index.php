<?php
session_start();
include "../koneksi.php";

$result = mysqli_query($conn, "SELECT * FROM tbl_jabatan");
?>

<h3>Data Jabatan</h3>
<a href="add.php">Tambah Jabatan</a>
<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Nama Jabatan</th>
    <th>Gaji Pokok</th>
    <th>Tunjangan</th>
    <th>Aksi</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['Id_Jabatan']; ?></td>
    <td><?php echo $row['Nama_Jabatan']; ?></td>
    <td>Rp <?php echo number_format($row['Gaji_Pokok']); ?></td>
    <td>Rp <?php echo number_format($row['Tunjangan_Jabatan']); ?></td>
    <td>
        <a href="edit.php?id=<?php echo $row['Id_Jabatan']; ?>">Edit</a> | 
        <a href="delete.php?id=<?php echo $row['Id_Jabatan']; ?>" onclick="return confirm('Yakin ingin dihapus?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>