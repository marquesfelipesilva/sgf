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
$clientes = $cc->consultar($_GET["COD_CLIENTE"], null);

if (isset($_POST["alterar"])) {
    #passa o id e nome para consultar
    $cc->alterar($_POST["COD_CLIENTE"], $_POST["NO_CLIENTE"], $_POST["DS_ENDERECO"], $_POST["DS_EMAIL"],$_POST["NU_TELEFONE"], $_POST["DT_CADASTRO"]);
    #mostrar dados do cliente selecionado
    $clientes = $cc->consultar($_POST["COD_CLIENTE"]);
}
?>


<html>
    <head>
        <title>Alterar de Cliente</title>
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
                                  <legend>Alterar Cliente</legend>
                                   <form id="cliente" name="cliente" method="post" action="alterarCliente.php">

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
                                        <label class="control-label" for="DS_EMAIL">E-mail:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_EMAIL" type="text" value="<?php echo $item["DS_EMAIL"]; ?>" />
                                        </div>
                                    </div>
                                       
                                       <div class="control-group">
                                <label class="control-label" for="NU_TELEFONE">Telefone:</label>
                                <div class="controls inline">
                                    <span id="divTel">
                                        <input class="span6" name="telefone[nu_telefone][]" type="text" id="NU_TELEFONE" value="<?php echo $item["NU_TELEFONE"]; ?>"/>
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



        