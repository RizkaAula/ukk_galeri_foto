<?php 
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama_album = $_POST['nama_album'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_buat = date ('Y-m-d');
    $id_user = $_SESSION['id_user'];

    $sql = mysqli_query($koneksi, "INSERT INTO album VALUES('','$nama_album','$deskripsi','$tanggal_buat','$id_user')");

    echo "<script>
    alert('Data berhasil disimpan!');
    location.href='../admin/album.php';
    </script>";
}

if (isset($_POST['edit'])) {
    $id_album = $_POST['id_album'];
    $nama_album = $_POST['nama_album'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_buat = date ('Y-m-d');
    $id_user = $_SESSION['id_user'];

    $sql = mysqli_query($koneksi, "UPDATE album SET nama_album='$nama_album', deskripsi='$deskripsi', tanggal_buat='$tanggal_buat' WHERE id_album='$id_album'");

    echo "<script>
    alert('Data berhasil diperbarui!');
    location.href='../admin/album.php';
    </script>";
}

if (isset($_POST['hapus'])) {
    $id_album = $_POST['id_album'];

    $sql = mysqli_query($koneksi, "DELETE FROM album WHERE id_album='$id_album'");

    echo "<script>
    alert('Data berhasil dihapus!');
    location.href='../admin/album.php';
    </script>";
}


?>