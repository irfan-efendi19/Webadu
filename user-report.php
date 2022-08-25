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
      <link rel="stylesheet" href="style-user-report.css">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <title>LAYANAN PENGADUAN MASYARAKAT</title>
      <link rel="icon" href="asset/logo-home-round.ico" type="image/ico">
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-light bg-light shadow-lg p-3 mb-5 bg-body rounded ">
         <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <a class="navbar-brand fw-bold text-dark " href="#" >LAYANAN PENGADUAN MASYARAKAT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
                  <li class="nav-item">
                     <a class="nav-link" aria-current="page" href="#">Tutorial</a>
                  <li class="nav-item">
                     <a class="nav-link" aria-current="page" href="#">Tentang Kami</a>
               </ul>
            </div>
         </div>
      </nav>
      <div>
        <div class="container">
          <div class="text-center">
          <h2>TERIMA KASIH SUDAH MEMBUAT LAPORAN</h2>
          <p>Laporan Anda Sedang Di Proses</p>
        </div>
        <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">

<div class="col-lg-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">List Laporan</h3>
                  <p class="card-description">
                    Berikut Laporan Anda
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>ID</th>
                          <th>Waktu Laporan</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Kelompok 20</td>
                          <td>xxxx</td>
                          <td>xxxx</td>
                          <td><label class="badge bg-danger">Menunggu</label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            </div>
              </div>
            </div>
        </div>
      </div>
      <!-- Footer -->
      <!-- <footer class="text-center text-lg-start bg-light text-muted">
         <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2022 HAK CIPTA:
            <p class="text-center">KELOMPOK 20 JWD ITS 2022</p>
         </div>
      </footer> -->
      <!-- Footer -->
   </body>
</html>