<?php
session_start();
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
    echo "<script> 
  alert('Anda belum login!');
  location.href='../index.php';
  </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('../assets/bg/bg3.png'); /* Ganti dengan path ke gambar Anda */
            background-size: cover; /* Menyesuaikan ukuran gambar dengan layar */
            background-repeat: no-repeat; /* Menghindari pengulangan gambar */
            background-position: center; /* Menempatkan gambar di tengah */
            height: 100vh; /* Membuat body mengambil seluruh tinggi layar */
            margin: 0; /* Menghilangkan margin default */
        }
        nav {
      background-color: rgba(0, 0, 0, 0.7);
      /* Warna latar belakang navbar */
      padding: 1rem;
      /* Jarak dalam navbar */
      text-align: center;
      /* Rata tengah teks navbar */
    }

    nav a {
      color: white;
      /* Warna teks navbar */
      margin: 0 15px;
      /* Jarak antar item navbar */
      text-decoration: none;
      /* Menghilangkan garis bawah pada link */
    }

    nav a:hover {
      text-decoration: underline;
      /* Garis bawah saat hover */
    }

    .content {
      display: flex;
      /* Menggunakan flexbox untuk konten */
      justify-content: center;
      /* Mengatur horizontal */
      align-items: center;
      /* Mengatur vertikal */
      flex-grow: 1;
      /* Mengisi ruang tersisa */
      color: white;
      /* Warna teks */
      text-align: center;
      /* Rata tengah teks */
      font-family: Arial, sans-serif;
    }

    h1 {
      font-size: 3rem;
      /* Ukuran font untuk judul */
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      /* Efek bayangan pada teks */
    }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-lg">
        <div class="container">
            <h1><a class="navbar-brand " href="index.php">Website Galeri Foto</a></h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                    <a href="home.php" class="nav-link">Home</a>
                    <a href="album.php" class="nav-link">Album</a>
                    <a href="foto.php" class="nav-link">Foto</a>
                </div>


                <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>
            </div>
        </div>
    </nav>
    <!-- bagi 2 kolom -->
    <!-- kolom 1 -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-header">Tambah Album</div>
                    <div class="card-body">
                        <form action="../config/aksi_album.php" method="POST">
                            <label class="form-label">Nama Album</label>
                            <input type="text" name="nama_album" class="form-control" required>
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" required></textarea>
                            <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- kolom 2 -->
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Data Album</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Album</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $id_user = $_SESSION['id_user'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE id_user='$id_user'");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['nama_album'] ?></td>
                                        <td><?php echo $data['deskripsi'] ?></td>
                                        <td><?php echo $data['tanggal_buat'] ?></td>
                                        <td>
                                        <!-- edit button -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['id_album'] ?>">
                                                Edit
                                            </button>
                                            <div class="modal fade" id="edit<?php echo $data['id_album'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/aksi_album.php" method="POST">
                                                                <input type="hidden" name="id_album" value="<?php echo $data['id_album'] ?>">
                                                                <label class="form-label">Nama Album</label>
                                                                <input type="text" name="nama_album" value="<?php echo $data['nama_album'] ?>" class="form-control" required>
                                                                <label class="form-label">Deskripsi</label>
                                                                <textarea class="form-control" name="deskripsi"  required>
                                                                    <?php echo $data['deskripsi'] ?>
                                                                </textarea>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- delete button -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_album'] ?>">
                                                Hapus
                                            </button>
                                            <div class="modal fade" id="hapus<?php echo $data['id_album'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/aksi_album.php" method="POST">
                                                                <input type="hidden" name="id_album" value="<?php echo $data['id_album'] ?>">
                                                                Apakah anda yakin ingin menghapus data <strong> <?php echo $data['nama_album']?> </strong> ?

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="hapus" class="btn btn-primary">Hapus Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom shadow-lg">
        <p>&copy; UKK PPLG 2024 | Rizka Aula Assaf</p>
    </footer>

    <footer class="d-flex justify-content-center"></footer>


    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>

</html>