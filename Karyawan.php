<?php
session_start();
include "koneksi.php";

$sql = "SELECT k.*, j.Nama_Jabatan 
        FROM tbl_karyawan k
        LEFT JOIN tbl_jabatan j 
        ON k.Id_Jabatan = j.Id_Jabatan";

$result = mysqli_query($conn, $sql);
?>

<h3>Data Karyawan</h3>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Jabatan</th>
    <th>Status</th>
    <th>Jumlah Anak</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['Id_Karyawan']; ?></td>
    <td><?php echo $row['Nama']; ?></td>
    <td><?php echo $row['Nama_Jabatan']; ?></td>
    <td><?php echo $row['Status']; ?></td>
    <td><?php echo $row['Jumlah_Anak']; ?></td>
</tr>
<?php } ?>

</table>