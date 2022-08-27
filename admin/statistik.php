<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Statistik</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Statistik</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- content -->
        <div class="row">
            <div class="col-xl-4 bg-white p-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bulan</th>
                                <th>Banyak Melapor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $getResource = $koneksi->query("SELECT MONTH(created_at) as bulan, COUNT(id_laporan) as banyak FROM tb_laporan GROUP BY MONTH(created_at) ORDER BY MONTH(created_at) ASC;");
                            $i = 1;
                            while ($data = mysqli_fetch_assoc($getResource)) :

                            ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <?php $bulan = ['Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember'] ?>
                                    <td><?= $bulan[$data['bulan'] - 1] ?></td>
                                    <td><?= $data['banyak'] ?></td>
                                </tr>
                            <?php $i++;
                            endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- end content -->
    </div> <!-- container-fluid -->
</div>