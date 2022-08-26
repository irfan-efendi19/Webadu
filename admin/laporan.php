<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Laporan Pengaduan</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan Pengaduan</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Aduan</h4>
                        <p class="card-title-desc">Untuk mengubah status pengaduan, dapat dengan mengklik tombol status
                        </p>
                        <div class="row">
                            <div class="col-lg-4 d-none d-lg-block">
                                <img src="./assets/images/undraw_Resume_folder_re_e0bi.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-lg-8">
                                <table class="table table-bordered dt-responsive" id="datatable">
                                    <thead>
                                        <tr class="text-center align-middle">
                                            <th>Nama</th>
                                            <th>Judul Laporan</th>
                                            <th>Isi Laporan</th>
                                            <th>Tanggal Melapor</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $data = $koneksi->query("SELECT * FROM tb_laporan ORDER BY id_laporan DESC LEFT JOIN tb_user ON tb_laporan.id_user = tb_user.id_user");
                                        while($d = mysqli_fetch_assoc($data)):
                                        ?>
                                        <tr class="align-middle">
                                            <td><?= $d['username'] ?></td>
                                            <td><?= $d['judul_laporan'] ?></td>
                                            <td class="text-center">
                                                <a href="" class="btn btn-outline-dark btn-sm">Lihat</a>
                                            </td>
                                            <td class="text-center"><?= $d['created_at'] ?></td>
                                            <td>Menunggu Konfirmasi</td>
                                        </tr>
                                        <?php endwhile ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end content -->
    </div> <!-- container-fluid -->
</div>