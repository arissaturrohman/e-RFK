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

            $sql = $conn->query("SELECT * FROM tb_anggaran WHERE tahun='$_SESSION[tahun]' AND opd='$_SESSION[opd]'");
            $data = $sql->fetch_assoc();

            ?>
            <div class="form-group">
                <label>Anggaran</label>
                <input type="number" class="form-control" name="anggaran" value="<?= $data['anggaran']; ?>" required>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label>SP2D (Rp)</label>
                    <input type="number" class="form-control" name="sp2d" required>
                </div>
                <div class="col">
                    <label>SPJ (Rp)</label>
                    <input type="number" class="form-control" name="spj" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label>Target (%)</label>
                    <input type="text" class="form-control" name="target" required>
                </div>
                <div class="col">
                    <label>Realisasi (%)</label>
                    <input type="text" class="form-control" name="realisasi" required>
                </div>
            </div>
            <div class="form-group">
                <label>Bulan</label>
                <select name="bulan" class="form-control" required>
                    <option value="januari">Januari</option>
                    <option value="pebruari">Pebruari</option>
                    <option value="maret">Maret</option>
                    <option value="april">April</option>
                    <option value="mei">Mei</option>
                    <option value="juni">Juni</option>
                    <option value="juli">Juli</option>
                    <option value="agustus">Agustus</option>
                    <option value="september">September</option>
                    <option value="oktober">Oktober</option>
                    <option value="nopember">Nopember</option>
                    <option value="desember">Desember</option>
                </select>
            </div>
            <div class="form-group">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="ket" value="Murni">
                <label class="form-check-label">
                    Murni
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="ket" value="Perubahan">
                <label class="form-check-label">
                    Perubahan
                </label>
            </div>
            </div>
            <div class="form-group">
            <button type="submit" name="tambah" class="btn btn-primary">Submit</button>
            <a href="?page=anggaran" class="btn btn-secondary">Batal</a>
            </div>
        </form>
   </div>
</div>

</div>
</div>

<?php

if (isset($_POST['tambah'])) {

    $anggaran = $_POST['anggaran'];
    $sp2d = $_POST['sp2d'];
    $spj = $_POST['spj'];
    $target = $_POST['target'];
    $realisasi = $_POST['realisasi'];
    $bulan = $_POST['bulan'];
    $ket = $_POST['ket'];


    $sql = $conn->query("INSERT INTO tb_anggaran (anggaran, sp2d, spj, target, realisasi, bulan, keterangan, tahun) VALUES('$anggaran', '$sp2d', '$spj', '$target', '$realisasi', '$bulan', '$ket', '$_SESSION[tahun]', '$_SESSION[opd]')");

    if ($sql) {
?>
        <script>
            alert("Data berhasil ditambah..!!");
            window.location.href = "?page=anggaran";
        </script>
<?php
    }
}

?>