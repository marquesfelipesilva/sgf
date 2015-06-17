<?php
#iniciar_sessao
session_start();

#função para resolver problema de header
ob_start();

#define codificação
header('Content-Type: text/html; charset=UTF-8');

#inclui o arquivo da classe de controle
include_once '../control/controlFornecedor.class.php';

#cria o objeto de controle
$cc = new ControlFornecedor();

#invoca o metodo para trazer o cliente
$fornecedor = $cc->consultar($_GET["COD_FORNECEDORES"], null);

if (isset($_POST["alterar"])) {
    #passa o id e nome para consultar
    $cc->alterar($_POST["COD_FORNECEDORES"],$_POST["NO_FORNECEDOR"], $_POST["NO_FANTASIA"], $_POST["RAZAO_SOCIAL"], $_POST["NU_CNPJ"], $_POST["NO_CIDADE"], $_POST["DS_ENDERECO"], $_POST["DS_COMPLMENTO_END"], $_POST["SIGLA_UF"],$_POST["NU_TELEFONE1"],$_POST["NU_TELEFONE2"],$_POST["NU_TELEFONE3"],$_POST["DS_EMAIL"],$_POST["DS_OBSERVACAO"],$_POST["DT_CADASTRO"] );
    #mostrar dados do cliente selecionado
    $fornecedor = $cc->consultar($_POST["COD_FORNECEDORES"]);
}
?>


<html>
    <head>
        <title>Alterar Fornecedores</title>
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

        #mostrar os dados do FORNECEDOR
        foreach ($fornecedor as $item) {
            ?>
                        <div id="container-geral">
            <div class="container" id="content">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div>
                            <fieldset>
                                <legend>Alterar Fornecedor</legend>
                                <form id="fornecedor" name="fornecedor" method="post" action="alterarFornecedor.php">
                                    <div class="control-group">
                                        <label class="control-label" for="COD_FORNECEDORES">Código:</label>
                                        <div class="controls">
                                            <input class="span6" name="COD_FORNECEDORES" readonly="true" id="COD_FORNECEDORES" value="<?php echo $item["COD_FORNECEDORES"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="NO_FORNECEDOR">Nome:</label>
                                        <div class="controls">
                                            <input class="span6" name="NO_FORNECEDOR" type="text" id="NO_FORNECEDOR" value="<?php echo $item["NO_FORNECEDOR"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="NO_FANTASIA">Nome Fantasia:</label>
                                        <div class="controls">
                                            <input class="span6" name="NO_FANTASIA" type="text" id="NO_FANTASIA" value="<?php echo $item["NO_FANTASIA"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="RAZAO_SOCIAL">Razão Social:</label>
                                        <div class="controls">
                                            <input class="span6" name="RAZAO_SOCIAL" type="text" id="RAZAO_SOCIAL" value="<?php echo $item["RAZAO_SOCIAL"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="NU_CNPJ">CNPJ:</label>
                                        <div class="controls">
                                            <input class="span6" name="NU_CNPJ" type="number" id="NU_CNPJ" value="<?php echo $item["NU_CNPJ"]; ?>" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="NO_CIDADE">Cidade:</label>
                                        <div class="controls">
                                            <input class="span6" name="NO_CIDADE" type="text" id="NO_CIDADE" value="<?php echo $item["NO_CIDADE"]; ?>" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="DS_ENDERECO">Endereço:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_ENDERECO" type="text" id="DS_ENDERECO" value="<?php echo $item["DS_ENDERECO"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="NO_CIDADE">Cidade:</label>
                                        <div class="controls">
                                            <input class="span6" name="NO_CIDADE" type="text" id="NO_CIDADE" value="<?php echo $item["NO_CIDADE"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="DS_COMPLMENTO_END">Complemento Endereço:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_COMPLMENTO_END" type="text" id="DS_COMPLMENTO_END" value="<?php echo $item["DS_COMPLMENTO_END"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="SIGLA_UF">SIGLA Cidade:</label>
                                        <div class="controls">
                                            <input class="span6" name="SIGLA_UF" type="text" id="SIGLA_UF" value="<?php echo $item["SIGLA_UF"]; ?>" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="DS_COMPLMENTO_END">Complemento Endereço:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_COMPLMENTO_END" type="text" id="V" value="<?php echo $item["DS_COMPLMENTO_END"]; ?>" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="NU_TELEFONE1">Telefone Fixo:</label>
                                        <div class="controls">
                                            <input class="span6" name="NU_TELEFONE1" type="text" id="NU_TELEFONE1" value="<?php echo $item["NU_TELEFONE1"]; ?>" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="NU_TELEFONE2">Telefone Móvel:</label>
                                        <div class="controls">
                                            <input class="span6" name="NU_TELEFONE2" type="text" id="NU_TELEFONE2" value="<?php echo $item["NU_TELEFONE2"]; ?>" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="NU_TELEFONE3">Telefone Recado:</label>
                                        <div class="controls">
                                            <input class="span6" name="NU_TELEFONE3" type="text" id="NU_TELEFONE3" value="<?php echo $item["NU_TELEFONE3"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="DS_EMAIL">E-mail:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_EMAIL" type="text" id="DS_EMAIL" value="<?php echo $item["DS_EMAIL"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="DS_OBSERVACAO">Telefone Recado:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_OBSERVACAO" type="text" id="DS_OBSERVACAO" value="<?php echo $item["DS_OBSERVACAO"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="DT_CADASTRO">Data do Cadastro:</label>
                                        <div class="controls">
                                            <input class="span6" name="DT_CADASTRO" type="text" id="DT_CADASTRO" value="<?php echo $item["DT_CADASTRO"]; ?>" />
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





