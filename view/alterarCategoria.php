<?php
#iniciar_sessao
session_start();

#função para resolver problema de header
ob_start();

#define codificação
header('Content-Type: text/html; charset=UTF-8');

#inclui o arquivo da classe de controle
include_once '../control/controlCategoria.class.php';

#cria o objeto de controle
$cc = new ControlCategoria();

#invoca o metodo para trazer o cliente
$categoria = $cc->consultar($_GET["COD_CATEGORIA"] = null);

if (isset($_POST["alterar"])) {
    #passa o id e nome para consultar
    $cc->alterar($_POST["COD_CATEGORIA"], $_POST["DS_CATEGORIA"], $_POST["NO_LABORATORIO"]);
    #mostrar dados do cliente selecionado
    $clientes = $cc->consultar($_POST["COD_CATEGORIA"]);
}
?>


<html>
    <head>
        <title>Alterar de Categoria</title>
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
        foreach ($categoria as $item) {
            ?>
        
            <div id="container-geral">
            <div class="container" id="content">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div>
                            <fieldset>
                                  <legend>Alterar Categoria</legend>
                                  <form id="cliente" name="categoria" method="post" action="alterarCategoria.php">

                                    <div class="control-group">
                                        <label class="control-label" for="COD_CATEGORIA">Código:</label>
                                        <div class="controls">
                                            <input class="span6" name="COD_CATEGORIA" readonly="" id="COD_CATEGORIA" value="<?php echo $item["COD_CATEGORIA"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="DS_CATEGORIA">Descrição:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_CATEGORIA" type="text" id="DS_CATEGORIA" value="<?php echo $item["DS_CATEGORIA"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="NO_LABORATORIO">Laboratório:</label>
                                        <div class="controls">
                                            <input class="span6" name="NO_LABORATORIO" type="text" value="<?php echo $item["NO_LABORATORIO"]; ?>" />
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



        