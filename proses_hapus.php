<?php
include 'koneksi.php';

// pastikan ada parameter id
if (isset($_GET['id'])) {
    $id = $_GET["id"];

    // ambil data produk untuk cek gambar
    $query_select = "SELECT gambar_produk FROM produk WHERE id='$id'";
    $result_select = mysqli_query($koneksi, $query_select);

    if ($result_select && mysqli_num_rows($result_select) > 0) {
        $data = mysqli_fetch_assoc($result_select);

        // hapus file gambar jika ada
        if ($data['gambar_produk'] != "" && file_exists("gambar/" . $data['gambar_produk'])) {
            unlink("gambar/" . $data['gambar_produk']);
        }

        // jalankan query DELETE
        $query_delete = "DELETE FROM produk WHERE id='$id'";
        $hasil_query = mysqli_query($koneksi, $query_delete);

        if (!$hasil_query) {
            die("Gagal menghapus data: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil dihapus.');window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Data tidak ditemukan.');window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan.');window.location='index.php';</script>";
}
?>