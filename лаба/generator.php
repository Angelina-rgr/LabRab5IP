<?php
define("FPDF_FONTPATH", "fpdf/font/");
include_once('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->Open();
$pdf->SetTitle("Тестовый документ");
$pdf->SetAuthor('Steven Wittens');
$pdf->AddFont('Arial', '');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 32);
$pdf->Write(12, "Test.\n");
$pdf->Write(12, "Тестовая строка.\n");
$pdf->Close();
$pdf->Output('unicode.pdf', 'F');
?>