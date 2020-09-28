<?php

session_start();
include('assets/inc/config.php');

if (isset($_SESSION["login"])) {
    header("Location:login.php");
}

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

if (isset($_POST['login'])) {
    $username       = $_POST['username'];
    $password       = $_POST['password'];
    $tahun          = $_POST['tahun'];

    $sql = $conn->query("SELECT * FROM tb_user WHERE username='$username'");

    if (mysqli_num_rows($sql) === 1) {

        $row = mysqli_fetch_assoc($sql);
        if (password_verify($password, $row['password'])) {

            $_SESSION['login'] = true;
            if ($row['level']  == "Admin") {
                $_SESSION['username'] = $username;
                $_SESSION['nama']     = $row['nama'];
                $_SESSION['tahun']    = $tahun;
                $_SESSION['level']    = "Admin";

                header('location:index.php');
                exit;
            } elseif ($row['level'] == "User") {
                $_SESSION['username'] = $username;
                $_SESSION['nama']     = $row['nama'];
                $_SESSION['tahun']    = $tahun;
                $_SESSION['level']    = "User";

                header('location:index.php');
                exit;
            }
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Page</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link href="assets/css/style.css" rel="stylesheet"> -->

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="mt-5 col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login e-RFK</h1>
                                    </div>

                                    <?php if (isset($error)) : ?>
                                        <p style="color:red; font-style:italic; text-align:center;">Username / Password salah</p>
                                    <?php endif; ?>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="Masukkan Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Masukkan Password">
                                        </div>
                                        <div class="form-group">
                                            <select name="tahun" id="" class="form-control">
                                                <?php
                                                $year = date('Y');
                                                for ($i = $year; $i >= 2019; $i--) {
                                                ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <input value="Login" type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                        <!-- <a href="registrasi.php" class="btn btn-info btn-user btn-block">Registrasi</a> -->
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

    <!-- <div class="footer text-center">
        <span>Copyleft &copy; Kecamatan Gajah <?php echo date('Y'); ?> </span>
    </div> -->
    <!-- End of Footer -->

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>