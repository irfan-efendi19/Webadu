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
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-danger">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Selamat Datang!</h5>
                                <p class="text-white-50">Sign in untuk masuk.</p>
                                <a href="index.html" class="logo logo-admin">
                                    <img src="assets/images/logo-sm.png" height="24" alt="logo">
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class="mt-4" action="" method="POST">
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="password" required>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-12 d-grid mt-2">
                                            <button class="btn btn-danger w-md waves-effect waves-light d-block" type="submit" name="login">Log In</button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                include '../config/connection.php';
                                session_start();
                                if(!empty($_SESSION['id_admin'])) {
                                    echo "<script>window.location.href = 'index.php?page=dashboard'</script>";
                                }
                                if (isset($_POST['login'])) {
                                    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
                                    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
                                    try {
                                        $getResource = mysqli_fetch_assoc($koneksi->query("SELECT * FROM tb_admin WHERE email = '$email'"));
                                        if (password_verify($password, $getResource['password'])) {
                                            $_SESSION['id_admin'] = $getResource['id_admin'];
                                            $_SESSION['nama'] = $getResource['username'];
                                            echo "<script>window.location.href = 'index.php?page=dashboard'</script>";
                                        } else {
                                            echo "<script>alert('Password yang anda masukkan salah')</script>";
                                        }
                                    } catch (\Throwable $th) {
                                        echo "<script>alert('Akun belum terdaftar')</script>";
                                    }
                                }

                                ?>
                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        <p class="mb-0">© <script>
                                document.write(new Date().getFullYear())
                            </script> WebAdu. Crafted with <i class="mdi mdi-heart text-danger"></i> by Kelompok 20</p>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/js/app.js"></script>

</body>


<!-- Mirrored from themesbrand.com/veltrix/layouts/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Aug 2022 23:54:45 GMT -->

</html>