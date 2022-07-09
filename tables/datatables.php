<?php
require "koneksi/koneksi.php";

$pasien = 'SELECT * FROM tb_pasien';
$det = mysqli_query($koneksi, $pasien);


?>

<body>
    <div class="m-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Pasien</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="display table table-hover">
                                <thead>
                                    <tr>
                                        <th>No DMK</th>
                                        <th>Nama Pasien</th>
                                        <th>Alamat Pasien</th>
                                        <th>Jenis Kelamin</th>
                                        <th>DX MED</th>
                                        <th>Keluhan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <?php foreach ($det as $datarow) : ?>
                                        <td><?php echo $datarow['no_dmk_pasien']; ?></td>
                                        <td><?php echo $datarow['nama_pasien']; ?></td>
                                        <td><?php echo $datarow['alamat_pasien']; ?></td>
                                        <td><?php echo $datarow['jen_kel_pasien']; ?></td>
                                        <td><?php echo $datarow['dx_med']; ?></td>
                                        <td><?php echo $datarow['keluhan']; ?></td>
                                        <td>
                                            <a class="mb-2 btn btn-primary"
                                                href="support/diagnosa.php?no_dmk_pasien=<?= $datarow["no_dmk_pasien"]; ?>">
                                                Diagnosa</a>
                                            <a class=" mb-2 btn btn-danger bi bi-trash" data-bs-toggle="modal"
                                                data-bs-target="#delete<?= $datarow["no_dmk_pasien"]; ?>"></a>
                                        </td>
                                        <div class="modal fade" id="diagnosa<?= $datarow["no_dmk_pasien"]; ?>"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <!-- modal header -->
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Isi
                                                            Gejala</h5>
                                                        <button class="bi bi-x-lgbi bi-x-lg" type="button"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <!-- <span aria-hidden="true">×</span> -->
                                                        </button>
                                                    </div>
                                                    <!-- modal body -->
                                                    <div class="modal-body">
                                                        <form method="post">
                                                            <label for="exampleInputEmail1" class="form-label">Nomor
                                                                Pasien</label>
                                                            <input type="text" name="id_pasien" class="form-control"
                                                                readonly required
                                                                value="<?= $datarow["no_dmk_pasien"]; ?>">
                                                            <br>
                                                            <?php
                                                                $idpasein = $datarow["no_dmk_pasien"];
                                                                $kdgej = '';
                                                                $abc = "SELECT tb_detail.kd_gejala, tb_diagnosa.kd_diagnosa, tb_diagnosa.kd_sub, tb_gejala.kd_gejala, tb_gejala.ket_gejala, tb_gejala.kd_diagnosa, tb_diagnosa.definisi FROM tb_detail JOIN tb_pasien ON tb_detail.id_pasien = tb_pasien.no_dmk_pasien JOIN tb_gejala ON tb_detail.kd_gejala = tb_gejala.kd_gejala JOIN tb_diagnosa ON tb_gejala.kd_diagnosa = tb_diagnosa.kd_diagnosa WHERE tb_detail.id_pasien = '$idpasein'";
                                                                $dat = mysqli_query($koneksi, $abc);
                                                                $count1 = mysqli_num_rows($dat);

                                                                $sql = "SELECT COUNT(tb_detail.kd_gejala), tb_diagnosa.kd_diagnosa, tb_diagnosa.kd_sub, tb_gejala.kd_gejala, tb_gejala.kd_diagnosa, tb_diagnosa.definisi FROM tb_detail JOIN tb_pasien ON tb_detail.id_pasien = tb_pasien.no_dmk_pasien JOIN tb_gejala ON tb_detail.kd_gejala = tb_gejala.kd_gejala JOIN tb_diagnosa ON tb_gejala.kd_diagnosa = tb_diagnosa.kd_diagnosa WHERE tb_detail.id_pasien = '$idpasein' GROUP BY tb_diagnosa.definisi ORDER BY tb_gejala.kd_diagnosa";
                                                                $data = mysqli_query($koneksi, $sql);
                                                                ?>
                                                            <label for="exampleInputEmail1"
                                                                class="form-group">Major</label>
                                                            <div class="d-flex">
                                                                <div class="mb-3 form-group col-8">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-control">Gejala</label>
                                                                    <?php foreach ($dat as $Gejala) : ?>
                                                                    &middot; <?= $Gejala["kd_gejala"]; ?>,
                                                                    <?= $Gejala["ket_gejala"]; ?><br />
                                                                    <?php endforeach; ?>
                                                                </div>
                                                                <div class="form-group col-4">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-control"> </label>
                                                                    <?php foreach ($data as $item) : ?>
                                                                    &middot; <?php echo $item['kd_diagnosa'] ?> :
                                                                    <?php echo $item['definisi'] ?><br />
                                                                    <?php endforeach; ?>
                                                                </div>
                                                            </div>
                                                            <label for=" exampleInputEmail1"
                                                                class="form-group">Penyebab</label>
                                                            <div class="d-flex">
                                                                <div class="mb-3 form-group col-8">
                                                                    <?php foreach ($gejala_tb2 as $g) : ?>
                                                                    &middot; <?= $g["ket_gejala"]; ?><br />
                                                                    <?php endforeach; ?>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-success"
                                                                name="gejalatambah">UPDATE</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>