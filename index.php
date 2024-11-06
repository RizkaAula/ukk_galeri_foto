<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Galeri Foto</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <style>
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

    p {
      font-size: 1.5rem;
      /* Ukuran font untuk deskripsi */
      margin-top: 10px;
      /* Jarak antara judul dan deskripsi */
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
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

        </div>

        <a href="register.php" class="btn btn-outline-primary m-1">Daftar</a>
        <a href="login.php" class="btn btn-outline-success m-1">Masuk</a>
      </div>
    </div>
  </nav>

  <div class="content">
    <div>
      <h1>Selamat Datang di Web Galeri Foto Sederhana</h1>
      <p>Web ini masih dalam perkembangan, untuk segala kekurangan tolong dimaafkan</p>
      <a href="home.php" class="btn btn-primary m-1">Lanjutkan Tanpa Register</a>
    </div>
  </div>

  <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom shadow-lg">
    <p>&copy; UKK PPLG 2024 | Rizka Aula Assaf</p>
  </footer>

  <footer class="d-flex justify-content-center"></footer>


  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>