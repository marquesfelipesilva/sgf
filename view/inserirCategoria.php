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


if (isset($_POST["inserir"])) {
    #passa os dados para inserir
    $cc->inserir($_POST["DS_CATEGORIA"]);
    #redirecionar
    header("location: ../view/consultarCategoria.php");
}
?>
<html>
    <head>
        <title>Listar de Gategoria</title>
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
                        <legend>Inserir Categoria</legend>
                        <form class="form-horizontal" id="categoria" name="categoria" method="post" action="inserirCategoria.php">
                            <div class="control-group">
                                <label class="control-label" for="DS_CATEGORIA">Descrição:</label>
                                <div class="controls">
                                    <input class="span6" name="DS_CATEGORIA" type="text" id="DS_CATEGORIA" />
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
</html>











