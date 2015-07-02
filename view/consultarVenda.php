<?php
#iniciar_sessao
session_start();

#função para resolver problema de header
ob_start();

#define codificação
header('Content-Type: text/html; charset=UTF-8');

#inclui o arquivo da classe de controle
include_once '../control/controlVenda.class.php';

#cria o objeto de controle
$cc = new ControlVenda();


#verfica o o botão 'consultar' foi acionado
if (isset($_POST["consultar"])) {
    #passa o id e nome para consultar
    $venda = $cc->consultar($_POST["COD_VENDA"], $_POST["DS_PRODUTO"]);

} else {
    #mostrar todos os clientes
    $venda = $cc->consultar(null, null);
}
?>
<html>
    <head>
        <title>Lista de Vendas</title>
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
                                <legend>Consulta Vendas</legend>
                                <form class="form-horizontal" id="form1" name="form1" method="post" action="consultarVenda.php">
                                    <div class="control-group">
                                        <label class="control-label" for="COD_VENDA">Código:</label>
                                        <div class="controls">
                                            <input class="span6" name="COD_VENDA" type="text" id="COD_VENDA" size="10" maxlength="10" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="DS_PRODUTO">Descrição do Produto:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_PRODUTO" type="text" id="DS_PRODUTO" size="30" maxlength="150" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="consultar" class="btn btn-primary"> Pesquisar</i></button>
                                            <a class="btn" href="inserirVenda.php">Efetuar Venda</a>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                            <fieldset>
                                <legend>Resultado da Consulta</legend>
                                <table class="table table-bordered" border="1" cellpadding="0" cellspacing="0">
                                    <thead>
                                    <td width="180"><b>Data do Cadastro</b></td>
                                    <td width="180"><b>Descrição do Produto</b></td>
                                    <td width="180"><b>Quantidade do Produto</b></td>
                                    <td width="180"><b>Valor do Produto</b></td>
                                    <!--<td>Ação</td>-->
                                    </thead>
                                    <tbody>
                                        <?php

                                        #lista os dados
                                        foreach ($venda as $item) {
                                            echo '<tr>';
                                            echo '<td>' . $cc->data($item['DT_CADASTRO']) . '</td>';
                                            echo '<td>' . $item['DS_PRODUTO'] . '</td>';
                                            echo '<td>' . $item['QTD_PRODUTO'] . '</td>';
                                            echo '<td>' . number_format($item['VALOR_PRODUTO'],2,',','.') . '</td>';
                                                //echo '<td>
                                                          //<a class="icon-pencil" href="alterarCliente.php?COD_CLIENTE=' . $item['COD_VENDA'] . '" />
                                                          //<a class="icon-trash" href="excluirCliente.php?id=' . $item['COD_VENDA'] . '" />
                                                          //</td>';
                                            //echo '</tr>';
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























