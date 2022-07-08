<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "diagnosa";

$koneksi = mysqli_connect($host, $username, $password, $db);

// $detail = ('select tb_detail.id_pas, tb_detail.kd_gejala, tb_detail.waktu, tb_pasien.id_pasien, tb_pasien.nama_pasien, tb_pasien.alamat_pasien, tb_pasien.jen_kel_pasien, tb_pasien.no_dmk, tb_pasien.dx_med, tb_penyakit_gejala.kd_gejala, tb_penyakit_gejala.kd_penyakit, tb_penyakit_gejala.kd_jen_gejala, tb_jenis_gejala.kd_jen_gejala, tb_jenis_gejala.ket_jen_gejala, tb_jenis_penyebab.kd_jen_penyebab, tb_jenis_penyebab.ket_jen_penyebab, tb_penyakit_penyebab.kd_penyakit, tb_penyakit_penyebab.kd_penyebab, tb_penyakit_penyebabkd_jen_penyebab, tb_penyakit.kd_penyakit, tb_penyakit.definisi from tb.pasien join tb_detail on tb_pasien.id_pasien=tb_detail.id_pas');


$gejala_tb = mysqli_query($koneksi, "SELECT kd_gejala, ket_gejala FROM tb_gejala");

$pasien = ('SELECT * FROM tb_pasien;');

$det = mysqli_query($koneksi, $pasien);
// SELECT COUNT(kd_gejala) FROM tb_detail JOIN tb_pasien ON tb_detail.id_pas = tb_pasien.id_pasien WHERE id_pas = 'DP-0001'

// foreach ($det as $datarow){
// 	$datas = $datarow['id_pasien'];
// 	foreach()
// }

if (isset($_POST['gejalatambah'])) {
    $gel = $_POST['gejala'];
    $id_pas = $_POST['id_pas'];

    foreach ($gel as $data) {
        // echo $data;
        $query = "INSERT INTO tb_detail (id_pas, kd_gejala) VALUES ('$id_pas', '$data')";
        $query_run = mysqli_query($koneksi, $query);

        if ($query_run == 1) {
            echo "
			  <script>
			  alert('berhasil tambah !');
				  document.location.href = 'datatables.php';
			  </script>
			  ";
        } else {
            echo "
			  <script>
			  alert('data tidak berhasil tambah !');
				  document.location.href = 'datatables.php';
			  </script>
			  ";
        }
    }
}
?>

<body>
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nomor Pasien</th>
                                            <th>Nama Pasien</th>
                                            <th>Alamat Pasien</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No DMK</th>
                                            <th>DX MED</th>
                                            <th>Keluhan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nomor Pasien</th>
                                            <th>Nama Pasien</th>
                                            <th>Alamat Pasien</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No DMK</th>
                                            <th>DX MED</th>
                                            <th>Keluhan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <!-- <?php $i = 1 ?> -->

                                            <?php foreach ($det as $datarow) : ?>
                                            <td><a class="btn btn-primary" data-toggle="modal"
                                                    data-target="#detail<?= $datarow["id_pasien"]; ?>">
                                                    <?php echo $datarow['id_pasien']; ?></a></td>
                                            <td><?php echo $datarow['nama_pasien']; ?></td>
                                            <td><?php echo $datarow['alamat_pasien']; ?></td>
                                            <td><?php echo $datarow['jen_kel_pasien']; ?></td>
                                            <td><?php echo $datarow['no_dmk']; ?></td>
                                            <td><?php echo $datarow['dx_med']; ?></td>
                                            <td><?php echo $datarow['keluhan']; ?></td>
                                            <td><a class="mb-2" data-toggle="modal"
                                                    data-target="#tambahgejala<?= $datarow["id_pasien"]; ?>"><i
                                                        class="btn btn-primary"> Tambah Gejala</i></a></td>
                                            <div class="modal fade" id="tambahgejala<?= $datarow["id_pasien"]; ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <!-- modal header -->
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Isi
                                                                Gejala</h5>
                                                            <button class="close" type="button" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <!-- <span aria-hidden="true">×</span> -->
                                                            </button>
                                                        </div>
                                                        <!-- modal body -->
                                                        <div class="modal-body">
                                                            <form method="post">
                                                                <label for="exampleInputEmail1" class="form-label">Nomor
                                                                    Pasien</label>
                                                                <input type="text" name="id_pas" class="form-control"
                                                                    readonly required
                                                                    value="<?= $datarow["id_pasien"]; ?>">
                                                                <br>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-control">Gejala</label>
                                                                    <?php foreach ($gejala_tb as $g) : ?>
                                                                    <input type="checkbox" name="gejala[]"
                                                                        value="<?= $g["kd_gejala"]; ?>" />
                                                                    <?= $g["ket_gejala"]; ?><br />
                                                                    <?php endforeach; ?>
                                                                </div>
                                                                <button type="submit" class="btn btn-success"
                                                                    name="gejalatambah">UPDATE</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal fade" id="detail<?= $datarow["id_pasien"]; ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <!-- modal header -->
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Isi
                                                                Gejala</h5>
                                                            <button class="close" type="button" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <!-- <span aria-hidden="true">×</span> -->
                                                            </button>
                                                        </div>
                                                        <!-- modal body -->
                                                        <div class="modal-body">
                                                            <form method="post">
                                                                <label for="exampleInputEmail1" class="form-label">Nomor
                                                                    Pasien</label>
                                                                <input type="text" name="id_pas" class="form-control"
                                                                    readonly required value="<?= $datas; ?>">
                                                                <br>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-control">Gejala</label>
                                                                    <?php foreach ($gejala_tb as $g) : ?>
                                                                    <input type="checkbox" name="gejala[]"
                                                                        value="<?= $g["kd_gejala"]; ?>" />
                                                                    <?= $g["ket_gejala"]; ?><br />
                                                                    <?php endforeach; ?>
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
    </div>
    </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <!-- jQuery UI -->
    <script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="../../assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- Atlantis JS -->
    <script src="../../assets/js/atlantis.min.js"></script>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="../../assets/js/setting-demo2.js"></script>
    <script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
    </script>
</body>