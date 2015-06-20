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

#invoca o metodo para trazer o cliente
$pedido = $cc->consultar($_GET["COD_PEDIDO"]=null);

if (isset($_POST["excluir"])) {
#passa o id e nome para consultar
$cc->excluir($_POST["COD_PEDIDO"]);
}
?>
<html>
    <head>
        <title>Alterar Pedido</title>
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
                                <legend>Excluir Pedido</legend>
                                <form id="pedido" name="pedido" method="post" action="excluirPedido.php">
                                    <div class="control-group">
                                        <label class="control-label" for="COD_PEDIDO">Código Pedido:</label>
                                        <div class="controls">
                                            <input class="span6" name="COD_PEDIDO" readonly="true" id="COD_PEDIDO" value="<?php echo $item["COD_PEDIDO"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="COD_PRODUTO">Código Produto:</label>
                                        <div class="controls">
                                            <input class="span6" name="COD_PRODUTO" readonly="true" id="COD_PRODUTO" value="<?php echo $item["COD_PRODUTO"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="COD_FORNECEDORES">Código Fornecedor:</label>
                                        <div class="controls">
                                            <input class="span6" name="COD_FORNECEDORES" readonly="true" id="COD_FORNECEDORES" value="<?php echo $item["COD_FORNECEDORES"]; ?>" />
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="COD_PRODUTO">Nome:</label>
                                        <div class="controls">
                                            <input class="span6" name="COD_PRODUTO" type="text" id="COD_PRODUTO" value="<?php echo $item["COD_PRODUTO"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="DS_PRODUTO">Descrição do Produto:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_PRODUTO" type="text" value="<?php echo $item["DS_PRODUTO"]; ?>" />
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
                                            <button type="submit" name="excluir" class="btn btn-primary">Excluir</i></button>

                                        </div>
                                    </div>
                                </form>
                      </fieldset>
               <?php } ?>
      </body>

</html>

