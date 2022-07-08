<?php
require "koneksi/koneksi.php";

$sql = "SELECT COUNT(tb_detail.kd_gejala), tb_diagnosa.kd_diagnosa, tb_diagnosa.kd_sub, tb_gejala.kd_gejala, tb_gejala.kd_diagnosa, tb_diagnosa.definisi FROM tb_detail JOIN tb_pasien ON tb_detail.id_pasien = tb_pasien.no_dmk_pasien JOIN tb_gejala ON tb_detail.kd_gejala = tb_gejala.kd_gejala JOIN tb_diagnosa ON tb_gejala.kd_diagnosa = tb_diagnosa.kd_diagnosa WHERE tb_detail.id_pasien = 'DP-0001'";

$data = mysqli_query($koneksi, $sql);
?>


<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
                <a href="#" class="btn btn-secondary btn-round">Add Customer</a>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Overall statistics</div>
                    <div class="card-category">Daily information about statistics in system</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-1"></div>
                            <h6 class="fw-bold mt-3 mb-0">New Users</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-2"></div>
                            <h6 class="fw-bold mt-3 mb-0">Sales</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-3"></div>
                            <h6 class="fw-bold mt-3 mb-0">Subscribers</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
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
</div>