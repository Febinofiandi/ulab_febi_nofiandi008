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
    <h1>Tambah Produk</h1>  
  </center>  

  <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">  
    <section class="base">  
      <div>  
        <label>Nama Produk</label>  
        <input type="text" name="nama_produk" autofocus required />  
      </div>  
      <div>  
        <label>Deskripsi</label>  
        <input type="text" name="deskripsi" />  
      </div>  
      <div>  
        <label>Harga Beli</label>  
        <input type="number" name="harga_beli" required />  
      </div>  
      <div>  
        <label>Harga Jual</label>  
        <input type="number" name="harga_jual" required />  
      </div>  
      <div>  
        <label>Gambar Produk</label>  
        <input type="file" name="gambar_produk" accept="image/*" required />  
      </div>  
      <div>  
        <button type="submit">Simpan Produk</button>  
      </div>  
    </section>  
  </form>  
</body>  
</html>