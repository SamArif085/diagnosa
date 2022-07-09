<?php
require '../koneksi/koneksi.php';
require('../fpdf184/fpdf.php');
$nopasien = $_GET['no_dmk_pasien'];

$pasien = ("SELECT * FROM tb_pasien WHERE no_dmk_pasien = '$nopasien'");
$det = mysqli_query($koneksi, $pasien);
// foreach ($det as $nama) {
//     $namapas = $nama['nama_pasien'];
// }
$pdf = new FPDF('P', 'mm','Letter');

$pdf->AddPage();

$pdf->SetFont('Times','B',16);
$pdf->Cell(0,7,'ANALISA DATA KEPERAWATAN',0,1,'C');

$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Times','B',10);

$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(20,6,'NIK',1,0,'C');
$pdf->Cell(50,6,'Nama',1,0,'C');
$pdf->Cell(30,6,'Jenis Kelamin',1,0,'C');
$pdf->Cell(30,6,'Tanggal Lahir',1,0,'C');
$pdf->Cell(30,6,'Jurusan',1,0,'C');
$pdf->Cell(20,6,'Umur',1,1,'C');

$pdf->SetFont('Times','',10);

$no=1;
$jk='';
//Query untuk mengambil data mahasiswa pada tabel mahasiswa
$hasil = mysqli_query($kon, "select * from mahasiswa order by nik asc");
while ($data = mysqli_fetch_array($hasil)){
    if ($data['jk']==1){
        $jk='Lali-laki';
    }else{
        $jk='Perempuan';
    }
    $pdf->Cell(8,6,$no,1,0);
    $pdf->Cell(20,6,$data['nik'],1,0);
    $pdf->Cell(50,6,$data['nama'],1,0);
    $pdf->Cell(30,6,$jk,1,0);
    $pdf->Cell(30,6,$data['tanggal_lhr'],1,0);
    $pdf->Cell(30,6,$data['jurusan'],1,0);
    $pdf->Cell(20,6,$data['umur'],1,1);
    $no++;
}

$pdf->Output();
?>