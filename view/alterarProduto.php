<?php
#iniciar_sessao
session_start();

#função para resolver problema de header
ob_start();

#define codificação
header('Content-Type: text/html; charset=UTF-8');

#inclui o arquivo da classe de controle
include_once '../control/controlProduto.class.php';

#cria o objeto de controle
$cc = new ControlProduto();

#invoca o metodo para trazer o cliente
$produtos = $cc->consultar($_GET["COD_PRODUTO"], null);

if (isset($_POST["alterar"])) {
    #passa o id e nome para consultar
    $cc->alterar($_POST["COD_PRODUTO"],$_POST["DS_PRODUTO"], $_POST["NU_COD_BARRAS"], $_POST["NU_QTDE_PRODUTO"], $_POST["TIPO_PRODUTO"], $_POST["VALOR_PRODUTO"], $_POST["DT_FABRICACAO"], $_POST["DT_VALIDADE"], $_POST["DT_CADASTRO"] );
    #mostrar dados do cliente selecionado
    $produtos = $cc->consultar($_POST["COD_PRODUTO"]);
}
?>


<html>
    <head>
        <title>Alterar Produtos</title>
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
        foreach ($produtos as $item) {
            ?>
            
            <div id="container-geral">
            <div class="container" id="content">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div>
                            <fieldset>
                            <legend>Alterar Produto</legend>
                            <form id="produto" name="produto" method="post" action="alterarProduto.php">
                                    <div class="control-group">
                                        <label class="control-label" for="COD_PRODUTO">Código:</label>
                                        <div class="controls">
                                            <input class="span6" name="COD_PRODUTO" readonly="true" id="COD_PRODUTO" value="<?php echo $item["COD_PRODUTO"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="DS_PRODUTO">Descrição do Produto:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_PRODUTO" type="text" id="DS_PRODUTO" value="<?php echo $item["DS_PRODUTO"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="NU_COD_BARRAS">Código de Barras:</label>
                                        <div class="controls">
                                            <input class="span6" name="NU_COD_BARRAS" type="text" value="<?php echo $item["NU_COD_BARRAS"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="NU_QTDE_PRODUTO">Quantidade:</label>
                                        <div class="controls">
                                            <input class="span6" name="NU_QTDE_PRODUTO" type="text" id="NU_QTDE_PRODUTO" value="<?php echo $item["NU_QTDE_PRODUTO"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="TIPO_PRODUTO">Tipo do Produto:</label>
                                        <div class="controls">
                                            <input class="span6" name="TIPO_PRODUTO" type="text" id="TIPO_PRODUTO" value="<?php echo $item["TIPO_PRODUTO"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="VALOR_PRODUTO">Valor:</label>
                                        <div class="controls">
                                            <input class="span6" name="VALOR_PRODUTO" type="text" id="VALOR_PRODUTO" value="<?php echo $item["VALOR_PRODUTO"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="DT_FABRICACAO">Data de Fabricação:</label>
                                        <div class="controls">
                                            <input class="span6" name="DT_FABRICACAO" type="date" id="DT_FABRICACAO" value="<?php echo $item["DT_FABRICACAO"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="DT_VALIDADE">Data de Validade:</label>
                                        <div class="controls">
                                            <input class="span6" name="DT_VALIDADE" type="date" id="DT_VALIDADE" value="<?php echo $item["DT_VALIDADE"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="DT_CADASTRO">Data do Cadastro:</label>
                                        <div class="controls">
                                            <input class="span6" name="DT_CADASTRO" type="date" id="DT_CADASTRO" value="<?php echo $item["DT_CADASTRO"]; ?>" />
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

            
            