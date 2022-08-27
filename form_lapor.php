<?php
include "./config/connection.php";
// Start the session
session_start();
if ($_SESSION['userweb'] == '') {
   header("location:sign-in.php");
   exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="navbar-hide.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <title>LAYANAN PENGADUAN MASYARAKAT</title>
</head>

<body>
   <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-light bg-light shadow-lg p-3 mb-5 bg-body rounded ">
      <div class="container-fluid">
         <a class="navbar-brand" href="index.php">
            <a class="navbar-brand fw-bold text-dark " href="index.php">LAYANAN PENGADUAN MASYARAKAT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
               <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Halo, <?= $_SESSION['userweb'] ?> </a>
                     <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="form_lapor.php">Lapor</a></li>
                        <li><a class="dropdown-item" href="user-report.php">Monitoring</a></li>
                        <li><a class="dropdown-item" href="logout.php">Keluar</a></li>
                     </ul>
                  </li>
               </ul>
            </div>
      </div>
   </nav>
   <div class="container-fluid ">
      <div class="container text-center ">
         <h1>LAYANAN PENGADUAN MASYARAKAT</h1>
         <p>Ikuti cara-cara pendaftaran dengan baik dan benar.</p>
      </div>
   </div>
   <div class="container-fluid">
      <div class="container">
         <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
               <div class="row">
                  <div class="col-lg-12 py-5">
                     <h1>Buat Laporan</h1>
                     <div class="col-12">
                        <label for="judulLaporan" class="form-label">Judul Laporan</label>
                        <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Laporan">
                     </div>
                     <div class="col-12">
                        <label for="laporanLengkap" class="form-label">Tulis Laporan Lengkap</label>
                        <textarea class="form-control" name="laporan" rows="3" placeholder="Tulis Laporan Secara Lengkap"></textarea>
                     </div>
                     <div class="col-12">
                        <label for="laporanLengkap" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal">
                     </div>
                     <div class="col-12">
                        <label for="tempatKejadian" class="form-label">Tempat Kejadian</label>
                        <input type="text" class="form-control" name="lokasi" placeholder="Masukkan Tempat Kejadian">
                     </div>
                     <div class="col-12">
                        <label for="instansi" class="form-label">Instansi Tujuan</label>
                        <input type="text" class="form-control" name="instansi" placeholder="Masukkan Instansi Tujuan">
                     </div>
                     <div class="col-12">
                        <label for="instansi" class="form-label">Upload Berkas Kejadian</label>
                        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                     </div>
                  </div>
                  <div class="d-grid gap-2 mb-2 pb-5">
                     <button class="btn btn-danger" name="save" id="save" type="submit">LAPOR !</button>
                  </div>
               </div>
            </div>
      </div>
      </form>
      <?php

      $sql = "SELECT * FROM tb_user where username = '" . $_SESSION['userweb'] . "'";
      $result = $koneksi->query($sql);
      if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()) {
            $id_user = $row['id_user'];
         }
      }
      if (isset($_POST['save'])) {
         $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
         $laporan = mysqli_real_escape_string($koneksi, $_POST['laporan']);
         $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
         $lokasi = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
         $instansi = mysqli_real_escape_string($koneksi, $_POST['instansi']);
         if (empty($_FILES['fileToUpload']['tmp_name'])) {
            try {
               $koneksi->query("INSERT INTO tb_laporan VALUES (NULL, '$id_user', '$judul', '$laporan', '$tanggal', '$lokasi', '$instansi', 0, NULL, NOW(), NOW())");
            } catch (\Throwable $th) {
               echo "<script>alert('Server tidak merespon')</script>";
            }
         } else {
            $file = explode(".", $_FILES['fileToUpload']['name']);
            $file = rand(1, 9999) . round(microtime(true)) . '.' . end($file);
            $location = "./uploads/$file";
            try {
               $koneksi->query("INSERT INTO tb_laporan VALUES (NULL, '$id_user', '$judul', '$laporan', '$tanggal', '$lokasi', '$instansi', 0, '$file', NOW(), NOW())");
               move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $location);
               echo "<script>alert('Laporan ditambahkan')</script>";
            } catch (\Throwable $th) {
               echo $th;
            }
         }
      }
      ?>
   </div>
   <!--FOOTER -->
   <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
      <div class="container text-center">
         <small>Copyright &copy; Kelompok 20 JWD ITS KOMINFO 2022</small>
      </div>
   </footer>
</body>

</html>