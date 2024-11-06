<?php
session_start();
include '../config/koneksi.php'; // Pastikan koneksi ke database sudah benar

// Cek apakah user sudah login
if ($_SESSION['status'] != 'login') {
  echo "<script> 
  alert('Anda belum login!');
  location.href='../index.php';
  </script>";
}

// Ambil id_komentar dan id_foto dari query string
$id_komentar = $_GET['id_komentar'];
$id_foto = $_GET['id_foto'];

// Hapus komentar berdasarkan id_komentar
$hapus_komentar = mysqli_query($koneksi, "DELETE FROM komentar_foto WHERE id_komentar='$id_komentar'");

// Jika berhasil menghapus
if ($hapus_komentar) {
  echo "<script> 
    alert('Komentar berhasil dihapus');
    location.href='../admin/home.php'; // Redirect ke halaman foto
    </script>";
} else {
  // Jika gagal menghapus
  echo "<script> 
    alert('Terjadi kesalahan, komentar gagal dihapus');
    location.href='../admin/home.php'; // Redirect ke halaman foto
    </script>";
}
?>
