<?php
$pdf = new FPDF("L", "cm", "F4");

$pdf->SetMargins(2, 1, 1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
// $pdf->Image('assets/img/aplikasi/logo.png', 2.5, 0.5, 3, 2.5);
$pdf->SetX(8);


$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 11);
$pdf->MultiCell(31, 0.7, "DATA TAMU", 0, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(31, 0.7, '' . $ket . '', 0, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(5, 0.6, "Di cetak pada : " . date("d/m/Y"), 0, 0, 'C');
$pdf->ln(1);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'ID TAMU', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'NAMA', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'NO HP', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'ALAMAT', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'NO KTP', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'KD KAMAR', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'KD PAKET', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'KD FASILITAS', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'TGL CHEKIN', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'TGL CHEKOUT', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'SALDO', 1, 0, 'C');

$pdf->ln();

if (!empty($tb_tamu)) {
    $no = 1;
    foreach ($tb_tamu as $data) {
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(1, 0.6, $no++, 1, 0, 'C');
        $pdf->Cell(2, 0.6, $data->id_tamu, 1, 0, 'C');
        $pdf->Cell(3, 0.6, $data->nama, 1, 0, 'C');
        $pdf->Cell(2.5, 0.6, $data->no_hp, 1, 0, 'C');
        $pdf->Cell(3, 0.6, $data->alamat, 1, 0, 'C');
        $pdf->Cell(3, 0.6, $data->no_ktp, 1, 0, 'C');
        $pdf->Cell(2, 0.6, $data->kd_kamar, 1, 0, 'C');
        $pdf->Cell(2.5, 0.6, $data->kd_paket, 1, 0, 'C');
        $pdf->Cell(2.5, 0.6, $data->kd_fasilitas, 1, 0, 'C');
        $pdf->Cell(3, 0.6, $data->tgl_chekin, 1, 0, 'C');
        $pdf->Cell(3, 0.6, $data->tgl_chekout, 1, 0, 'C');
        $pdf->Cell(3, 0.6, 'Rp. ' . number_format($data->total_harga, 0, ',', '.'), 1, 0, 'C');
        $pdf->ln();
    }
    // var_dump($data);
    // die;
}

$pdf->Output("Laporan Semua Tamu Dengan Nama.pdf", "I");
