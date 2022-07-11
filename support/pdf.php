<?php
require '../koneksi/koneksi.php';
require('../fpdf184/fpdf.php');
$nopasien = $_GET['no_dmk_pasien'];

$pasi = ("SELECT * FROM tb_pasien WHERE no_dmk_pasien = '$nopasien'");
$det = mysqli_query($koneksi, $pasi);
foreach ($det as $nama) {
    $namapas = $nama['nama_pasien'];
    $nodmkpas = $nama['no_dmk_pasien'];
    $jk = $nama['jen_kel_pasien'];
    $alamat = $nama['alamat_pasien'];
    $dx = $nama['dx_med'];
    $keluhan = $nama['keluhan'];
}

$gejala_smy = "SELECT tb_gejala.ket_gejala, tb_gejala.kd_jen_gejala FROM tb_detail JOIN tb_gejala ON tb_detail.kd_gejala = tb_gejala.kd_gejala JOIN tb_jenis_gejala ON tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala WHERE tb_detail.id_pasien = '$nopasien' AND tb_jenis_gejala.kd_jen_gejala = 'SMY-001'";
$gejala1 = mysqli_query($koneksi, $gejala_smy);

$gejala_omy = "SELECT tb_gejala.ket_gejala, tb_gejala.kd_jen_gejala FROM tb_detail JOIN tb_gejala ON tb_detail.kd_gejala = tb_gejala.kd_gejala JOIN tb_jenis_gejala ON tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala WHERE tb_detail.id_pasien = '$nopasien' AND tb_jenis_gejala.kd_jen_gejala = 'OMY-002'";
$gejala2 = mysqli_query($koneksi, $gejala_omy);

$gejala_smn = "SELECT tb_gejala.ket_gejala, tb_gejala.kd_jen_gejala FROM tb_detail JOIN tb_gejala ON tb_detail.kd_gejala = tb_gejala.kd_gejala JOIN tb_jenis_gejala ON tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala WHERE tb_detail.id_pasien = '$nopasien' AND tb_jenis_gejala.kd_jen_gejala = 'SMN-003'";
$gejala3 = mysqli_query($koneksi, $gejala_smn);

$gejala_omn = "SELECT tb_gejala.ket_gejala, tb_gejala.kd_jen_gejala FROM tb_detail JOIN tb_gejala ON tb_detail.kd_gejala = tb_gejala.kd_gejala JOIN tb_jenis_gejala ON tb_gejala.kd_jen_gejala = tb_jenis_gejala.kd_jen_gejala WHERE tb_detail.id_pasien = '$nopasien' AND tb_jenis_gejala.kd_jen_gejala = 'OMN-004'";
$gejala4 = mysqli_query($koneksi, $gejala_omn);

$diagnosa = "SELECT tb_diagnosa.definisi FROM tb_detail JOIN tb_diagnosa ON tb_detail.kd_diagnosa = tb_diagnosa.kd_diagnosa WHERE tb_detail.id_pasien = '$nopasien'";
$diagnosa1 = mysqli_query($koneksi, $diagnosa);
foreach ($diagnosa1 as $diagnosa_tampil) {

    $diagnosa12 = $diagnosa_tampil['definisi'];
}

$penyebab = "SELECT tb_penyebab.ket_penyebab FROM tb_detail JOIN tb_penyebab ON tb_detail.kd_penyebab = tb_penyebab.kd_penyebab WHERE tb_detail.id_pasien = '$nopasien'";
$penyebab1 = mysqli_query($koneksi, $penyebab);
foreach ($penyebab1 as $penyebab_tampil) {
    $penyebab12 = $penyebab_tampil['ket_penyebab'];
}

$pdf = new FPDF('P', 'mm', 'A4');

$pdf->AddPage();

$pdf->SetFont('Times', 'B', 16);
$pdf->Cell(0, 7, 'ANALISA DATA KEPERAWATAN', 0, 1, 'C');
$pdf->Cell(10, 7, '', 0, 1);

$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(30, 6, 'NO DMK', 1, 0, 'L');
$pdf->SetFont('Times', '', 10);
$pdf->Cell(0, 6, $nodmkpas, 1, 1);

$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(30, 6, 'NAMA PASIEN', 1, 0, 'L');
$pdf->SetFont('Times', '', 10);
$pdf->Cell(0, 6, $namapas, 1, 1);

$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(30, 6, 'JENIS KELAMIN', 1, 0, 'L');
$pdf->SetFont('Times', '', 10);
$pdf->Cell(0, 6, $jk, 1, 1);

$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(30, 6, 'ALAMAT', 1, 0, 'L');
$pdf->SetFont('Times', '', 10);
$pdf->Cell(0, 6, $alamat, 1, 1);

$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(30, 6, 'DX MED', 1, 0, 'L');
$pdf->SetFont('Times', '', 10);
$pdf->Cell(0, 6, $dx, 1, 1);

$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(30, 6, 'KELUHAN', 1, 0, 'L');
$pdf->SetFont('Times', '', 10);
$pdf->Cell(0, 6, $keluhan, 1, 1);

$pdf->Cell(0, 10, '', 0, 1);

// Gejala
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(0, 6, 'DATA', 1, 1, 'C');

$pdf->Cell(0, 8, '', 0, 1);

$pdf->Cell(0, 6, 'DATA MAYOR', 0, 1);
$pdf->Cell(0, 6, 'SUBJEKTIF', 0, 1);

$pdf->SetFont('Times', '', 10);
foreach ($gejala1 as $gejla_tampil1) {
    $pdf->Cell(100, 6, $gejla_tampil1['ket_gejala'], 0, 1);
}
$pdf->Cell(0, 5, '', 0, 1);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(0, 6, 'OBJEKTIF', 0, 1);
$pdf->SetFont('Times', '', 10);
foreach ($gejala2 as $gejla_tampil2) {
    $pdf->Cell(100, 6, $gejla_tampil2['ket_gejala'], 0, 1);
}

$pdf->Cell(0, 10, '', 0, 1);

$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(0, 6, 'DATA MINOR', 0, 1);
$pdf->Cell(0, 6, 'SUBJEKTIF', 0, 1);

$pdf->SetFont('Times', '', 10);
foreach ($gejala3 as $gejla_tampil3) {
    $pdf->Cell(100, 6, $gejla_tampil3['ket_gejala'], 0, 1);
}

$pdf->Cell(0, 5, '', 0, 1);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(0, 6, 'OBJEKTIF', 0, 1);
$pdf->SetFont('Times', '', 10);
foreach ($gejala4 as $gejla_tampil4) {
    $pdf->Cell(100, 6, $gejla_tampil4['ket_gejala'], 0, 1);
}

$pdf->Cell(0, 10, '', 0, 1);

// Diagnosa dan Penyebab
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(7, 6, 'NO', 1, 0, 'C');
$pdf->Cell(75, 6, 'MASALAH', 1, 0, 'C');
$pdf->Cell(0, 6, 'PENYEBAB', 1, 1, 'C');
$pdf->SetFont('Times', '', 10);
$nod = 1;
$pdf->Cell(7, 6, $nod++, 0, 0);
$pdf->Cell(75, 6, $diagnosa12, 0, 0);
$pdf->MultiCell(0, 6, $penyebab12, 0, 1);

$pdf->Cell(0, 10, '', 0, 1);
// diagnosa
$nodi = 1;
$pdf->Cell(7, 6, $nodi++, 0, 0);
$pdf->Cell(73, 6, $diagnosa12, 0, 0);
$pdf->Cell(15, 6, 'b.d', 0, 0);
$pdf->MultiCell(0, 6, $penyebab12, 0, 1);

$pdf->Output();
