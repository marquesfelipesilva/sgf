<?php

#iniciar_sessao
session_start();

#função para resolver problema de header
ob_start();

#define codificação
header('Content-Type: text/html; charset=UTF-8');

#inclui o arquivo da classe de controle
include_once '../control/controlProduto.class.php';

#cria o objeto de controle
$cc = new ControlProduto();


#verfica o o botão 'consultar' foi acionado
if (isset($_POST["consultar"])) {
    #passa o id e nome para consultar
    $produtos = $cc->consultar($_POST["COD_PRODUTO"], $_POST["DS_PRODUTO"]);
} else {
    #mostrar todos os clientes
    $produtos = $cc->consultar(null, null);
}
?>

<html>
    <head>
        <title>Lista de Produtos</title>
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
                                <legend>Consulta Produtos</legend>
                                <form class="form-horizontal" id="produto" name="produto" method="post" action="consultarProduto.php">
                                    <div class="control-group">
                                        <label class="control-label" for="COD_PRODUTO">Código:</label>
                                        <div class="controls">
                                            <input class="span6" name="COD_PRODUTO" type="text" id="COD_PRODUTO" size="10" maxlength="10" />
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
                                            <a class="btn" href="inserirProduto.php">Cadastrar</a>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                            <fieldset>
                                <legend>Resultado da Consulta</legend>
                                <table class="table table-bordered" border="1" cellpadding="0" cellspacing="0">
                                    <thead>
                                    <td width="200"><b>Código do Produto</b></td>
                                    <td width="200"><b>Código da Categoria</b></td>
                                    <td width="200"><b>Descrição do Produto</b></td>
                                    <td width="200"><b>Código de Barras</b></td>
                                    <td width="180"><b>Quantidade do Produto</b></td>
                                    <td width="180"><b>Tipo do Produto</b></td>
                                    <td width="180"><b>Valor do Produto</b></td>
                                    <td width="180"><b>Data de Fabricação</b></td>
                                    <td width="180"><b>Data de Validade</b></td>
                                    <td width="180"><b>Data de Cadastro</b></td>
                                    <!--<td width="200">Ação</td>-->
                                    <td>Ação</td>
                                    </thead>
                                    <tbody>
                                        <?php
                                        #lista os dados
                                        foreach ($produtos as $item) {
                                                echo '<tr>';
                                        echo '<td>' . $item['COD_PRODUTO'] . '</td>';
                                        echo '<td>' . $item['DS_CATEGORIA'] . '</td>';
                                        echo '<td>' . $item['DS_PRODUTO'] . '</td>';
                                        echo '<td>' . $item['NU_COD_BARRAS'] . '</td>';
                                        echo '<td>' . $item['NU_QTDE_PRODUTO'] . '</td>';
                                        echo '<td>' . $item['TIPO_PRODUTO'] . '</td>';
                                        echo '<td>' . $item['VALOR_PRODUTO'] . '</td>';
                                        echo '<td>' . $cc->data($item['DT_FABRICACAO']) . '</td>';
                                        echo '<td>' . $cc->data($item['DT_VALIDADE']) . '</td>';
                                        echo '<td>' . $cc->data($item['DT_CADASTRO']) . '</td>';
                                        //echo '<td>' . $item[telefone] . '</td>';
                                        echo '<td>
                                                          <a class="icon-pencil" href="alterarProduto.php?COD_PRODUTO=' . $item['COD_PRODUTO'] . '" />
                                                          <a class="icon-trash" href="excluirProduto.php?id=' . $item['COD_PRODUTO'] . '" />
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


