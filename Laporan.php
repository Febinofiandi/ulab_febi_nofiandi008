<?php
session_start();
include "koneksi.php";


$sql = "SELECT t.Tanggal, k.Nama, j.Nama_Jabatan,
        j.Gaji_Pokok, j.Tunjangan_Jabatan,
        t.Tunjangan_Anak, t.BPJS, t.Total_Pendapatan
        FROM tbl_transaksi t
        JOIN tbl_karyawan k ON t.Id_Karyawan = k.Id_Karyawan
        JOIN tbl_jabatan j ON k.Id_Jabatan = j.Id_Jabatan";

$result = mysqli_query($conn, $sql);
?>

<h3>Laporan Penggajian</h3>

<table border="1" cellpadding="5">
<tr>
    <th>Tanggal</th>
    <th>Nama</th>
    <th>Jabatan</th>
    <th>Total Pendapatan</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['Tanggal']; ?></td>
    <td><?php echo $row['Nama']; ?></td>
    <td><?php echo $row['Nama_Jabatan']; ?></td>
    <td>Rp <?php echo number_format($row['Total_Pendapatan']); ?></td>
</tr>
<?php } ?>

</table>