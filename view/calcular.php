<HTML>
<HEAD>
<TITTLE></TITTLE>
</HEAD>
<BODY>

<p>
  <?

$_DS_PRODUTO = $_POST["DS_PRODUTO"]; 
$_QTD_PRODUTO = $_POST["QTD_PRODUTO"];
$_VALOR_PRODUTO = $_POST["VALOR_PRODUTO"]; 
$_VALOR_TOTAL = $_VALOR_PRODUTO * $_QTD_PRODUTO; 
$_VALOR_RECEBIDO = $_POST["VALOR_RECEBIDO"]; 
$_VALOR_TROCO = $_VALOR_TOTAL - $_VALOR_RECEBIDO;  
  
  

echo "Nome do Produto - " . $_DS_PRODUTO;
echo "<BR><BR>";

echo "Valor do produto R$ - " . $_VALOR_PRODUTO;
echo "<BR><BR>";

echo "Quantidade comprada - " . $_QTD_PRODUTO;
echo "<BR><BR>";

echo "Valor Total R$ - " . $_VALOR_TOTAL;
echo "<BR><BR>";

echo "Valor Recebido R$ - " . $_VALOR_RECEBIDO;
echo "<BR><BR>";

echo "Troco R$ - " . $_VALOR_TROCO;
echo "<BR><BR>";



?>
</p>
<p><a href="index.html">Clique aqui para efetuar um novo calculo</a></p>
</BODY>
</HTML>

