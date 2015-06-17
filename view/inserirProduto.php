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


if (isset($_POST["inserir"])) {
    #passa os dados para inserir
    $cc->inserir($_POST["DS_PRODUTO"], $_POST["NU_COD_BARRAS"], $_POST["NU_QTDE_PRODUTO"], $_POST["TIPO_PRODUTO"], $_POST["VALOR_PRODUTO"], $_POST["DT_FABRICACAO"], $_POST["DT_VALIDADE"], $_POST["DT_CADASTRO"] );
    #redirecionar
    header("location: ../view/consultarProduto.php");
}
?>
<html>
    <head>
        <title>Lista de Produtos</title>
        <!-- Bootstrap -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <meta charset="UTF-8">
    </head>
    <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <body>

        <?php
        #mostrar o menu
        $cc->menu()
        ?>

                <div id="container-geral">
            <div class="container" id="content">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div>
                            <fieldset>
                                <legend>Inserir Produto</legend>
                                <form id="produto" name="produto" method="post" action="inserirProduto.php">
                                    <div class="control-group">
                                        <label class="control-label" for="DS_PRODUTO">Descrição do Produto:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_PRODUTO" type="text" id="DS_PRODUTO" size="10" maxlength="10" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="NU_COD_BARRAS">Código de Barras:</label>
                                        <div class="controls">
                                            <input class="span6" name="NU_COD_BARRAS" type="number" id="NU_COD_BARRAS" size="30" maxlength="150" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="NU_QTDE_PRODUTO">Quantidade:</label>
                                        <div class="controls">
                                            <input class="span6" name="NU_QTDE_PRODUTO" type="number" id="NU_QTDE_PRODUTO" size="30" maxlength="150" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="TIPO_PRODUTO">Tipo:</label>
                                        <div class="controls">
                                            <input class="span6" name="TIPO_PRODUTO" type="text" id="TIPO_PRODUTO" size="30" maxlength="150" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="VALOR_PRODUTO">Valor:</label>
                                        <div class="controls">
                                            <input class="span6" name="VALOR_PRODUTO" type="text" id="VALOR_PRODUTO" size="30" maxlength="150" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="DT_FABRICACAO">Data de Fabricação:</label>
                                        <div class="controls">
                                            <input class="span6" name="DT_FABRICACAO" type="date" id="DT_FABRICACAO" size="30" maxlength="150" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="DT_VALIDADE">Data de Validade:</label>
                                        <div class="controls">
                                            <input class="span6" name="DT_VALIDADE" type="date" id="DT_VALIDADE" size="30" maxlength="150" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="DT_CADASTRO">Data do Cadastro:</label>
                                        <div class="controls">
                                            <input class="span6" name="DT_CADASTRO" type="text" id="DT_CADASTRO" size="30" maxlength="150" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="inserir" class="btn btn-primary"> Cadastrar</i></button>

                                   </div>
                           </div>
                     </form>
            </fieldset>
      </body>

</html>


