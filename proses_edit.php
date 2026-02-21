<?php
// memanggil file koneksi.php
include 'koneksi.php';

// ambil data dari form
$id           = $_POST['id'];
$nama_produk  = $_POST['nama_produk'];
$deskripsi    = $_POST['deskripsi'];
$harga_beli   = $_POST['harga_beli'];
$harga_jual   = $_POST['harga_jual'];
$gambar_produk= $_FILES['gambar_produk']['name'];

// cek apakah ada file gambar baru
if ($gambar_produk != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x = explode('.', $gambar_produk);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar_produk']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_produk;

    if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
        // pindahkan file ke folder gambar
        move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);

        // hapus gambar lama jika ada
        $query_gambar = mysqli_query($koneksi, "SELECT gambar_produk FROM produk WHERE id='$id'");
        $data_gambar  = mysqli_fetch_assoc($query_gambar);
        if (!empty($data_gambar['gambar_produk']) && file_exists("gambar/".$data_gambar['gambar_produk'])) {
            unlink("gambar/".$data_gambar['gambar_produk']);
        }

        // update data dengan gambar baru
        $query  = "UPDATE produk SET 
                    nama_produk='$nama_produk', 
                    deskripsi='$deskripsi', 
                    harga_beli='$harga_beli', 
                    harga_jual='$harga_jual', 
                    gambar_produk='$nama_gambar_baru' 
                   WHERE id='$id'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, jpeg, atau png.');window.location='edit_produk.php?id=$id';</script>";
    }
} else {
    // jika tidak ada gambar baru, update data tanpa mengganti gambar
    $query  = "UPDATE produk SET 
                nama_produk='$nama_produk', 
                deskripsi='$deskripsi', 
                harga_beli='$harga_beli', 
                harga_jual='$harga_jual' 
               WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
    }
}
?>