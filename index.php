<?php  
  include('koneksi.php'); // menghubungkan file index dengan database
?>  

<!DOCTYPE html>  
<html>  
<head>  
  <title>CRUD Produk dengan Gambar - UKK SMK Maritim Nusantara 2022</title>  
  <style type="text/css">  
    * { font-family: "Trebuchet MS"; }  
    h1 { text-transform: uppercase; color: salmon; }  
    table {  
      border: solid 1px #DDEEEE;  
      border-collapse: collapse;  
      width: 70%;  
      margin: 10px auto;  
    }  
    table thead th {  
      background-color: #DDEFEF;  
      border: solid 1px #DDEEEE;  
      color: #336B6B;  
      padding: 10px;  
      text-align: left;  
      text-shadow: 1px 1px 1px #fff;  
    }  
    table tbody td {  
      border: solid 1px #DDEEEE;  
      color: #333;  
      padding: 10px;  
      text-shadow: 1px 1px 1px #fff;  
    }  
    a {  
      background-color: salmon;  
      padding: 10px;  
      text-decoration: none;  
      font-size: 12px;  
      color: white;  
    }  
  </style>  
</head>  
<body>  
  <center><h1>Data Produk</h1></center>  
  <center><a href="tambah_produk.php">+ &nbsp; Tambah Produk</a></center>  
  <br/>  

  <table>  
    <thead>  
      <tr>  
        <th>No</th>  
        <th>Produk</th>  
        <th>Deskripsi</th>  
        <th>Harga Beli</th>  
        <th>Harga Jual</th>  
        <th>Gambar</th>  
        <th>Action</th>  
      </tr>  
    </thead>  
    <tbody>  
      <?php  
      // jalankan query untuk menampilkan semua data produk
      $query  = "SELECT * FROM produk ORDER BY id ASC";  
      $result = mysqli_query($koneksi, $query);  

      if(!$result){  
        die("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));  
      }  

      $no = 1;  
      while($row = mysqli_fetch_assoc($result)) {  
          // cek apakah gambar ada di folder
          $gambarPath = "gambar/" . $row['gambar_produk'];
          $gambarTag  = file_exists($gambarPath) && !empty($row['gambar_produk'])
                        ? "<img src='$gambarPath' style='width:120px;'>"
                        : "<span style='color:red;'>[Gambar tidak tersedia]</span>";
      ?>  
        <tr>  
          <td><?php echo $no; ?></td>  
          <td><?php echo htmlspecialchars($row['nama_produk']); ?></td>  
          <td><?php echo htmlspecialchars(substr($row['deskripsi'], 0, 20)); ?>...</td>  
          <td>Rp <?php echo number_format($row['harga_beli'], 0, ',', '.'); ?></td>  
          <td>Rp <?php echo number_format($row['harga_jual'], 0, ',', '.'); ?></td>  
          <td style="text-align: center;"><?php echo $gambarTag; ?></td>  
          <td>  
            <a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a> |  
            <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>  
          </td>  
        </tr>  
      <?php  
        $no++;  
      }  
      ?>  
    </tbody>  
  </table>  
</body>  
</html>