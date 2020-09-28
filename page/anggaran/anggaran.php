<div class="card shadow mb-4">
            <div class="card-header bg-secondary py-3">
              <h6 class="m-0 font-weight-bold text-white">Data Anggaran OPD</h6>
            </div>
            <div class="card-body">
            <div class="row">
                    <div class="col">
                        <form action="" method="POST">
                            <div class="form-row">
                            <div class="col-sm-2">
                                <select name="keterangan" id="" class="form-control">
                                    <option value="Murni">Murni</option>
                                    <option value="Perubahan">Perubahan</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                            <button type="submit" name="cari" class="btn btn-info">Pilih</button>
                            
                            </div>
                            </div>
                        </form>
                    </div>
                </div><br>
<ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="jan-tab" data-toggle="tab" href="#jan" role="tab" aria-controls="jan" aria-selected="true">Januari</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="peb-tab" data-toggle="tab" href="#peb" role="tab" aria-controls="peb" aria-selected="false">Pebruari</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="mar-tab" data-toggle="tab" href="#mar" role="tab" aria-controls="mar" aria-selected="false">Maret</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="apr-tab" data-toggle="tab" href="#apr" role="tab" aria-controls="apr" aria-selected="false">April</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="mei-tab" data-toggle="tab" href="#mei" role="tab" aria-controls="mei" aria-selected="false">Mei</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="juni-tab" data-toggle="tab" href="#juni" role="tab" aria-controls="juni" aria-selected="false">Juni</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="juli-tab" data-toggle="tab" href="#juli" role="tab" aria-controls="juli" aria-selected="false">Juli</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="agust-tab" data-toggle="tab" href="#agust" role="tab" aria-controls="agust" aria-selected="false">Agustus</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="sept-tab" data-toggle="tab" href="#sept" role="tab" aria-controls="sept" aria-selected="false">September</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="okt-tab" data-toggle="tab" href="#okt" role="tab" aria-controls="okt" aria-selected="false">Oktober</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="nop-tab" data-toggle="tab" href="#nop" role="tab" aria-controls="nop" aria-selected="false">Nopember</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="des-tab" data-toggle="tab" href="#des" role="tab" aria-controls="des" aria-selected="false">Desember</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active my-5" id="jan" role="tabpanel" aria-labelledby="jan-tab">
                

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center align-middle">
                            <th rowspan="2" class="align-text-top">#</th>
                            <th rowspan="2" class="align-text-top">Anggaran</th>
                            <th colspan="4">Keuangan</th>
                            <th colspan="2">Fisik</th>
                            <th rowspan="2" class="align-text-top">Keterangan</th>
                        </tr>
                        <tr class="text-center align-middle">
                            <th >SP2D</th>
                            <th >%</th>
                            <th >SPJ</th>
                            <th >%</th>
                            <th>Target (%)</th>
                            <th>Realisasi (%)</th>                            
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
                                <td><?= "Anggaran " . $data['keterangan']; ?></td>
                                <td>Tes</td>
                                <td>Coba</td>
                                <td>Jajal</td>
                                <td>123</td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="9" class="text-center">
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
            <div class="tab-pane fade my-5" id="peb" role="tabpanel" aria-labelledby="peb-tab">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Anggaran</th>
                            <th scope="col">Realisasi</th>
                            <th scope="col">%</th>
                            <th scope="col">Keterangan</th>
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
                                <td><?= $data['keterangan'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade my-5" id="mar" role="tabpanel" aria-labelledby="mar-tab">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Anggaran</th>
                            <th scope="col">Realisasi</th>
                            <th scope="col">%</th>
                            <th scope="col">Keterangan</th>
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
                                <td><?= $data['keterangan']?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="apr" role="tabpanel" aria-labelledby="apr-tab">...</div>
            <div class="tab-pane fade" id="mei" role="tabpanel" aria-labelledby="mei-tab">...</div>
            <div class="tab-pane fade" id="juni" role="tabpanel" aria-labelledby="juni-tab">...</div>
            <div class="tab-pane fade" id="juli" role="tabpanel" aria-labelledby="juli-tab">...</div>
            <div class="tab-pane fade" id="agust" role="tabpanel" aria-labelledby="agust-tab">...</div>
            <div class="tab-pane fade" id="sept" role="tabpanel" aria-labelledby="sept-tab">...</div>
            <div class="tab-pane fade" id="okt" role="tabpanel" aria-labelledby="okt-tab">...</div>
            <div class="tab-pane fade" id="nop" role="tabpanel" aria-labelledby="nop-tab">...</div>
            <div class="tab-pane fade" id="des" role="tabpanel" aria-labelledby="des-tab">...</div>
        </div>
    <a href="?page=anggaran&aksi=tambah" class="btn btn-dark">Tambah</a>
    </div>
</div>