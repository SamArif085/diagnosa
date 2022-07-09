<?php
// session_start();

include '../koneksi/koneksi.php';
$nopasien = $_GET['no_dmk_pasien'];

$pasien = ("SELECT * FROM tb_pasien WHERE no_dmk_pasien = '$nopasien'");
$det = mysqli_query($koneksi, $pasien);
foreach ($det as $nama) {
    $namapas = $nama['nama_pasien'];
}

// Diagnosa
// $diagnosa1 = mysqli_query($koneksi, "SELECT * FROM tb_diagnosa WHERE kd_diagnosa = 'D-001'");
// $diagno1 = mysqli_query($koneksi, $diagnosa1);



// Diagnosa Satu
// Mayor Subjektif dan Objektif 
$gejala_tbsmy1 = mysqli_query($koneksi, "SELECT * FROM tb_gejala JOIN tb_jenis_gejala ON tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala JOIN tb_diagnosa ON tb_gejala.kd_diagnosa = tb_diagnosa.kd_diagnosa WHERE tb_gejala.kd_jen_gejala = 'SMY-001' AND tb_diagnosa.kd_diagnosa = 'D-001'");
$gejala_tbomy1 = mysqli_query($koneksi, "SELECT * FROM tb_gejala JOIN tb_jenis_gejala ON tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala JOIN tb_diagnosa ON tb_gejala.kd_diagnosa = tb_diagnosa.kd_diagnosa WHERE tb_gejala.kd_jen_gejala = 'OMY-002' AND tb_diagnosa.kd_diagnosa = 'D-001'");
// Minor Subjektif dan Objektif
$gejala_tbsmn1 = mysqli_query($koneksi, "SELECT * FROM tb_gejala JOIN tb_jenis_gejala ON tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala JOIN tb_diagnosa ON tb_gejala.kd_diagnosa = tb_diagnosa.kd_diagnosa WHERE tb_gejala.kd_jen_gejala = 'SMN-003' AND tb_diagnosa.kd_diagnosa = 'D-001'");
$gejala_tbomn1 = mysqli_query($koneksi, "SELECT * FROM tb_gejala JOIN tb_jenis_gejala ON tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala JOIN tb_diagnosa ON tb_gejala.kd_diagnosa = tb_diagnosa.kd_diagnosa WHERE tb_gejala.kd_jen_gejala = 'OMN-004' AND tb_diagnosa.kd_diagnosa = 'D-001'");

// Diagnosa Dua
// Mayor Subjektif dan Objektif 
$gejala_tbsmy2 = mysqli_query($koneksi, "SELECT * FROM tb_gejala JOIN tb_jenis_gejala ON tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala JOIN tb_diagnosa ON tb_gejala.kd_diagnosa = tb_diagnosa.kd_diagnosa WHERE tb_gejala.kd_jen_gejala = 'SMY-001' AND tb_diagnosa.kd_diagnosa = 'D-002'");
$gejala_tbomy2 = mysqli_query($koneksi, "SELECT * FROM tb_gejala JOIN tb_jenis_gejala ON tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala JOIN tb_diagnosa ON tb_gejala.kd_diagnosa = tb_diagnosa.kd_diagnosa WHERE tb_gejala.kd_jen_gejala = 'OMY-002' AND tb_diagnosa.kd_diagnosa = 'D-002'");
// Minor Subjektif dan Objektif
$gejala_tbsmn2 = mysqli_query($koneksi, "SELECT * FROM tb_gejala JOIN tb_jenis_gejala ON tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala JOIN tb_diagnosa ON tb_gejala.kd_diagnosa = tb_diagnosa.kd_diagnosa WHERE tb_gejala.kd_jen_gejala = 'SMN-003' AND tb_diagnosa.kd_diagnosa = 'D-002'");
$gejala_tbomn2 = mysqli_query($koneksi, "SELECT * FROM tb_gejala JOIN tb_jenis_gejala ON tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala JOIN tb_diagnosa ON tb_gejala.kd_diagnosa = tb_diagnosa.kd_diagnosa WHERE tb_gejala.kd_jen_gejala = 'OMN-004' AND tb_diagnosa.kd_diagnosa = 'D-002'");

// Diagnosa Tiga
// Mayor Subjektif dan Objektif 
$gejala_tbsmy3 = mysqli_query($koneksi, "SELECT * FROM tb_gejala JOIN tb_jenis_gejala ON tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala JOIN tb_diagnosa ON tb_gejala.kd_diagnosa = tb_diagnosa.kd_diagnosa WHERE tb_gejala.kd_jen_gejala = 'SMY-001' AND tb_diagnosa.kd_diagnosa = 'D-003'");
$gejala_tbomy3 = mysqli_query($koneksi, "SELECT * FROM tb_gejala JOIN tb_jenis_gejala ON tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala JOIN tb_diagnosa ON tb_gejala.kd_diagnosa = tb_diagnosa.kd_diagnosa WHERE tb_gejala.kd_jen_gejala = 'OMY-002' AND tb_diagnosa.kd_diagnosa = 'D-003'");
// Minor Subjektif dan Objektif
$gejala_tbsmn3 = mysqli_query($koneksi, "SELECT * FROM tb_gejala JOIN tb_jenis_gejala ON tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala JOIN tb_diagnosa ON tb_gejala.kd_diagnosa = tb_diagnosa.kd_diagnosa WHERE tb_gejala.kd_jen_gejala = 'SMN-003' AND tb_diagnosa.kd_diagnosa = 'D-003'");
$gejala_tbomn3 = mysqli_query($koneksi, "SELECT * FROM tb_gejala JOIN tb_jenis_gejala ON tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala JOIN tb_diagnosa ON tb_gejala.kd_diagnosa = tb_diagnosa.kd_diagnosa WHERE tb_gejala.kd_jen_gejala = 'OMN-004' AND tb_diagnosa.kd_diagnosa = 'D-003'");

//Penyebab
$penyebab1 = mysqli_query($koneksi, "SELECT * FROM tb_penyebab WHERE kd_diagnosa = 'D-001' ");
$penyebab2 = mysqli_query($koneksi, "SELECT * FROM tb_penyebab WHERE kd_diagnosa = 'D-002' ");
$penyebab3 = mysqli_query($koneksi, "SELECT * FROM tb_penyebab WHERE kd_diagnosa = 'D-003' ");


if (isset($_POST['simpan'])) {
    $gel = $_POST['gejala'];
    $id_pasien = $_POST['id_pasien'];
    $diagnosapost = $_POST['diagnosa'];
    $pen = $_POST['pen'];

    foreach ($gel as $data) {
        // echo $data;
        $query = "INSERT INTO tb_detail (id_pasien, kd_gejala , kd_diagnosa , kd_penyebab) VALUES ('$id_pasien', '$data','$diagnosapost','$pen')";
        $query_run = mysqli_query($koneksi, $query);

        if ($query_run == 1) {
            echo "
			  <script>
			  alert('berhasil tambah !');
				  document.location.href = '../index.php?page=data';
			  </script>
			  ";
        } else {
            echo "
			  <script>
			  alert('data tidak berhasil tambah !');
				  document.location.href = '../index.php?page=data';
			  </script>
			  ";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>

    <div class="mt-3 container-fluid">
        <h2>Diagnosa</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target='#diagnosa1<?php echo $nopasien ?> '>Bersihan
            Jalan Nafas Tidak Efektif</button>
        <!-- Modal -->
        <div class="modal fade" id='diagnosa1<?php echo $nopasien ?>' tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bersihan
                            Jalan Nafas Tidak Efektif</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data">
                            <label for="exampleInputEmail1" class="form-label">Nomor Pasien</label>
                            <input type="text" class="form-control" name="id_pasien" value="<?php echo $nopasien ?>"
                                readonly>
                            <label for="exampleInputEmail1" class="form-label">Nama Pasien</label>
                            <input type="text" class="form-control" value="<?php echo $namapas ?>" readonly>
                            <input type="text" class="form-control" name="diagnosa" value="D-001" readonly hidden>
                            <label for="exampleInputEmail1" class="form-label">Gejala Mayor</label>
                            <div class=" d-flex">
                                <div class="form-group col-6">
                                    <label for="exampleInputEmail1" class="form-control">Subjektif</label>
                                    <?php foreach ($gejala_tbsmy1 as $g) : ?>
                                    <input type="checkbox" name="gejala[]" value="<?= $g["kd_gejala"]; ?>" />
                                    <?= $g["ket_gejala"]; ?><br />
                                    <?php endforeach; ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="exampleInputEmail2" class="form-control">Objektif</label>
                                    <?php foreach ($gejala_tbomy1 as $g) : ?>
                                    <input type="checkbox" name="gejala[]" value="<?= $g["kd_gejala"]; ?>" />
                                    <?= $g["ket_gejala"]; ?><br />
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <label for="exampleInputEmail1" class="form-label">Gejala Minor</label>
                            <div class="d-flex ">
                                <div class="form-group col-6">
                                    <label for="exampleInputEmail1" class="form-control">Subjektif</label>
                                    <?php foreach ($gejala_tbsmn1 as $g) : ?>
                                    <input type="checkbox" name="gejala[]" value="<?= $g["kd_gejala"]; ?>" />
                                    <?= $g["ket_gejala"]; ?><br />
                                    <?php endforeach; ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="exampleInputEmail1" class="form-control">Objektif</label>
                                    <?php foreach ($gejala_tbomn1 as $g) : ?>
                                    <input type="checkbox" name="gejala[]" value="<?= $g["kd_gejala"]; ?>" />
                                    <?= $g["ket_gejala"]; ?><br />
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="">
                                <label for="exampleInputEmail1" class="form-label">Penyebab</label>
                                <select class="form-select" name="pen" aria-label="Default select example">
                                    <option selected>Pilih</option>
                                    <?php foreach ($penyebab1 as $g) : ?>
                                    <option value="<?= $g["kd_penyebab"]; ?>"><?= $g["ket_penyebab"]; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="simpan">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#diagnosa2<?php echo $nopasien ?>">Pola Nafas Tidak Efektif</div>
        <!-- Modal -->
        <div class="modal fade" id='diagnosa2<?php echo $nopasien ?>' tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="exampleInputEmail1" class="form-label">Nomor Pasien</label>
                        <input type="text" class="form-control" value="<?php echo $nopasien ?>" readonly>
                        <label for="exampleInputEmail1" class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" value="<?php echo $namapas ?>" readonly>
                        <input type="text" class="form-control" value="D-002" readonly hidden>
                        <label for="exampleInputEmail1" class="form-label">Gejala Mayor</label>
                        <div class="d-flex ">
                            <br>
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1" class="form-control">Subjektif</label>
                                <?php foreach ($gejala_tbsmy2 as $g) : ?>
                                <input type="checkbox" name="gejala[]" value="<?= $g["kd_gejala"]; ?>" />
                                <?= $g["ket_gejala"]; ?><br />
                                <?php endforeach; ?>
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1" class="form-control">Objektif</label>
                                <?php foreach ($gejala_tbomy2 as $g) : ?>
                                <input type="checkbox" name="gejala[]" value="<?= $g["kd_gejala"]; ?>" />
                                <?= $g["ket_gejala"]; ?><br />
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <label for="exampleInputEmail1" class="form-label">Gejala Minor</label>
                        <div class="d-flex ">
                            <br>
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1" class="form-control">Subjektif</label>
                                <?php foreach ($gejala_tbsmn2 as $g) : ?>
                                <input type="checkbox" name="gejala[]" value="<?= $g["kd_gejala"]; ?>" />
                                <?= $g["ket_gejala"]; ?><br />
                                <?php endforeach; ?>
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1" class="form-control">Objektif</label>
                                <?php foreach ($gejala_tbomn2 as $g) : ?>
                                <input type="checkbox" name="gejala[]" value="<?= $g["kd_gejala"]; ?>" />
                                <?= $g["ket_gejala"]; ?><br />
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="">
                            <label for="exampleInputEmail1" class="form-label">Penyebab</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Pilih</option>
                                <?php foreach ($penyebab2 as $g) : ?>
                                <option value="<?= $g["kd_penyebab"]; ?>"><?= $g["ket_penyebab"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="simpan">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#diagnosa3<?php echo $nopasien ?>">Diare</div>
        <div class="modal fade" id='diagnosa3<?php echo $nopasien ?>' tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="exampleInputEmail1" class="form-label">Nomor Pasien</label>
                        <input type="text" class="form-control" value="<?php echo $nopasien ?>" readonly>
                        <label for="exampleInputEmail1" class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" value="<?php echo $namapas ?>" readonly>
                        <input type="text" class="form-control" value="D-003" readonly hidden>
                        <label for="exampleInputEmail1" class="form-label">Gejala Mayor</label>
                        <div class="d-flex ">
                            <br>
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1" class="form-control">Subjektif</label>
                                <?php foreach ($gejala_tbsmy3 as $g) : ?>
                                <input type="checkbox" name="gejala[]" value="<?= $g["kd_gejala"]; ?>" />
                                <?= $g["ket_gejala"]; ?><br />
                                <?php endforeach; ?>
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1" class="form-control">Objektif</label>
                                <?php foreach ($gejala_tbomy3 as $g) : ?>
                                <input type="checkbox" name="gejala[]" value="<?= $g["kd_gejala"]; ?>" />
                                <?= $g["ket_gejala"]; ?><br />
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <label for="exampleInputEmail1" class="form-label">Gejala Minor</label>
                        <div class="d-flex ">
                            <br>
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1" class="form-control">Subjektif</label>
                                <?php foreach ($gejala_tbsmn3 as $g) : ?>
                                <input type="checkbox" name="gejala[]" value="<?= $g["kd_gejala"]; ?>" />
                                <?= $g["ket_gejala"]; ?><br />
                                <?php endforeach; ?>
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1" class="form-control">Objektif</label>
                                <?php foreach ($gejala_tbomn3 as $g) : ?>
                                <input type="checkbox" name="gejala[]" value="<?= $g["kd_gejala"]; ?>" />
                                <?= $g["ket_gejala"]; ?><br />
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="">
                            <label for="exampleInputEmail1" class="form-label">Penyebab</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Pilih</option>
                                <?php foreach ($penyebab3 as $g) : ?>
                                <option value="<?= $g["kd_penyebab"]; ?>"><?= $g["ket_penyebab"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="simpan">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>