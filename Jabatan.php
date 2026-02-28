<?php
session_start();
include "koneksi.php";
?>

<h2>Halaman Jabatan</h2>

<a href="CRUDjabatan/index.php">Lihat Data Jabatan</a> |
<a href="CRUDjabatan/add.php">Tambah Jabatan</a>

<hr>

<h3>Preview Data Jabatan</h3>
<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Nama Jabatan</th>
    <th>Gaji Pokok</th>
    <th>Tunjangan</th>
</tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM tbl_jabatan LIMIT 5"); // preview 5 data
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row['Id_Jabatan']}</td>";
    echo "<td>{$row['Nama_Jabatan']}</td>";
    echo "<td>Rp " . number_format($row['Gaji_Pokok']) . "</td>";
    echo "<td>Rp " . number_format($row['Tunjangan_Jabatan']) . "</td>";
    echo "</tr>";
}
?>
</table>