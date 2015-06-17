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
    $cc->inserir($_POST["NO_CLIENTE"], $_POST["DS_ENDERECO"], $_POST["DS_EMAIL"], $_POST["DT_CADASTRO"]);
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


        <div id="container-geral">
            <div class="container" id="content">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div>
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
                                    <div class="control-group" id="divTel">
                                        <label class="control-label" for="DS_EMAIL">Telefone:</label>
                                        <div class="controls inline">
                                            <input class="span6" name="DS_EMAIL" type="text" id="DS_EMAIL" size="30" maxlength="150" />
                                            <select> </select>
                                            <input type="button" value="teste" id="botao" />
                                                
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
<script type="text/javascript">
    $(document).ready(function (){
        $('#botao').click(function (){
            $('#form1').append('<div class="control-group">'+
                                       '<div class="controls inline">'+
                                            '<input class="span6" name="DS_EMAIL" type="text" id="DS_EMAIL" size="30" maxlength="150" />'+
                                            '<select> </select>'+
                                            '<input type="button" value="teste" id="botao" />'+
                                        '</div>'+
                                    '</div>')
        });
    });

</script>
    










