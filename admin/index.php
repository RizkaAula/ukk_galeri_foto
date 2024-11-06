<?php
session_start();
$id_user = $_SESSION['id_user'];
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
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

<!-- navbar atas bagian... -->
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

<!-- Log out -->
        <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>
      </div>
    </div>
  </nav>


  <div class="container mt-3">
    <div class="row">
      <?php
      $query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto.id_user=user.id_user INNER JOIN album ON foto.id_album=album.id_album");
      while ($data = mysqli_fetch_array($query)) {
      ?>
        <div class="col-md-3 mt-2">
          <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['id_foto'] ?>">

            <div class="card mb-2">
              <img style="height: 12rem;" src="../assets/img/<?php echo $data['lokasi_file'] ?>" class="card-img-top" title="<?php echo $data['judul_foto'] ?>">
              <div class="card-footer text-center">

                <?php
                $id_foto = $data['id_foto'];
                $cek_suka = mysqli_query($koneksi, "SELECT * FROM like_foto WHERE id_foto='$id_foto' AND id_user='$id_user'");
                if (mysqli_num_rows($cek_suka) == 1) { ?>
                  <a href="../config/proses_like.php?id_foto=<?php echo $data['id_foto'] ?>" type="submit" name="batal_suka"><i class="fa fa-heart"></i></a>

                <?php } else { ?>
                  <a href="../config/proses_like.php?id_foto=<?php echo $data['id_foto'] ?>" type="submit" name="suka"><i class="fa-regular fa-heart"></i></a>

                <?php }
                $like = mysqli_query($koneksi, "SELECT * FROM like_foto WHERE id_foto='$id_foto'");
                echo mysqli_num_rows($like) . ' Suka';
                ?>

                <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['id_foto'] ?>"><i class="fa-regular fa-comment"></i></a>
                <?php 
                $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentar_foto WHERE id_foto='$id_foto'");
                echo mysqli_num_rows($jmlkomen).' Komentar';
                ?>
              </div>
            </div>
          </a>

          <div class="modal fade" id="komentar<?php echo $data['id_foto'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-8">
                    <img src="../assets/img/<?php echo $data['lokasi_file'] ?>" class="card-img-top" title="<?php echo $data['judul_foto'] ?>">
                    </div>
                    <div class="col-md-4">
                      <div class="m-2">
                        <div class="overflow-auto">
                          <div class="sticky-top">
                           <strong> <?php echo $data['judul_foto'] ?> </strong><br>
                           <span class="badge bg-secondary"><?php echo $data['nama_lengkap'] ?></span>
                           <span class="badge bg-secondary"><?php echo $data['tanggal_unggah'] ?></span>
                           <span class="badge bg-primary"><?php echo $data['nama_album'] ?></span>
                          </div>
                          <hr>
                          <p align="left">
                            <?php echo $data['deskripsi_foto'] ?>
                          </p>
                          <hr>
                          <?php
                          $id_foto = $data['id_foto'];
                          $komentar = mysqli_query($koneksi,"SELECT * FROM komentar_foto INNER JOIN user ON komentar_foto.id_user=user.id_user WHERE komentar_foto.id_foto='$id_foto'");
                          while($row = mysqli_fetch_array($komentar)) {
                          ?>
                          <p align="left">
                            <strong><?php echo $row['nama_lengkap'] ?></strong>
                            <?php echo $row['isi_komentar'] ?>
                          </p>
                          <?php } ?>
                          <hr>
                          <div class="sticky-bottom">
                            <form action="../config/proses_komentar.php" method="POST">
                              <div class="input-group">
                                <input type="hidden" name="id_foto" value="<?php echo $data['id_foto'] ?>">
                                <input type="text" name="isi_komentar" class="form-control" placeholder="Tambahkan Komentar">
                                <div class="input-group-prepend">
                                  <button type="submit" name="kirim_komentar" class="btn btn-outline-primary">Kirim</button>
                                </div>

                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      <?php } ?>

    </div>
  </div>


  <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom shadow-lg">
    <p>&copy; UKK PPLG 2024 | Rizka Aula Assaf</p>
  </footer>

  <footer class="d-flex justify-content-center"></footer>


  <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>

</html>