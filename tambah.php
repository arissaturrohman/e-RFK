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
        <form method="POST">
            <?php

            $sql = $conn->query("SELECT * FROM tb_anggaran WHERE tahun='$_SESSION[tahun]'");
            $data = $sql->fetch_assoc();

            ?>
            <div class="form-group">
                <label>Anggaran</label>
                <input type="number" class="form-control" name="anggaran" value="<?= $data['anggaran']; ?>">
            </div>
            <div class="form-group">
                <label>Realisasi</label>
                <input type="number" class="form-control" name="realisasi">
            </div>
            <div class="form-group">
                <label>Bulan</label>
                <select name="bulan" class="form-control">
                    <option value="januari">Januari</option>
                    <option value="pebruari">Pebruari</option>
                    <option value="maret">Maret</option>
                </select>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="ket" value="Murni">
                <label class="form-check-label">
                    Murni
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="ket" value="Perubahan">
                <label class="form-check-label">
                    Perubahan
                </label>
            </div>
            <button type="submit" name="tambah" class="btn btn-primary">Submit</button>
            <a href="admin.php" class="btn btn-secondary">Batal</a>
        </form>
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

<?php

if (isset($_POST['tambah'])) {

    $anggaran = $_POST['anggaran'];
    $realisasi = $_POST['realisasi'];
    $bulan = $_POST['bulan'];
    $ket = $_POST['ket'];


    $sql = $conn->query("INSERT INTO tb_anggaran (anggaran, realisasi, bulan, keterangan, tahun) VALUES('$anggaran', '$realisasi', '$bulan', '$ket', '$_SESSION[tahun]')");

    if ($sql) {
?>
        <script>
            alert("Data berhasil ditambah");
            window.location.href = "admin.php";
        </script>
<?php
    }
}

?>