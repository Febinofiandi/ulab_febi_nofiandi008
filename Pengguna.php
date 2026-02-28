<?php
session_start();
include "koneksi.php";

$result = mysqli_query($conn, "SELECT * FROM tbl_user_febi");
?>

<h3>Data Pengguna</h3>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['Id_User']; ?></td>
    <td><?php echo $row['User_Name']; ?></td>
    <td><?php echo $row['Email']; ?></td>
</tr>
<?php } ?>

</table>