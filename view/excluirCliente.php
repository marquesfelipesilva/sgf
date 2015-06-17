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

#invoca o metodo para trazer o cliente
$clientes = $cc->consultar($_GET["COD_CLIENTE"]);

if (isset($_POST["excluir"])) {
    #passa o id e nome para consultar
    $cc->excluir($_POST["COD_CLIENTE"]);
}

?>
<html>
    <head>
        <title>Alterar Cliente</title>
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
        foreach ($clientes as $item) {
            ?>
        
        
        <div id="container-geral">
            <div class="container" id="content">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div>
                            <fieldset>
                                <legend>Excluir Cliente</legend>
                                <form id="cliente" name="cliente" method="post" action="excluirCliente.php">
                                    <div class="control-group">
                                        <label class="control-label" for="COD_CLIENTE">Código:</label>
                                        <div class="controls">
                                            <input class="span6" name="COD_CLIENTE" readonly="true" id="COD_CLIENTE" value="<?php echo $item["COD_CLIENTE"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="NO_CLIENTE">Nome:</label>
                                        <div class="controls">
                                            <input class="span6" name="NO_CLIENTE" type="text" id="QTD_PRODUTO" value="<?php echo $item["NO_CLIENTE"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="DS_ENDERECO">Endereço:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_ENDERECO" type="text" value="<?php echo $item["DS_ENDERECO"]; ?>" />
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
                                            <button type="submit" name="excluir" class="btn btn-primary">Excluir</i></button>
                                            
                                   </div>
                           </div>
                     </form>
            </fieldset>
            <?php } ?>
      </body>
  
</html>



