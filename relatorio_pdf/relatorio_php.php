<?php

define('FPDF_FONTPATH', 'font/');
require ('pdf/fpdf.php');

$objPdf = new FPDF('p', 'cm', 'A4');

$objPdf ->Open();
$objPdf->AddPage();
$objPdf->SetFont('Arial', 'B', 12);

$pdo = new PDO('mysql:host=localhost; dbname=bd_sisfarma','root','');
$sql = $pdo->prepare("SELECT * FROM cliente where 1");
$sql->execute();

foreach ($sql as $resultado){
    
    print_r($sql);    die();
    $pdf->Cell(5, 1, $resultado['COD_CLIENTE'], 1, 0, 'C');
    $pdf->Cell(5, 1, $resultado['NO_CLIENTE'], 1, 0, 'C');
    $pdf->Cell(5, 1, $resultado['DS_ENDERECO'], 1, 0, 'C');
    $pdf->Cell(5, 1, $resultado['DS_EMAIL'], 1, 0, 'C');
    $pdf->Cell(5, 1, $resultado['DT_CADASTRO'], 1, 0, 'C');
}

$pdf->OutPut();
?>