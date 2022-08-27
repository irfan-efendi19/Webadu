<?php
include '../config/connection.php';
session_start();
if (empty($_SESSION['id_admin'])) {
    echo "<script>window.location.href = './login.php'</script>";
}
$aku = mysqli_fetch_assoc($koneksi->query("SELECT * FROM tb_admin WHERE id_admin = '$_SESSION[id_admin]'"))
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>WEB ADU | Website Pengaduan Masyarakat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="website adu surabaya" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/libs/chartist/chartist.min.css" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
</head>

<body data-sidebar="light" data-topbar="dark">
    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar" class="bg-danger">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <!-- <img src="assets/images/logo-sm.png" alt="" height="22"> -->
                            </span>
                            <span class="logo-lg">
                                <!-- <img src="assets/images/logo-dark.png" alt="" height="17"> -->
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <!-- <img src="assets/images/logo-sm.png" alt="" height="22"> -->
                            </span>
                            <span class="logo-lg">
                                <!-- <img src="assets/images/logo-light.png" alt="" height="18"> -->
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu text-white"></i>
                    </button>
                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle avatar-sm" src="../uploads/<?= $aku['thumbnail'] == null ? 'default.jpg' : $aku['thumbnail']?>" alt="Header Avatar" style="border: 3px solid white;">
                        </button>
                        <span class="text-white d-none d-lg-inline-block"><?= $aku['username']?></span>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="index.php?page=profile"><i class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> Profile</a>
                            <a class="dropdown-item text-danger" href="../logout.php"><i class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> Logout</a>
                        </div>
                    </div>
                    <div class="dropdown d-inline-block me-lg-5">
                        <a href="../logout.php" class="btn header-item noti-icon waves-effect mt-2">
                            <i class="mdi mdi-power text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Main</li>
                        <li>
                            <a href="index.php?page=dashboard" class="waves-effect">
                                <i class="ti-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="menu-title">Data</li>
                        <li>
                            <a href="index.php?page=laporan" class="waves-effect">
                                <i class="ti-notepad"></i>
                                <span>Laporan Pengaduan</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?page=statistik" class="waves-effect">
                                <i class="ti-pie-chart"></i>
                                <span>Statistik</span>
                            </a>
                        </li>
                        <li class="menu-title">Akun</li>
                        <li>
                            <a href="index.php?page=profile" class="waves-effect">
                                <i class="ti-user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <?php
            @$page = $_GET['page'];
            switch ($page) {
                case 'dashboard':
                    include 'Dashboard.php';
                    break;
                case 'laporan':
                    include 'laporan.php';
                    break;
                case 'statistik':
                    include 'statistik.php';
                    break;
                case 'profile':
                    include 'profile.php';
                    break;
                default:
                    include 'dashboard.php';
                    break;
            }

            ?>
            <!-- End Page-content -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> WebAdu<span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Kelompok 20.</span>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <!-- Peity chart-->
    <script src="assets/libs/peity/jquery.peity.min.js"></script>
    <!-- Plugin Js-->
    <script src="assets/libs/chartist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script>
    <script src="assets/js/pages/dashboard.init.js"></script>
    <script src="assets/js/app.js"></script>
    <!-- Data Table -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="assets/js/pages/datatables.init.js"></script>
    <!-- morris chart -->
    <script src="assets/libs/morris.js/morris.min.js"></script>
    <script src="assets/libs/raphael/raphael.min.js"></script>
    <!-- morris init js -->
    <script src="assets/js/pages/morris.init.js"></script>
    <script src="assets/js/chart.js"></script>
</body>

</html>