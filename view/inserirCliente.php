<?php
#iniciar_sessao
session_start();

#função para resolver problema de header
ob_start();

#define codificação
header('Content-Type: text/html; charset=UTF-8');

#inclui o arquivo da classe de controle
include_once '../control/controlCliente.class.php';

#cria o objeto de controle
$cc = new ControlCliente();


if (isset($_POST["inserir"])) {
    #passa os dados para inserir
    $cc->inserir($_POST);
    #redirecionar
    header("location: ../view/consultarCliente.php");
}
?>
<html>
    <head>
        <title>Listar de Cliente</title>
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
        <div class="container">
            <div class="container-fluid">
                <div class="row-fluid">
                    <fieldset>
                        <legend>Inserir Cliente</legend>
                        <form class="form-horizontal" id="form1" name="form1" method="post" action="inserirCliente.php">
                            <div class="control-group">
                                <label class="control-label" for="NO_CLIENTE">Nome:</label>
                                <div class="controls">
                                    <input class="span6" name="NO_CLIENTE" type="text" id="NO_CLIENTE" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="DS_ENDERECO">Endereço:</label>
                                <div class="controls">
                                    <input class="span6" name="DS_ENDERECO" type="text" id="DS_ENDERECO" size="30" maxlength="150" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="DS_EMAIL">E-mail:</label>
                                <div class="controls">
                                    <input class="span6" name="DS_EMAIL" type="text" id="DS_EMAIL" size="30" maxlength="150" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="DT_CADASTRO">Data do Cadastro:</label>
                                <div class="controls">
                                    <input class="span6" name="DT_CADASTRO" type="date" id="DT_CADASTRO" size="30" maxlength="150" />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="NU_TELEFONE">Telefone:</label>
                                <div class="controls inline">
                                    <span id="divTel">
                                        <input class="span6" name="telefone[nu_telefone][]" type="text"/>
                                        <select name="telefone[cod_tipo_telefone][]">
                                        <option>Selecionar... </option>>
                                        <option value="1">Telefone Residencial </option>
                                        <option value="2">Telefone Comercial </option>
                                        <option value="3">Telefone Recado </option>
                                        </select>
                                    </span>
                                    <a id="botao" class="botao btn"> <i class="icon-plus"></i></a>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" name="inserir" class="btn btn-primary"> Cadastrar</i></button>
                               </div>
                           </div>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function (){
            $('.botao').on('click',function (){
                $('#divTel').append(
                    '<input class="span6" name="telefone[nu_telefone][]" type="text"/>'+
                    '<select name="telefone[cod_tipo_telefone][]">'+
                        '<option>Selecionar... </option>>'+
                        '<option value="1">Telefone Residencial </option>'+
                        '<option value="2">Telefone Comercial </option>'+
                        '<option value="3">Telefone Recado </option>'+
                    '</select>'
                );
            });
        });
    </script>
</html>











