<?php
require "koneksi/koneksi.php";

$diagnosa = mysqli_query($koneksi, "SELECT * from tb_diagnosa");

if (isset($_POST['btn-save'])) {
    global $koneksi;
    $id_pas = htmlspecialchars($_POST['id_pas']);
    $nama = htmlspecialchars($_POST['nama']);
    $jk = htmlspecialchars($_POST['jk']);
    $nodm = htmlspecialchars($_POST['nodm']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $dx = htmlspecialchars($_POST['dx']);
    $keluhan = htmlspecialchars($_POST['keluhan']);

    $query = "INSERT INTO tb_pasien (no_dmk_pasien, nama_pasien, alamat_pasien, jen_kel_pasien, no_dmk, dx_med, keluhan) VALUES ('$id_pas','$nama', '$alamat', '$jk', '$nodm', '$dx', '$keluhan')";
    // var_dump($query);
    // die;
    // foreach ($gel as $data) {
    //     // echo $data;
    //     $query = "INSERT INTO tb_detail (id_pas, kd_gejala) VALUES ('$id_pas', '$data')";
    //     $query_run = mysqli_query($koneksi, $query);
    // }
    // $query = "INSERT INTO tb_detail (id_pas, kd_gejala) VALUES ('$id_pas', '$gel')";
    $query_run = mysqli_query($koneksi, $query);
    if ($query_run == 1) {
        echo "
          <script>
          alert('berhasil tambah !');
              document.location.href = 'index.php';
          </script>
          ";
    } else {
        echo "
          <script>
          alert('data tidak berhasil tambah !');
              document.location.href = 'index.php';
          </script>
          ";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Pasien</label>
                <input type="text" class="form-control" id="id_pas" name="id_pas" aria-describedby="emailHelp">
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
            <button type="submit" name="btn-save" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>

<script>

</script>