<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

// membuat variabel untuk menampung data dari form
$nama_produk   = $_POST['nama_produk'];
$deskripsi     = $_POST['deskripsi'];
$harga_beli    = $_POST['harga_beli'];
$harga_jual    = $_POST['harga_jual'];
$gambar_produk = $_FILES['gambar_produk']['name'];

// cek jika ada gambar produk
if ($gambar_produk != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg'); // tambahkan jpeg
    $x = explode('.', $gambar_produk);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar_produk']['tmp_name'];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $gambar_produk;

    if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
        // pindahkan file ke folder gambar
        move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);

        // query insert data
        $query = "INSERT INTO produk (nama_produk, deskripsi, harga_beli, harga_jual, gambar_produk)  
                  VALUES ('$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual', '$nama_gambar_baru')";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
        }
    } else {
        // jika ekstensi tidak sesuai
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, jpeg, atau png.');window.location='tambah_produk.php';</script>";
    }
} else {
    // jika tidak ada gambar, simpan dengan nilai null
    $query = "INSERT INTO produk (nama_produk, deskripsi, harga_beli, harga_jual, gambar_produk)  
              VALUES ('$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual', NULL)";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
    }
}
?>