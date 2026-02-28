<?php
session_start();
include "koneksi.php";


$sql = "SELECT t.*, k.Nama 
        FROM tbl_transaksi t
        LEFT JOIN tbl_karyawan k
        ON t.Id_Karyawan = k.Id_Karyawan";

$result = mysqli_query($conn, $sql);
?>

<h3>Data Transaksi</h3>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Tanggal</th>
    <th>Nama Karyawan</th>
    <th>Tunjangan Anak</th>
    <th>BPJS</th>
    <th>Total</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['Id_Transaksi']; ?></td>
    <td><?php echo $row['Tanggal']; ?></td>
    <td><?php echo $row['Nama']; ?></td>
    <td><?php echo number_format($row['Tunjangan_Anak']); ?></td>
    <td><?php echo number_format($row['BPJS']); ?></td>
    <td><?php echo number_format($row['Total_Pendapatan']); ?></td>
</tr>
<?php } ?>

</table>