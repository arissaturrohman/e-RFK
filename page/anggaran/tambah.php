<div class="row">
<div class="col-3"></div>
<div class="col-6">
<div class="card shadow mb-4">
            <div class="card-header bg-secondary py-3">
              <h6 class="m-0 font-weight-bold text-white">Form Tambah Data</h6>
            </div>
            <div class="card-body">
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
            <a href="?page=anggaran" class="btn btn-secondary">Batal</a>
        </form>
   </div>
</div>

</div>
</div>

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
            window.location.href = "?page=anggaran";
        </script>
<?php
    }
}

?>