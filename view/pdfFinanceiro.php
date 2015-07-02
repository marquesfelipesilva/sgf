<?php 
#iniciar_sessao
session_start();

ob_start();

#inclui o arquivo da classe de controle
include_once '../control/controlVenda.class.php';
include_once '../fpdf/fpdf.php';

$pdf = new FPDF('P', 'cm', 'A4');
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

//$objFinanceiro = new controlReserva();
$objVenda = new modelVenda();

#chama o método para transformar em dados válidos para o banco
//$mesAno = $objVenda->mesAno(null, $_GET["dados"]);

#chama o método para consultar
//$financeiro = $objFinanceiro->consultarFinanceiro($mesAno);
$venda = $objVenda->consultarVenda();

$pdf->Cell(5,1," ",0,0,'L');
$pdf->Cell(5,1," ",0,0,'L');
$pdf->Cell(5,1," ",0,0,'L');
$pdf->Cell(5,1,utf8_decode("SGF"),0,1,'L');

$pdf->Cell(5,1,utf8_decode("Relatório Venda"),0,1,'L');

#campos títulos da tabela
$pdf->Cell(4,1,utf8_decode('COD_VENDA'),1,0,'L');
$pdf->Cell(4,1,'COD_COLABORADOR',1,0,'L');
$pdf->Cell(4.4,1,'DT_CADASTRO',1,0,'L');
$pdf->Cell(4,1,'VALOR_PRODUTO',1,1,'L');
$pdf->Cell(4,1,'VALOR_TOTAL',1,1,'L');
$pdf->Cell(4,1,'VALOR_RECEBIDO',1,1,'L');
$pdf->Cell(4,1,'VALOR_TROCO',1,1,'L');
$pdf->Cell(4,1,'QTD_PRODUTO',1,1,'L');
$pdf->Cell(4,1,'COD_PRODUTO',1,1,'L');

#cria o corpo da tabela
//foreach ($venda as $item) {

    /*if ($item[QTD_PRODUTO] > 1) {
        $data = "--";
    } else {
        $data = $objVenda->mesAno($item[mesAno], null);
    }   

    //$pdf->Cell(4,1,$data,1,0,'L');
    $pdf->Cell(4,1,$item[quantidade],1,0,'L');
    $pdf->Cell(4.4,1,utf8_decode($item[forma_pag]),1,0,'L');
    $pdf->Cell(4,1,$item[total],1,1,'L');
}*/
$pdf->Output();
?>
