<?php
#iniciar_sessao
session_start();

#função para resolver problema de header
ob_start();

#define codificação
header('Content-Type: text/html; charset=UTF-8');

#inclui o arquivo da classe de controle
include_once '../control/controlPedido.class.php';

#cria o objeto de controle
$cc = new ControlPedido();
$produtos = $cc->comboProduto();
$fornecedores = $cc->comboFornecedor();

#invoca o metodo para trazer o cliente
$pedido = $cc->consultar($_GET["COD_PEDIDO"], null);

if (isset($_POST["alterar"])) {
    #passa o id e nome para consultar
    $cc->alterar($_POST["COD_PRODUTO"],$_POST["COD_FORNECEDOR"],$_POST["QTD_PRODUTO"]);
    #mostrar dados do cliente selecionado
    $pedido = $cc->consultar($_POST["COD_PEDIDO"]);
}
?>


<html>
    <head>
        <title>Alterar de Pedido</title>
        <!-- Bootstrap -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <meta charset="UTF-8">
    </head>
    <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <body>

        <?php
        #mostrar o menu
        $cc->menu();

        #mostrar os dados do cliente
        foreach ($pedido as $item) {
            ?>

            <div id="container-geral">
                <div class="container" id="content">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div>
                                <fieldset>
                                    <legend>Alterar Pedido</legend>
                                    <form id="pedido" name="pedido" method="post" action="alterarPedido.php">
                                        <div class="control-group">
                                            <label class="control-label" for="COD_PEDIDO">Código Pedido:</label>
                                            <div class="controls">
                                                <input class="span6" name="COD_PEDIDO" readonly="true" id="COD_PEDIDO" value="<?php echo $item["COD_PEDIDO"]; ?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                        <label class="control-label" for="DS_PRODUTO">Produto:</label>
                                        <div class="controls">
                                            <select name="COD_PRODUTO">
                                                <option>Selecione...</option>
                                                <?php foreach ($produtos as $prod):?>
                                                    <option value="<?php echo $prod['COD_PRODUTO'] ?>"><?php echo $prod['DS_PRODUTO'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                        <div class="control-group">
                                            <label class="control-label" for="NO_FANTASIA">Fornecedor:</label>
                                            <div class="controls">
                                                <select name="COD_FORNECEDORES">
                                                    <option>Selecione...</option>
                                                    <?php foreach ($fornecedores as $fornecedor): ?>
                                                        <option value="<?php echo $fornecedor['COD_FORNECEDORES'] ?>"><?php echo $fornecedor['NO_FANTASIA'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="QTD_PRODUTO">Quantidade:</label>
                                            <div class="controls">
                                                <input class="span6" name="QTD_PRODUTO" type="number" id="QTD_PRODUTO" value="<?php echo $item["QTD_PRODUTO"]; ?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="alterar" class="btn btn-primary">Alterar</i></button>

                                            </div>
                                        </div>
                                    </form>
                                </fieldset>
                            <?php } ?>
                            </body>

                            </html>





