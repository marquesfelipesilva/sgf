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


#verfica o o botão 'consultar' foi acionado
if (isset($_POST["consultar"])) {
    #passa o id e nome para consultar
    $clientes = $cc->consultar($_POST["COD_CATEGORIA"], $_POST["DS_CATEGORIA"]);

} else {
    #mostrar todos os clientes
    $clientes = $cc->consultar(null, null);
}
?>
<html>
    <head>
        <title>Lista de Categorias</title>
        <!-- Bootstrap -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <meta charset="UTF-8">
    </head>
    <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <body>

        <script src="../bootstrap/js/jquery.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>

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
                                <?php if (isset($_SESSION['mensagem'])):
                                        echo $_SESSION['mensagem'];
                                        unset($_SESSION['mensagem']);
                                    endif;
                                ?>
                                <legend>Dados da Consulta</legend>
                                <form class="form-horizontal" id="form1" name="form1" method="post" action="consultarCliente.php">
                                    <div class="control-group">
                                        <label class="control-label" for="COD_CATEGORIA">Código:</label>
                                        <div class="controls">
                                            <input class="span6" name="COD_CATEGORIA" type="text" id="COD_CATEGORIA" size="10" maxlength="10" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="DS_CATEGORIA">Nome:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_CATEGORIA" type="text" id="DS_CATEGORIA" size="30" maxlength="150" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="consultar" class="btn btn-primary"> Pesquisar</i></button>
                                            <a class="btn" href="inserirCategoria.php">Cadastrar</a>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                            <fieldset>
                                <legend>Resultado da Consulta</legend>
                                <table class="table table-bordered" border="1" cellpadding="0" cellspacing="0">
                                    <thead>
                                    <td width="200"><b>Código</b></td>
                                    <td width="200"><b>Descrição</b></td>
                                    <td width="180"><b>Laboratório</b></td>
                                    <td>Ação</td>
                                    </thead>
                                    <tbody>
                                        <?php

                                        #lista os dados
                                        foreach ($clientes as $item) {
                                            echo '<tr>';

                                                echo '<td>' . $item['COD_CATEGORIA'] . '</td>';
                                                echo '<td>' . $item['DS_CATEGORIA'] . '</td>';
                                                echo '<td>' . $item['NO_LABOTORIO'] . '</td>';
                                                //echo '<td>' . $item[telefone] . '</td>';
                                                echo '<td>
                                                          <a class="icon-pencil" href="alterarCategoria.php?COD_CATEGORIA=' . $item['COD_CATEGORIA'] . '" />
                                                          <a class="icon-trash" href="excluirCategoria.php?id=' . $item['COD_CATEGORIA'] . '" />
                                                          </td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div><!-- /.container -->
        </div>
    </body>
</html>
