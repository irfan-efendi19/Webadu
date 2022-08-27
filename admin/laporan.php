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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $data = $koneksi->query("SELECT *, DATE(tb_laporan.created_at) as tgl FROM tb_laporan LEFT JOIN tb_user ON tb_laporan.id_user = tb_user.id_user ORDER BY id_laporan DESC ");
                                        while ($d = mysqli_fetch_assoc($data)) :
                                        ?>
                                            <tr class="align-middle">
                                                <td><?= $d['username'] ?></td>
                                                <td><?= $d['judul_laporan'] ?></td>
                                                <td class="text-center">
                                                    <a href="../uploads/<?= $d['file'] ?>" target="_blank" class="btn btn-primary btn-sm">Lihat</a>
                                                </td>
                                                <td class="text-center"><?= $d['tgl'] ?></td>
                                                <?php if ($d['status'] == 0) : ?>
                                                    <td><span class="badge bg-warning">Menunggu Konfirmasi</span>
                                                    <?php elseif ($d['status'] == 1) : ?>
                                                    <td><span class="badge bg-info">Terkonfirmasi</span>
                                                    <?php else: ?>
                                                    <td><span class="badge bg-success">Telah di atasi</span>
                                                    <?php endif ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="index.php?page=laporan&idk=<?= $d['id_laporan'] ?>" type="submit" name="konfirmasi" class="btn btn-warning btn-sm me-2">Konfirmasi</a>
                                                        <a href="index.php?page=laporan&id=<?= $d['id_laporan'] ?>" type="submit" name="selesai" class="btn btn-success btn-sm">Selesai</a>
                                                    </td>
                                            </tr>
                                        <?php endwhile ?>
                                    </tbody>
                                </table>
                                <?php
                                if (isset($_GET['idk'])) {
                                    try {
                                        $koneksi->query("UPDATE tb_laporan SET updated_at = NOW(), status = 1 WHERE id_laporan = '$_GET[idk]'");
                                        echo "<script>window.location.href='index.php?page=laporan'</script>";
                                    } catch (\Throwable $th) {
                                        echo "<script>alert('Server tidak merespon');window.location.href='index.php?page=laporan'</script>";
                                    }
                                }
                                if (isset($_GET['id'])) {
                                    try {
                                        $koneksi->query("UPDATE tb_laporan SET updated_at = NOW(), status = 2 WHERE id_laporan = '$_GET[id]'");
                                        echo "<script>window.location.href='index.php?page=laporan'</script>";
                                    } catch (\Throwable $th) {
                                        echo "<script>alert('Server tidak merespon');window.location.href='index.php?page=laporan'</script>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end content -->
    </div> <!-- container-fluid -->
</div>