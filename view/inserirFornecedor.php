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


if (isset($_POST["inserir"])) {
    #passa os dados para inserir
    $cc->inserir($_POST["COD_FORNECEDORES"],$_POST["NO_FORNECEDOR"], $_POST["NO_FANTASIA"], $_POST["RAZAO_SOCIAL"], $_POST["NU_CNPJ"], $_POST["NO_CIDADE"], $_POST["DS_ENDERECO"], $_POST["DS_COMPLMENTO_END"], $_POST["SIGLA_UF"],$_POST["NU_TELEFONE1"],$_POST["NU_TELEFONE2"],$_POST["NU_TELEFONE3"],$_POST["DS_EMAIL"],$_POST["DS_OBSERVACAO"],$_POST["DT_CADASTRO"] );
    #redirecionar
    header("location: ../view/consultarFornecedor.php");
}
?>
<html>
    <head>
        <title>Listar de Fornecedores</title>
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
                                <legend>Inserir Fornecedor</legend>
                                <form id="fornecedor" name="fornecedor" method="post" action="inserirFornecedor.php">
                                    <div class="control-group">
                                        <label class="control-label" for="NO_FORNECEDOR">Nome:</label>
                                        <div class="controls">
                                            <input class="span6" name="NO_FORNECEDOR" type="text" id="NO_FORNECEDOR"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="NO_FANTASIA">Nome Fantasia:</label>
                                        <div class="controls">
                                            <input class="span6" name="NO_FANTASIA" type="text" id="NO_FANTASIA" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="RAZAO_SOCIAL">Razão Social:</label>
                                        <div class="controls">
                                            <input class="span6" name="RAZAO_SOCIAL" type="text" id="RAZAO_SOCIAL"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="NU_CNPJ">CNPJ:</label>
                                        <div class="controls">
                                            <input class="span6" name="NU_CNPJ" type="text" id=NU_CNPJ />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="NO_CIDADE">Cidade:</label>
                                        <div class="controls">
                                            <input class="span6" name="NO_CIDADE" type="text" id="NO_CIDADE"  />
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="DS_ENDERECO">Endereço:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_ENDERECO" type="text" id="DS_ENDERECO"  />
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="DS_COMPLMENTO_END">Complemento Endereço:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_COMPLMENTO_END" type="text" id="DS_COMPLMENTO_END"  />
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="SIGLA_UF">Sigla da Cidade:</label>
                                        <div class="controls">
                                            <input class="span6" name="SIGLA_UF" type="text" id="SIGLA_UF" size="2" />
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="NU_TELEFONE1">Telefone Fixo:</label>
                                        <div class="controls">
                                            <input class="span6" name="NU_TELEFONE1" type="text" id="NU_TELEFONE1" />
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="NU_TELEFONE2">Telefone Móvel:</label>
                                        <div class="controls">
                                            <input class="span6" name="NU_TELEFONE2" type="text" id="NU_TELEFONE2" />
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="NU_TELEFONE3">Telefone Recado:</label>
                                        <div class="controls">
                                            <input class="span6" name="NU_TELEFONE3" type="text" id="NU_TELEFONE3" />
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="DS_EMAIL">E-mail:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_EMAIL" type="text" id="DS_EMAIL" />
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="DS_OBSERVACAO">Observação:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_OBSERVACAO" type="text" id="DS_OBSERVACAO"  />
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="DT_CADASTRO">Data do Cadastro:</label>
                                        <div class="controls">
                                            <input class="span6" name="DT_CADASTRO" type="date" id="DT_CADASTRO" />
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

        
