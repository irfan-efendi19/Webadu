<?php
include "./config/connection.php";

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <title>LAYANAN PENGADUAN MASYARAKAT</title>
      <link rel="icon" href="asset/logo-home-round.ico" type="image/ico">
      <link rel="stylesheet" href="navbar-hide.css">
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-light bg-light shadow-lg p-3 mb-5 bg-body rounded ">
         <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <a class="navbar-brand fw-bold text-dark " href="index.php" >LAYANAN PENGADUAN MASYARAKAT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link" aria-current="page" href="#"></a>
                  <li class="nav-item">
                     <a class="nav-link" aria-current="page" href="#"></a>
                  <li class="nav-item">
                     <a class="nav-link" aria-current="page" href="#"></a>
               </ul>
            </div>
         </div>
      </nav> 
      
      <div class="container-fluid">
         <div class="container text-center ">
            <h1>LAYANAN PENGADUAN MASYARAKAT</h1>
            <p>Ikuti cara-cara pendaftaran dengan baik dan benar.</p>
         </div>
      </div>
      <div class="container-fluid">
         <form action="" method="post" >
         <div class="container">
            <div class="row">
               <div class="row">
                  <div class="col-lg-6 py-5">
                     <h1>1. Buat Akun</h1>
                     <div class="col-12">
                        <label for="inputEmail4" class="form-label">Buat Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Buat Username Baru">
                     </div>
                     <div class="col-12">
                        <label for="inputPassword4" class="form-label">Buat Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Buat password baru">
                     </div>
                     <p>Sudah mempunyai akun? <span><a href="sign-in.php">Masuk</a></span> </p>
                  </div>
                  <div class="col-lg-6 py-5 p-lg-6">
                     <h1>2. Lengkapi Identitas Anda</h1>
                     <div class="col-12">
                        <label for="inputPassword4" class="form-label">NIK</label>
                        <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK">
                     </div>
                     <div class="col-12">
                        <label for="inputEmail4" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="namaLengkap" placeholder="Masukkan Nama Lengkap">
                     </div>
                     <div class="col-12">
                        <label for="alamatLengkap" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3" placeholder="Masukkan Alamat Lengkap"></textarea>
                     </div>
                     <label for="inputEmail4" class="form-label">E-Mail</label>
                     <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
                     <div class="col-12">
                        <label for="inputEmail4" class="form-label">No. Telp</label>
                        <input type="text" class="form-control" name="noTelp" placeholder="Masukkan Nomer Telefon Aktif">
                     </div>
                  </div>
                  
                  <div class="d-grid gap-2 mb-2 pb-5">
                     <button class="btn btn-danger" name="save" type="submit">Register</button>
                  </div>
               </div>
            </div>
         </div>
         </form>
         <?php
         
            if(isset($_POST['save'])) {
               $username = mysqli_real_escape_string($koneksi, $_POST['username']);
               $password = mysqli_real_escape_string($koneksi, $_POST['password']);
               $nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
               $namaLengkap = mysqli_real_escape_string($koneksi, $_POST['namaLengkap']);
               $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
               $email = mysqli_real_escape_string($koneksi, $_POST['email']);
               $noTelp = mysqli_real_escape_string($koneksi, $_POST['noTelp']);
               try {
                  $password = md5($password);
                  $koneksi->query("INSERT INTO tb_user VALUES (NULL, '$username', '$email', '$password', '$nik', '$namaLengkap', '$alamat', '$noTelp', NULL, NOW(), NOW())");
                  echo "<script>alert('Data Berhasil ditambahkan')</script>";
               } catch (\Throwable $th) {
                  echo '<div class="mt-2 alert alert-danger  alert-dismissible fade show" role="alert">
               <strong>Gagal Ditambahkan</strong> Cek kembali data anda!
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>';
               }
            }
         
         ?>
      </div>
      </div>
      <!-- Footer -->
      <footer class="text-center text-lg-start bg-light text-muted">
         <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2022 HAK CIPTA:
            <p class="text-center">KELOMPOK 20 JWD ITS 2022</p>
         </div>
      </footer>
      <!-- Footer -->
   </body>
</html>
