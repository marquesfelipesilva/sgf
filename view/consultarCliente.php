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


#verfica o o botão 'consultar' foi acionado
if (isset($_POST["consultar"])) {
    #passa o id e nome para consultar
    $clientes = $cc->consultar($_POST["COD_CLIENTE"], $_POST["NO_CLIENTE"]);

} else {
    #mostrar todos os clientes
    $clientes = $cc->consultar(null, null);
}
?>
<html>
    <head>
        <title>Lista de Cliente</title>
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
                                        <label class="control-label" for="COD_CLIENTE">Código:</label>
                                        <div class="controls">
                                            <input class="span6" name="COD_CLIENTE" type="text" id="COD_CLIENTE" size="10" maxlength="10" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="NO_CLIENTE">Nome:</label>
                                        <div class="controls">
                                            <input class="span6" name="NO_CLIENTE" type="text" id="NO_CLIENTE" size="30" maxlength="150" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="consultar" class="btn btn-primary"> Pesquisar</i></button>
                                            <a class="btn" href="inserirCliente.php">Cadastrar</a>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                            <fieldset>
                                <legend>Resultado da Consulta</legend>
                                <table class="table table-bordered" border="1" cellpadding="0" cellspacing="0">
                                    <thead>
                                    <td width="200"><b>Código</b></td>
                                    <td width="200"><b>Nome</b></td>
                                    <td width="180"><b>Endereço</b></td>
                                    <td width="180"><b>Email</b></td>
                                    <td width="180"><b>Data do Cadastro</b></td>
                                    <td>Ação</td>
                                    </thead>
                                    <tbody>
                                        <?php

                                        #lista os dados
                                        foreach ($clientes as $item) {
                                            echo '<tr>';

                                                echo '<td>' . $item['COD_CLIENTE'] . '</td>';
                                                echo '<td>' . $item['NO_CLIENTE'] . '</td>';
                                                echo '<td>' . $item['DS_ENDERECO'] . '</td>';
                                                echo '<td>' . $item['DS_EMAIL'] . '</td>';
                                                echo '<td>' . $cc->data($item['DT_CADASTRO']) . '</td>';
                                                //echo '<td>' . $item[telefone] . '</td>';
                                                echo '<td>
                                                          <a class="icon-pencil" href="alterarCliente.php?COD_CLIENTE=' . $item['COD_CLIENTE'] . '" />
                                                          <a class="icon-trash" href="excluirCliente.php?id=' . $item['COD_CLIENTE'] . '" />
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
