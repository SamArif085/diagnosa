<?php
require "koneksi/koneksi.php";

$pasien = 'SELECT * FROM tb_pasien';
$det = mysqli_query($koneksi, $pasien);

if (isset($_POST['btn-save'])) {

    global $koneksi;
    $id_pas = htmlspecialchars($_POST['id_pas']);
    $nama = htmlspecialchars($_POST['nama']);
    $jk = htmlspecialchars($_POST['jk']);
    $usia = htmlspecialchars($_POST['usia']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $dx = htmlspecialchars($_POST['dx']);
    $keluhan = htmlspecialchars($_POST['keluhan']);
    $tgl = htmlspecialchars($_POST['tgl']);

    $query = "INSERT INTO tb_pasien (no_dmk_pasien, nama_pasien, alamat_pasien, jen_kel_pasien, usia, dx_med, keluhan) VALUES ('$id_pas','$nama', '$alamat', '$jk', '$usia', '$dx', '$keluhan')";
    //     var_dump($query);
    // die;
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

if (isset($_POST['hapus'])) {
    $id = $_POST['id_pasien'];

    $query  = "DELETE FROM tb_pasien WHERE no_dmk_pasien = '$id'";
    $query_run = mysqli_query($koneksi, $query);
    if ($query_run > 0) {
        echo "
          <script>
          alert('berhasil Dihapus !');
              document.location.href = 'index.php?page=data';
          </script>
          ";
    } else {
        echo "
          <script>
          alert('data tidak berhasil Dihapus !');
              document.location.href = 'index.php?page=data';
          </script>
          ";
    }
}

if (isset($_POST['edit'])) {

    // global $koneksi;
    $namaid = htmlspecialchars($_POST['id_pass']);
    $nama = htmlspecialchars($_POST['nama']);
    $jk = htmlspecialchars($_POST['jk']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $dx = htmlspecialchars($_POST['dx']);
    $keluhan = htmlspecialchars($_POST['keluhan']);
    $tgl = htmlspecialchars($_POST['tgl']);

    $query = "UPDATE tb_pasien SET 
            no_dmk_pasien = '$namaid',
            nama_pasien ='$nama',
            alamat_pasien ='$alamat',
            jen_kel_pasien = '$jk',
            dx_med = '$dx',
            keluhan = '$keluhan',
            tanggal = '$tgl'
            WHERE no_dmk_pasien = '$namaid'
        ";
    // var_dump($query);
    // die;
    $query_run = mysqli_query($koneksi, $query);
    if ($query_run > 0) {
        echo "
			  <script>
			  alert('berhasil Ubah !');
				  document.location.href = 'index.php?page=data';
			  </script>
			  ";
    } else {
        echo "
			  <script>
			  alert('data tidak berhasil Ubah !');
				  document.location.href = 'index.php?page=data';
			  </script>
			  ";
    }
}
?>

<body>
    <div class="m-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Pasien</h4>
                        <button class=" mb-2 btn btn-danger bi bi-plus-circle" data-bs-toggle="modal"
                            data-bs-target="#tambah"> Tambah Pasien</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="display table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No DMK</th>
                                        <th>Nama Pasien</th>
                                        <th>Alamat Pasien</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Usia</th>
                                        <th>DX MED</th>
                                        <th>Keluhan</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $i = 1; ?>
                                        <?php foreach ($det as $datarow) : ?>
                                        <td><?= $i++; ?></td>
                                        <td><?php echo $datarow['no_dmk_pasien']; ?></td>
                                        <td><?php echo $datarow['nama_pasien']; ?></td>
                                        <td><?php echo $datarow['alamat_pasien']; ?></td>
                                        <td><?php echo $datarow['jen_kel_pasien']; ?></td>
                                        <td><?php echo $datarow['usia']; ?></td>
                                        <td><?php echo $datarow['dx_med']; ?></td>
                                        <td><?php echo $datarow['keluhan']; ?></td>
                                        <td><?php echo $datarow['tanggal']; ?></td>
                                        <td>
                                            <a class="mb-2 btn btn-primary"
                                                href="support/diagnosa.php?no_dmk_pasien=<?= $datarow["no_dmk_pasien"]; ?>">
                                                Diagnosa
                                            </a>
                                            <button class=" mb-2 btn btn-warning bi bi-pencil-fill"
                                                data-bs-toggle="modal"
                                                data-bs-target="#edit<?= $datarow["no_dmk_pasien"]; ?>"></button>
                                            <div class="modal fade" id="edit<?= $datarow["no_dmk_pasien"]; ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Edit&nbsp;<?php echo $datarow['nama_pasien']; ?>
                                                            </h5>
                                                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" enctype="multipart/form-data">
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label">Nomor Pasien</label>
                                                                    <input type="text" class="form-control"
                                                                        name="id_pass"
                                                                        value="<?= $datarow["no_dmk_pasien"]; ?>"
                                                                        aria-describedby="emailHelp" readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label">Nama Pasien</label>
                                                                    <input type="text" class="form-control" id="nama"
                                                                        name="nama"
                                                                        value="<?= $datarow["nama_pasien"]; ?>"
                                                                        aria-describedby="emailHelp">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label">Jenis Kelamin</label>
                                                                    <select class="form-select" name="jk"
                                                                        aria-label="Default select example">
                                                                        <option
                                                                            value="<?= $datarow["jen_kel_pasien"]; ?>"
                                                                            selected><?= $datarow["jen_kel_pasien"]; ?>
                                                                        </option>
                                                                        <option value="L">Laki - Laki</option>
                                                                        <option value="P">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="usia" class="form-label">Usia</label>
                                                                    <input type="text" class="form-control" name="usia"
                                                                        value="<?= $datarow["usia"]; ?>" id="usia">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="alamat"
                                                                        class="form-label">Alamat</label>
                                                                    <input type="text" class="form-control"
                                                                        name="alamat"
                                                                        value="<?= $datarow["alamat_pasien"]; ?>"
                                                                        id="alamat">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="DX" class="form-label">DX MED</label>
                                                                    <input type="text"
                                                                        value="<?= $datarow["dx_med"]; ?>"
                                                                        class="form-control" name="dx" id="DX">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="keluhan"
                                                                        class="form-label">Keluhan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="keluhan"
                                                                        value="<?= $datarow["keluhan"]; ?>"
                                                                        id="keluhan">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="tgl" class="form-label">Tanggal</label>
                                                                    <input type="date"
                                                                        value="<?= $datarow["tanggal"]; ?>"
                                                                        class="form-control" name="tgl" id="tgl">
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Tidak</button>
                                                            <button type="submit" name="edit"
                                                                class="btn btn-success">Simpan</button>
                                                        </div>
                                                        </form>
                                                        <!-- END EDIT -->
                                                    </div>
                                                </div>
                                            </div>
                                            <button class=" mb-2 btn btn-danger bi bi-trash" data-bs-toggle="modal"
                                                data-bs-target="#delete<?= $datarow["no_dmk_pasien"]; ?>"></button>
                                            <div class="modal fade" id="delete<?= $datarow["no_dmk_pasien"]; ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Hapus&nbsp;<?php echo $datarow['nama_pasien']; ?>
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="id_pasien"
                                                                    value="<?= $datarow["no_dmk_pasien"]; ?>">
                                                                <div class=" text-danger">Anda yakin menghapus Pasien :
                                                                    &nbsp;<?= $datarow["no_dmk_pasien"]; ?>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Tidak</button>
                                                            <button type="submit" name="hapus"
                                                                class="btn btn-success">Iya</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="mb-2 btn btn-secondary"
                                                href="support/pdf.php?no_dmk_pasien=<?= $datarow["no_dmk_pasien"]; ?>"><i
                                                    class="bi bi-filetype-pdf"></i></a>
                                        </td>
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
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!-- modal header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
                </div>
                <!-- modal body -->
                <!-- Tambah Data Pasein -->
                <div class="modal-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nomor Pasien</label>
                            <input type="text" class="form-control" id="id_pas" name="id_pas"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Pasien</label>
                            <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="jk" aria-label="Default select example">
                                <option selected>Pilih</option>
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="usia" class="form-label">Usia</label>
                            <input type="text" class="form-control" name="usia" id="usia">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat">
                        </div>
                        <div class="mb-3">
                            <label for="DX" class="form-label">DX MED</label>
                            <input type="text" class="form-control" name="dx" id="DX">
                        </div>
                        <div class="mb-3">
                            <label for="keluhan" class="form-label">Keluhan</label>
                            <input type="text" class="form-control" name="keluhan" id="keluhan">
                        </div>
                        <div class="mb-3">
                            <label for="tgl" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tgl" id="tgl">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="btn-save" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>