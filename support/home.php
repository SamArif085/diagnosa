<?php
require "koneksi/koneksi.php";

$sql = "SELECT COUNT(tb_detail.kd_gejala), tb_diagnosa.kd_diagnosa, tb_diagnosa.kd_sub, tb_gejala.kd_gejala, tb_gejala.kd_diagnosa, tb_diagnosa.definisi FROM tb_detail JOIN tb_pasien ON tb_detail.id_pasien = tb_pasien.no_dmk_pasien JOIN tb_gejala ON tb_detail.kd_gejala = tb_gejala.kd_gejala JOIN tb_diagnosa ON tb_gejala.kd_diagnosa = tb_diagnosa.kd_diagnosa WHERE tb_detail.id_pasien = 'DP-0001'";

$data = mysqli_query($koneksi, $sql);
?>
<!-- <div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-6">
            <div class="card full-height">
                <?php foreach ($data as $item) : ?>
                    <div class="card-body">
                        <?php echo $item['kd_diagnosa'] ?> :
                        <?php echo $item['definisi'] ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div> -->
<div class="mt-2">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#777" />
                    </svg> -->
                <img src="img/yellow-beautiful-backgrounds-desktop-wallpaper-preview.jpg" alt="">

                <div class="container">
                    <div class="carousel-caption text-start text-center">
                        <center>
                            <div class="card card-body col-6 border border-danger bg-success">
                                <h1 class=" text-light">Kelompok 3 </h1>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>