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

$gejala = "SELECT tb_gejala.ket_gejala FROM tb_detail JOIN tb_gejala ON tb_detail.kd_gejala = tb_gejala.kd_gejala WHERE tb_detail.id_pasien = '$nopasien'";
$gejala1 = mysqli_query($koneksi, $gejala);

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
$pdf->Cell(7, 6, 'NO', 1, 0, 'C');
$pdf->Cell(0, 6, 'GEJALA', 1, 1, 'C');
$pdf->SetFont('Times', '', 10);
$no = 1;
foreach ($gejala1 as $gejla_tampil) {
    $pdf->Cell(7, 6, $no++, 1, 0);
    $pdf->Cell(0, 6, $gejla_tampil['ket_gejala'], 1, 1);
}

$pdf->Cell(0, 10, '', 0, 1);

// Diagnosa dan Penyebab
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(7, 6, 'NO', 1, 0, 'C');
$pdf->Cell(91.5, 6, 'DIAGNOSA', 1, 0, 'C');
$pdf->Cell(91.5, 6, 'PENYEBAB', 1, 1, 'C');
$pdf->SetFont('Times', '', 10);
$nod = 1;
$pdf->Cell(7, 6, $nod++, 1, 0);
$pdf->Cell(91.5, 6, $diagnosa12, 1, 0);
$pdf->Cell(91.5, 6, $penyebab12, 1, 1);

// Penyebab
// $pdf->SetFont('Times', 'B', 10);

// $pdf->SetFont('Times', '', 10);
// $nop = 1;
// $pdf->Cell(5, 6, $nop++, 1, 0);


$pdf->Output();
