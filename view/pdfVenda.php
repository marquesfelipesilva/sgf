<?php

#iniciar_sessao
session_start();

ob_start();
include_once '../model/modelConexao.class.php';
#inclui o arquivo da classe de controle
include_once '../control/controlVenda.class.php';
define('FPDF_FONTPATH', 'font/') ;
require_once '../fpdf/fpdf.php';



$pdf = new FPDF('L', 'cm', 'A4');
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

$sql = "SELECT * FROM vendas";
$conect = mysql_connect("localhost", "root", "");
if (!$conect)
    die("<h1> Falha na Conexão</h1>");
$db = mysql_select_db("bd_sgf");
$exec_sql = mysql_query($sql) or die(mysql_error());
while ($resultado = mysql_fetch_array($exec_sql)) {
    
    $pdf->Cell(5, 1, 'Cod. Colaborador', 1, 0, 'L');
    $pdf->Cell(2, 1, 'Data', 1, 0, 'L');
    $pdf->Cell(4, 1, 'Valor do Produto', 1, 0, 'L');
    $pdf->Cell(3, 1, 'Valor Total', 1, 0, 'L');
    $pdf->Cell(4, 1, 'Valor Recebido', 1, 0, 'L');
    $pdf->Cell(3, 1, 'Valor Troco', 1, 0, 'L');
    $pdf->Cell(3, 1, 'Quantidade', 1, 0, 'L');
    $pdf->Cell(4, 1, 'Cod. do Produto', 1, 1, 'L');
}

//$objFinanceiro = new controlReserva();
//$objVenda = new ControlVenda();
#chama o método para transformar em dados válidos para o banco
//$mesAno = $objVenda->mesAno(null, $_GET["dados"]);
#chama o método para consultar
//$financeiro = $objFinanceiro->consultarFinanceiro($mesAno);
//$venda = $objVenda->consultarVenda();

/* $pdf->Cell(5,1," ",0,0,'L');
  $pdf->Cell(5,1," ",0,0,'L');
  $pdf->Cell(5,1," ",0,0,'L');
  $pdf->Cell(5,1," ",0,0,'L');
  $pdf->Cell(5,1," ",0,0,'L');
  $pdf->Cell(5,1," ",0,0,'L');
  $pdf->Cell(5,1," ",0,0,'L');
  $pdf->Cell(5,1," ",0,0,'L');
  $pdf->Cell(5,1," ",0,0,'L');
  $pdf->Cell(5,1,utf8_decode("SGF"),0,1,'L'); */

//$pdf->Cell(5,1,utf8_decode("Relatório Venda"),0,1,'L');
#campos títulos da tabela
//$pdf->Cell(4,1,utf8_decode('COD_VENDA'),1,0,'L');
#cria o corpo da tabela
/* foreach ($venda as $item) {

  if ($item[$QTD_PRODUTO] > 1) {
  $data = "--";
  } //else {
  //$data = $objVenda->mesAno($item[mesAno], null);
  //}

  //$pdf->Cell(4,1,$data,1,0,'L');
  $pdf->Cell(4,1,$item[quantidade],1,0,'L');
  $pdf->Cell(4.4,1,utf8_decode($item[forma_pag]),1,0,'L');
  $pdf->Cell(4,1,$item[total],1,1,'L');
  } */
$pdf->Output();
?>
