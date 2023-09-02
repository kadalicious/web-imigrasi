<?php
require('tcpdf/tcpdf/tcpdf.php');
include "server/koneksi.php";

$getidpemeriksaan = $_GET['idpemeriksaan'];

// Ambil data dari MySQL
$query = "SELECT * FROM tblpemeriksaans	WHERE id = '$getidpemeriksaan'";
$result = mysqli_query($koneksi, $query);

while ($row = mysqli_fetch_array($result)) {
	$namalengkap = $row['nama_lengkap'];
	$tgl_lahir = $row['tgl_lahir'];
	$jenis_kelamin = $row['jenis_kelamin'];
	$kewarganegaraan = $row['kewarganegaraan'];
	$tgl_pengeluaran = $row['tgl_pengeluaran'];
	$tgl_habisBerlaku = $row['tgl_habisBerlaku'];
	$kode_negara = $row['kode_negara'];
	$keterangan = $row['keterangan'];
	$tgl_penolakan = $row['tgl_penolakan'];
    
    
}

// Buat objek PDF
$pdf = new TCPDF();
$pdf->AddPage();

// Tambahkan judul tabel
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(0, 10, 'Data atas nama '.$namalengkap.'', 0, 1, 'C');


$pdf->Ln(10); // Spasi antara judul dan tabel

// Tambahkan header tabel
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(40, 10, 'nama lengkap    : '.$namalengkap.'', 0,1,'L');
$pdf->Cell(40, 10, 'tanggal lahir   :'.$tgl_lahir.'',  0,1,'L');
$pdf->Cell(40, 10, 'jenis kelamin   :'.$jenis_kelamin.'',  0,1,'L');
$pdf->Cell(40, 10, 'kewarganegaraan :'.$kewarganegaraan.'',  0,1,'L');
$pdf->Cell(40, 10, 'tgl pengeluaran :'.$tgl_pengeluaran.'',  0,1,'L');
$pdf->Cell(40, 10, 'tgl habisBerlaku:'.$tgl_habisBerlaku.'',  0,1,'L');
$pdf->Cell(40, 10, 'kode negara     :'.$kode_negara.'',  0,1,'L');
$pdf->Cell(40, 10, 'keterangan      :'.$keterangan.'',  0,1,'L');
$pdf->Cell(40, 10, 'tgl penolakan   :'.$tgl_penolakan.'',  0,1,'L');
// Tambahkan kolom lain sesuai kebutuhan

$pdf->Ln(); // Pindah ke baris berikutnya

// Tambahkan data dari MySQL ke dalam tabel
$pdf->SetFont('helvetica', '', 10);



// Outputkan PDF ke browser dengan nama file 'output.pdf'
$pdf->Output('data.pdf', 'D');


?>
