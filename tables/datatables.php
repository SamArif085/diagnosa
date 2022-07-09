<?php
require "koneksi/koneksi.php";

$gejala_tb = mysqli_query($koneksi, "SELECT * FROM tb_gejala JOIN tb_jenis_gejala on tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala WHERE tb_jenis_gejala.kd_jen_gejala = 'OMY-002'");
$gejala_tb1 = mysqli_query($koneksi, "SELECT * FROM tb_gejala JOIN tb_jenis_gejala on tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala WHERE tb_jenis_gejala.kd_jen_gejala = 'SMY-001'");
$gejala_tb2 = mysqli_query($koneksi, "SELECT * FROM tb_gejala JOIN tb_jenis_gejala on tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala WHERE tb_jenis_gejala.kd_jen_gejala = 'OMN-004'");
$gejala_tb3 = mysqli_query($koneksi, "SELECT * FROM tb_gejala JOIN tb_jenis_gejala on tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala WHERE tb_jenis_gejala.kd_jen_gejala = 'SMN-003'");

$sql = "SELECT * FROM tb_detail";
$detail = mysqli_query($koneksi, $sql);

$pasien = 'SELECT * FROM tb_pasien';
$det = mysqli_query($koneksi, $pasien);

$diag = 'SELECT * FROM tb_diagnosa';
$dia = mysqli_query($koneksi, $diag);

$gej = 'SELECT * FROM tb_gejala';
$geja = mysqli_query($koneksi, $gej);

if (isset($_POST['gejalatambah'])) {
    $gel = $_POST['gejala'];
    $id_pasien = $_POST['id_pasien'];

    foreach ($gel as $data) {
        // echo $data;
        $query = "INSERT INTO tb_detail (id_pasien, kd_gejala) VALUES ('$id_pasien', '$data')";
        $query_run = mysqli_query($koneksi, $query);

        if ($query_run == 1) {
            echo "
			  <script>
			  alert('berhasil tambah !');
				  document.location.href = 'index.php?page=data';
			  </script>
			  ";
        } else {
            echo "
			  <script>
			  alert('data tidak berhasil tambah !');
				  document.location.href = 'index.php?page=data';
			  </script>
			  ";
        }
    }
}
?>

<body>
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="display table table-striped table-hover">
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
                                        <?php
                                        foreach ($det as $datarow) :
                                            $datas = $datarow['no_dmk_pasien'];
                                            foreach ($detail as $dettaill) {
                                                if ($dettaill['id_pasien'] == $datas) {
                                                    $kdgejala = $dettaill['kd_gejala'];
                                                }
                                                foreach ($geja as $gejal) {
                                                    $kd_gejal = $gejal['kd_diagnosa'];
                                                    foreach ($dia as $diagno) {
                                                        if ($diagno['kd_diagnosa'] == $kd_gejal) {
                                                            $diagnosa = $diagno['definisi'];
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                            <td><?php echo $datarow['no_dmk_pasien']; ?></td>
                                            <td><?php echo $datarow['nama_pasien']; ?></td>
                                            <td><?php echo $datarow['alamat_pasien']; ?></td>
                                            <td><?php echo $datarow['jen_kel_pasien']; ?></td>
                                            <td><?php echo $datarow['dx_med']; ?></td>
                                            <td><?php echo $datarow['keluhan']; ?></td>
                                            <td>
                                                <a class="mb-2" data-bs-toggle="modal" data-bs-target="#tambahgejala<?= $datarow["no_dmk_pasien"]; ?>"><i class="btn btn-primary"> Tambah Gejala</i></a>
                                                <a class="mb-2" data-bs-toggle="modal" data-bs-target="#diagnosa<?= $datarow["no_dmk_pasien"]; ?>"><i class="btn btn-primary"> Diagnosa</i></a>
                                            </td>
                                            <div class="modal fade" id="tambahgejala<?= $datarow["no_dmk_pasien"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <!-- modal header -->
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Isi
                                                                Gejala</h5>
                                                            <button class="bi bi-x-lg" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                <!-- <span aria-hidden="true">×</span> -->
                                                            </button>
                                                        </div>
                                                        <!-- modal body -->
                                                        <div class="modal-body">
                                                            <form method="post">
                                                                <label for="exampleInputEmail1" class="form-label">Nomor
                                                                    Pasien</label>
                                                                <input type="text" name="id_pasien" class="form-control" readonly required value="<?= $datarow["no_dmk_pasien"]; ?>">
                                                                <br>
                                                                <label for="exampleInputEmail1" class="form-group">Major</label>
                                                                <div class="d-flex">
                                                                    <div class="mb-3 form-group col-8">
                                                                        <label for="exampleInputEmail1" class="form-control">Objektif</label>
                                                                        <?php foreach ($gejala_tb as $g) : ?>
                                                                            <input type="checkbox" name="gejala[]" value="<?= $g["kd_gejala"]; ?>" />
                                                                            <?= $g["ket_gejala"]; ?><br />
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                    <div class="form-group col-4">
                                                                        <label for="exampleInputEmail1" class="form-control">Subjektif</label>
                                                                        <?php foreach ($gejala_tb1 as $g) : ?>
                                                                            <input type="checkbox" name="gejala[]" value="<?= $g["kd_gejala"]; ?>" />
                                                                            <?= $g["ket_gejala"]; ?><br />
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                </div>
                                                                <label for="exampleInputEmail1" class="form-group">Minor</label>
                                                                <div class="d-flex">
                                                                    <div class="mb-3 form-group col-8">
                                                                        <label for="exampleInputEmail1" class="form-control">Objektif</label>
                                                                        <?php foreach ($gejala_tb2 as $g) : ?>
                                                                            <input type="checkbox" name="gejala[]" value="<?= $g["kd_gejala"]; ?>" />
                                                                            <?= $g["ket_gejala"]; ?><br />
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                    <div class="form-group col-4">
                                                                        <label for="exampleInputEmail1" class="form-control">Subjektif</label>
                                                                        <?php foreach ($gejala_tb3 as $g) : ?>
                                                                            <input type="checkbox" name="gejala[]" value="<?= $g["kd_gejala"]; ?>" />
                                                                            <?= $g["ket_gejala"]; ?><br />
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-success" name="gejalatambah">UPDATE</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="diagnosa<?= $datarow["no_dmk_pasien"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <!-- modal header -->
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Isi
                                                                Gejala</h5>
                                                            <button class="bi bi-x-lgbi bi-x-lg" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                <!-- <span aria-hidden="true">×</span> -->
                                                            </button>
                                                        </div>
                                                        <!-- modal body -->
                                                        <div class="modal-body">
                                                            <form method="post">
                                                                <label for="exampleInputEmail1" class="form-label">Nomor Pasien</label>
                                                                <input type="text" name="id_pasien" class="form-control" readonly required value="<?= $datarow["no_dmk_pasien"]; ?>">
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
                                                                <label for="exampleInputEmail1" class="form-group">Major</label>
                                                                <div class="d-flex">
                                                                    <div class="mb-3 form-group col-8">
                                                                        <label for="exampleInputEmail1" class="form-control">Gejala</label>
                                                                        <?php foreach ($dat as $Gejala) : ?>
                                                                            <input type="checkbox" />
                                                                            <?= $Gejala["kd_gejala"]; ?>, <?= $Gejala["ket_gejala"]; ?><br />
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                    <div class="form-group col-4">
                                                                        <label for="exampleInputEmail1" class="form-control">Diagnosa</label>
                                                                        <?php foreach ($data as $item) : ?>
                                                                            <input type="checkbox" />
                                                                            <?php echo $item['kd_diagnosa'] ?> : <?php echo $item['definisi'] ?><br />
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                </div>
                                                                <label for=" exampleInputEmail1" class="form-group">Penyebab</label>
                                                                <div class="d-flex">
                                                                    <div class="mb-3 form-group col-8">
                                                                        <?php foreach ($gejala_tb2 as $g) : ?>
                                                                            <input type="checkbox" name="gejala[]" value="<?= $g["kd_gejala"]; ?>" />
                                                                            <?= $g["ket_gejala"]; ?><br />
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-success" name="gejalatambah">UPDATE</button>
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