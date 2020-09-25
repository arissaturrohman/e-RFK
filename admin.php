<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
include('assets/inc/config.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <div class="">

            <a href="logout.php">keluar</a>


        </div><br>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Januari</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Perbuari</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Maret</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active my-5" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="" method="POST">
                            <div class="form-group">
                                <select name="keterangan" id="" class="form-control">
                                    <option value="Murni">Murni</option>
                                    <option value="Perubahan">Perubahan</option>
                                </select>
                            </div>
                            <input type="submit" name="cari" value="Pilih" class="btn btn-info">
                        </form>

                    </div>
                </div><br>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Anggaran</th>
                            <th scope="col">Realisasi</th>
                            <th scope="col">%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (isset($_POST['cari'])) {
                            $cari = $_POST['keterangan'];

                            $sql = $conn->query("SELECT * FROM tb_anggaran WHERE tahun='$_SESSION[tahun]' AND bulan='januari' AND keterangan='$cari'");
                        } else {
                            $sql = $conn->query("SELECT * FROM tb_anggaran WHERE tahun='$_SESSION[tahun]' AND bulan='januari'");
                        }
                        $no = 1;
                        while ($data = $sql->fetch_assoc()) {
                            $anggaran = $data['anggaran'];
                            $realisasi = $data['realisasi'];


                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= number_format($anggaran); ?></td>
                                <td><?= number_format($realisasi); ?></td>
                                <td><?= number_format(($realisasi / $anggaran) * 100, 2); ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="4" class="text-center">
                                <?php
                                $kosong = '';
                                if (mysqli_num_rows($sql) == $kosong) {
                                    echo '<span class="text-danger">Tidak ada data..!!</span>';
                                }
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade my-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                <div class="row">
                    <div class="col-sm-4">
                        <form action="" method="POST">
                            <div class="form-group">
                                <select name="keterangan" id="" class="form-control">
                                    <option value="Murni">Murni</option>
                                    <option value="Perubahan">Perubahan</option>
                                </select>
                            </div>
                            <input type="submit" name="cari" value="Pilih" class="btn btn-info">
                        </form>

                    </div>
                </div><br>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Anggaran</th>
                            <th scope="col">Realisasi</th>
                            <th scope="col">%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['cari'])) {
                            $cari = $_POST['keterangan'];

                            $sql = $conn->query("SELECT * FROM tb_anggaran WHERE tahun='$_SESSION[tahun]' AND bulan='pebruari' AND keterangan='$cari'");
                        } else {
                            $sql = $conn->query("SELECT * FROM tb_anggaran WHERE tahun='$_SESSION[tahun]' AND bulan='pebruari'");
                        }
                        $no = 1;
                        while ($data = $sql->fetch_assoc()) {
                            $anggaran = $data['anggaran'];
                            $realisasi = $data['realisasi'];


                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= number_format($anggaran); ?></td>
                                <td><?= number_format($realisasi); ?></td>
                                <td><?= number_format(($realisasi / $anggaran) * 100, 2); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade my-5" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                <div class="row">
                    <div class="col-sm-4">
                        <form action="" method="POST">
                            <div class="form-group">
                                <select name="keterangan" id="" class="form-control">
                                    <option value="Murni">Murni</option>
                                    <option value="Perubahan">Perubahan</option>
                                </select>
                            </div>
                            <input type="submit" name="cari" value="Pilih" class="btn btn-info">
                        </form>

                    </div>
                </div><br>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Anggaran</th>
                            <th scope="col">Realisasi</th>
                            <th scope="col">%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['cari'])) {
                            $cari = $_POST['keterangan'];

                            $sql = $conn->query("SELECT * FROM tb_anggaran WHERE tahun='$_SESSION[tahun]' AND bulan='maret' AND keterangan='$cari'");
                        } else {
                            $sql = $conn->query("SELECT * FROM tb_anggaran WHERE tahun='$_SESSION[tahun]' AND bulan='maret'");
                        }
                        $no = 1;
                        while ($data = $sql->fetch_assoc()) {
                            $anggaran = $data['anggaran'];
                            $realisasi = $data['realisasi'];


                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= number_format($anggaran); ?></td>
                                <td><?= number_format($realisasi); ?></td>
                                <td><?= number_format(($realisasi / $anggaran) * 100, 2); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="tambah.php" class="btn btn-primary">Tambah</a>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
        $('#myTab a').on('click', function(e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script>
</body>

</html>