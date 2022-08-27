<?php
$aku = mysqli_fetch_assoc($koneksi->query("SELECT * FROM tb_admin WHERE id_admin = '$_SESSION[id_admin]'"))
?>
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Profile</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" id="username" value="<?= $aku['username'] ?>" autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?= $aku['email'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password baru">
                                    </div>
                                    <div class="mb-3">
                                        <label for="konfirmasi" class="form-label">Konfirmasi Password</label>
                                        <input type="password" class="form-control" name="konfirmasi" id="konfirmasi" placeholder="Masukkan konfirmasi password baru">
                                    </div>
                                    <div class="mb-3">
                                        <label for="file" class="form-label">Foto Profil</label>
                                        <input type="file" class="form-control" name="file" id="file">
                                    </div>
                                    <div class="mb-3 text-end">
                                        <button type="submit" class="btn btn-success" name="simpan">SIMPAN</button>
                                    </div>
                            </div>
                            </form>
                            <?php
                            if (isset($_POST['simpan'])) {
                                $update = [];
                                $username = mysqli_real_escape_string($koneksi, $_POST['username']);
                                $email = mysqli_real_escape_string($koneksi, $_POST['email']);
                                $password = mysqli_real_escape_string($koneksi, $_POST['password']);
                                $konfirmasi = mysqli_real_escape_string($koneksi, $_POST['konfirmasi']);
                                $konfirmasi = password_hash($konfirmasi, PASSWORD_DEFAULT);

                                if ($aku['username'] != $username) {
                                    array_push($update, 'username = ' . "'$username'");
                                }
                                if ($aku['email'] != $email) {
                                    array_push($update, 'email = ' . "'$email'");
                                }
                                if (!empty($password)) {
                                    if ($aku['password'] != $password) {
                                        if ($password == $konfirmasi) {
                                            $password = password_hash($password, PASSWORD_DEFAULT);
                                            array_push($update, 'password = ' . $password);
                                        } else {
                                            echo "<script>alert('password tidak sesuai'); window.location.href=''</script>";
                                        }
                                    }
                                }
                                if (empty($_FILES['file']['tmp_name'])) {
                                    try {
                                        $koneksi->query("UPDATE tb_admin SET " . join(", ", $update) . " WHERE id_admin = '$_SESSION[id_admin]'");
                                        echo "<script>alert('Data berhasil dirubah'); window.location.href=''</script>";
                                    } catch (\Throwable $th) {
                                        echo $th;
                                    }
                                } else {
                                    $allowed = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG");
                                    $foto = explode(".", $_FILES['file']['name']);
                                    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                    $nama_gambar = rand(1, 9999) . round(microtime(true)) . '.' . end($foto);
                                    $file = "../uploads/$nama_gambar";
                                    move_uploaded_file($_FILES['file']['tmp_name'], $file);
                                    if (in_array($ext, $allowed)) {
                                        $putResource =   $koneksi->query("UPDATE tb_admin SET " . join(", ", $update) . " thumbnail = '$nama_gambar' WHERE id_admin = '$_SESSION[id_admin]'");
                                        echo "<script>alert('Data berhasil dirubah'); window.location.href=''</script>";
                                        if ($putResource) {
                                            echo "<script>
                                                alert('Data berhasil dirubah');
                                            </script>";
                                        }
                                    } else {
                                       echo "<script>alert('Data bukan gambar')</script>";
                                    }
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