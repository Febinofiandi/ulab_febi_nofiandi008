<?php
// memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

// mengecek apakah di url ada nilai GET id
if (isset($_GET['id'])) {
    $id = intval($_GET["id"]); // gunakan intval untuk keamanan
    $query = "SELECT * FROM produk WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    }

    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
    exit;
}
?>  

<!DOCTYPE html>
<html>
<head>
  <title>CRUD Produk dengan Gambar - UKK SMK Maritim Nusantara 2022</title>
  <style type="text/css">
    * { font-family: "Trebuchet MS"; }
    h1 { text-transform: uppercase; color: salmon; }
    button {
      background-color: salmon;
      color: #fff;
      padding: 10px;
      font-size: 12px;
      border: none;
      margin-top: 20px;
      cursor: pointer;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
      margin-bottom: 10px;
    }
    .base {
      width: 400px;
      padding: 20px;
      margin: 20px auto;
      background: #ededed;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <center>
    <h1>Edit Produk <?php echo htmlspecialchars($data['nama_produk']); ?></h1>
  </center>

  <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
    <section class="base">
      <!-- menampung nilai id produk yang akan di edit -->
      <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

      <div>
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" value="<?php echo htmlspecialchars($data['nama_produk']); ?>" required autofocus />
      </div>
      <div>
        <label>Deskripsi</label>
        <input type="text" name="deskripsi" value="<?php echo htmlspecialchars($data['deskripsi']); ?>" />
      </div>
      <div>
        <label>Harga Beli</label>
        <input type="number" name="harga_beli" value="<?php echo $data['harga_beli']; ?>" required />
      </div>
      <div>
        <label>Harga Jual</label>
        <input type="number" name="harga_jual" value="<?php echo $data['harga_jual']; ?>" required />
      </div>
      <div>
        <label>Gambar Produk</label>
        <?php
          $gambarPath = "gambar/" . $data['gambar_produk'];
          if (!empty($data['gambar_produk']) && file_exists($gambarPath)) {
              echo "<img src='$gambarPath' style='width:120px; float:left; margin-bottom:5px;'>";
          } else {
              echo "<span style='color:red;'>[Gambar tidak tersedia]</span>";
          }
        ?>
        <input type="file" name="gambar_produk" accept="image/*" />
        <i style="float:left; font-size:11px; color:red">Abaikan jika tidak merubah gambar produk</i>
      </div>
      <div>
        <button type="submit">Simpan Perubahan</button>
      </div>
    </section>
  </form>
</body>
</html>