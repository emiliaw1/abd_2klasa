<?php
define('FPDF_FONTPATH', 'fpdf/font/');

require('fpdf/fpdf.php');
$connect = mysqli_connect("localhost", "root", "", "gabinet_stomatologiczny");
$query = "SELECT * FROM uzytkownicy";
$result = mysqli_query($connect, $query);

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->AddFont('arialpl', '', 'arialpl.php');
$pdf->SetFont('arialpl', '', 18);
$pdf->Cell(45, 10, "id", 1, 0, "C");
$pdf->Cell(45, 10, "imie", 1, 0, "C");
$pdf->Cell(45, 10, "nazwisko", 1, 0, "C");
$pdf->Cell(45, 10, "data", 1, 0, "C");
$pdf->Cell(45, 10, "godzina", 1, 0, "C");
$pdf->Cell(45, 10, "telefon", 1, 0, "C");
$pdf->Cell(45, 10, "email", 1, 0, "C");
$pdf->Cell(45, 10, "usluga", 1, 0, "C");
$pdf->Ln();
mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
$rzad = 0;
while ($row = mysqli_fetch_array($result)) {
    if ($rzad == 25) {
        $pdf->AddPage();
        $pdf->Cell(45, 10, "id", 1, 0, "C");
        $pdf->Cell(45, 10, "imie", 1, 0, "C");
        $pdf->Cell(45, 10, "nazwisko", 1, 0, "C");
        $pdf->Cell(45, 10, "data", 1, 0, "C");
        $pdf->Cell(45, 10, "godzina", 1, 0, "C");
        $pdf->Cell(45, 10, "telefon", 1, 0, "C");
        $pdf->Cell(45, 10, "email", 1, 0, "C");
        $pdf->Cell(45, 10, "usluga", 1, 0, "C");
        $pdf->Ln();
        $rzad = 0;
    }
    $pdf->Cell(45, 10, $row["id"], 1, 0, "C");
    $pdf->Cell(45, 10, iconv('utf-8', 'iso-8859-2', $row["imie"]), 1, 0, "C");
    $pdf->Cell(45, 10, iconv('utf-8', 'iso-8859-2', $row["nazwisko"]), 1, 0, "C");
    $pdf->Cell(45, 10, iconv('utf-8', 'iso-8859-2', $row["data"]), 1, 0, "C");
    $pdf->Cell(45, 10, iconv('utf-8', 'iso-8859-2', $row["godzina"]), 1, 0, "C");
    $pdf->Cell(45, 10, iconv('utf-8', 'iso-8859-2', $row["telefon"]), 1, 0, "C");
    $pdf->Cell(45, 10, iconv('utf-8', 'iso-8859-2', $row["email"]), 1, 0, "C");
    $pdf->Cell(45, 10, iconv('utf-8', 'iso-8859-2', $row["usluga"]), 1, 0, "C");
    $pdf->Ln();
    $rzad++;
}
$pdf->Ln();
$pdf->Output();