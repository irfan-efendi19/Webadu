<?php
include "./config/connection.php";
// Start the session
session_start();
if ($_SESSION['userweb'] == '') {
  header("location:form_register.php");
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
  <link rel="stylesheet" href="style-user-report.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="navbar-hide.css">
  <title>LAYANAN PENGADUAN MASYARAKAT</title>
  <link rel="icon" href="asset/logo-home-round.ico" type="image/ico">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg p-3 mb-5 bg-body rounded">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <a class="navbar-brand fw-bold text-dark f-" href="index.php">LAYANAN PENGADUAN MASYARAKAT</a>
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
  <div>
    <div class="container my-5">
      <div class="text-center">
        <h2>TERIMA KASIH SUDAH MEMBUAT LAPORAN</h2>

      </div>
      <div class="page-content page-container mt-4" id="page-content">
        <div class="row container d-flex justify-content-center">

          <div class="col-lg-12 grid-margin stretch-card">
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
                        <th>Judul Laporan</th>
                        <th>Isi Laporan</th>
                        <th>Waktu Laporan</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                    $sql = "SELECT * FROM tb_laporan
                    join tb_user
                    on tb_laporan.id_user = tb_user.id_user 
                    where tb_user.username = '" . $_SESSION['userweb'] . "'";
                      $result = $koneksi->query($sql);
                      if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                      ?>
                          <tr>
                            <td><?= $row['id_laporan'] ?></td>
                            <td><?= $row['judul_laporan'] ?></td>
                            <td><?= $row['deskripsi'] ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td><label class="badge bg-danger rounded"><?= $row['status'] == 0 ? "Menunggu Konfirmasi" : "Telah Terkonfirmasi" ?></label></td>
                          </tr>
                      <?php
                        }
                      } else {
                        echo "0 results";
                      }
                      $koneksi->close();
                      ?>
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