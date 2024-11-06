<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "ukk_galerifoto"); // Sesuaikan dengan host, username, password, dan nama database Anda

// Mengecek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        /* Menyediakan ukuran tetap untuk gambar dalam kartu */
        .card-img-top {
            width: 100%;
            /* Gambar memenuhi lebar kartu */
            height: 200px;
            /* Menentukan tinggi gambar */
            object-fit: cover;
            /* Menjaga proporsi gambar meskipun di-crop */
        }

        .card {
            border: none;
            border-radius: 8px;
            /* Menambahkan sedikit kelengkungan pada sudut kartu */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Menambahkan bayangan pada kartu */
        }

        .card-footer {
            background-color: #f8f9fa;
            /* Warna latar belakang footer */
            border-top: 1px solid #eaeaea;
            /* Garis pemisah atas */
        }

        .card-body {
            padding: 0.75rem;
            /* Mengatur padding di dalam card */
        }

        /* Gaya tombol ikon dan jumlah suka/komentar */
        .card-footer i {
            margin-right: 10px;
            cursor: pointer;
        }

        .card-footer .badge {
            margin-right: 5px;
        }

        /* Mengatur container dengan card untuk menjaga gambar tetap rapi */
        .container {
            margin-top: 30px;
        }
        body {
      background-image: url('assets/bg/bg3.png');
      /* Ganti dengan path ke gambar Anda */
      background-size: cover;
      /* Menyesuaikan ukuran gambar dengan layar */
      background-repeat: no-repeat;
      /* Menghindari pengulangan gambar */
      background-position: center;
      /* Menempatkan gambar di tengah */
      height: 100vh;
      /* Membuat body mengambil seluruh tinggi layar */
      margin: 0;
      /* Menghilangkan margin default */
      display: flex;
      /* Menggunakan flexbox */
      flex-direction: column;
      /* Mengatur arah flex menjadi kolom */
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

<body style="background-image: url('assets/bg/bg3.png'); background-size: cover; background-repeat: no-repeat;">
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-lg">
        <div class="container">
            <h1><a class="navbar-brand" href="index.php">Website Galeri Foto</a></h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto"></div>
                <a href="register.php" class="btn btn-outline-primary m-1">Daftar</a>
                <a href="login.php" class="btn btn-outline-success m-1">Masuk</a>
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
                    <!-- Foto Card yang Interaktif -->
                    <a type="button" data-bs-toggle="modal" data-bs-target="#fotoModal<?php echo $data['id_foto']; ?>">
                        <div class="card mb-2">
                            <!-- Menampilkan gambar -->
                            <img src="assets/img/<?php echo $data['lokasi_file']; ?>" class="card-img-top" title="<?php echo $data['judul_foto']; ?>">
                            <div class="card-footer text-center">
                                <h5><?php echo $data['judul_foto']; ?></h5>
                                <div>
                                    <a href="register.php" class="btn btn-outline-primary m-1">
                                        <i class="fas fa-sign-in-alt"></i> Daftar Untuk Fitur Lebih
                                    </a>

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Modal untuk foto -->
    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto.id_user=user.id_user INNER JOIN album ON foto.id_album=album.id_album");
    while ($data = mysqli_fetch_array($query)) {
    ?>
        <div class="modal fade" id="fotoModal<?php echo $data['id_foto']; ?>" tabindex="-1" aria-labelledby="fotoModalLabel<?php echo $data['id_foto']; ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fotoModalLabel<?php echo $data['id_foto']; ?>"><?php echo $data['judul_foto']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Menampilkan gambar dalam modal -->
                        <img src="assets/img/<?php echo $data['lokasi_file']; ?>" class="img-fluid" alt="<?php echo $data['judul_foto']; ?>">
                        <div>
                        <hr>
                        <p>Belum punya akun? <a href="register.php">register disini!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
        <p>&copy; UKK PPLG 2024 | Rizka Aula Assaf</p>
    </footer>

    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>