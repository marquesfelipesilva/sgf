<?php
#iniciar_sessao
session_start();

#função para resolver problema de header
ob_start();

#define codificação
header('Content-Type: text/html; charset=UTF-8');

#inclui o arquivo da classe de controle
include_once '../control/controlFornecedor.class.php';

#cria o objeto de controle
$cc = new ControlFornecedor();


#verfica o o botão 'consultar' foi acionado
if (isset($_POST["consultar"])) {
    #passa o id e nome para consultar
    $fornecedor = $cc->consultar($_POST["COD_FORNECEDORES"], $_POST["NO_FORNECEDOR"]);
} else {
    #mostrar todos os clientes
    $fornecedor = $cc->consultar(null, null);
}
?>

<html>
    <head>
        <title>Lista de Forneedores</title>
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
                                <legend>Consulta Fornecedor</legend>
                                <form class="form-horizontal" id="fornecedor" name="fornecedor" method="post" action="consultarFornecedor.php">
                                    <div class="control-group">
                                        <label class="control-label" for="COD_FORNECEDORES">Código:</label>
                                        <div class="controls">
                                            <input class="span6" name="COD_FORNECEDORES" type="text" id="COD_FORNECEDORES" size="10" maxlength="10" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="NO_FORNECEDOR">Nome:</label>
                                        <div class="controls">
                                            <input class="span6" name="NO_FORNECEDOR" type="text" id="NO_FORNECEDOR" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="consultar" class="btn btn-primary"> Pesquisar</i></button>
                                            <a class="btn" href="inserirFornecedor.php">Cadastrar</a>
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
                                    <td width="200"><b>Nome Fantasia</b></td>
                                    <td width="180"><b>Razão Social</b></td>
                                    <td width="180"><b>CNPJ</b></td>
                                    <td width="180"><b>Estado</b></td>
                                    <td width="180"><b>Endereço</b></td>
                                    <td width="180"><b>Complemento</b></td>
                                    <td width="180"><b>Sigla do Estado</b></td>
                                    <td width="180"><b>Telefone</b></td>
                                    <td width="180"><b>Telefone Mòvel</b></td>
                                    <td width="180"><b>Telefone Recado</b></td>
                                    <td width="180"><b>E-mail</b></td>
                                    <td width="180"><b>Observação</b></td>
                                    <td width="180"><b>Data de Cadastro</b></td>
                                    <td>Ação</td>
                                    </thead>
                                    <tbody>
                                        <?php
                                        #lista os dados
                                        foreach ($fornecedor as $item) {
                                            echo '<tr>';
                                            echo '<td>' . $item['COD_FORNECEDORES'] . '</td>';
                                            echo '<td>' . $item['NO_FORNECEDOR'] . '</td>';
                                            echo '<td>' . $item['NO_FANTASIA'] . '</td>';
                                            echo '<td>' . $item['RAZAO_SOCIAL'] . '</td>';
                                            echo '<td>' . $item['NU_CNPJ'] . '</td>';
                                            echo '<td>' . $item['NO_CIDADE'] . '</td>';
                                            echo '<td>' . $item['DS_ENDERECO'] . '</td>';
                                            echo '<td>' . $item['DS_COMPLMENTO_END'] . '</td>';
                                            echo '<td>' . $item['SIGLA_UF'] . '</td>';
                                            echo '<td>' . $item['NU_TELEFONE1'] . '</td>';
                                            echo '<td>' . $item['NU_TELEFONE2'] . '</td>';
                                            echo '<td>' . $item['NU_TELEFONE3'] . '</td>';
                                            echo '<td>' . $item['DS_EMAIL'] . '</td>';
                                            echo '<td>' . $item['DS_OBSERVACAO'] . '</td>';
                                            echo '<td>' . $cc->data($item['DT_CADASTRO']) . '</td>';
                                            echo '<td>
                                            <a class="icon-pencil" href="alterarFornecedor.php?COD_FORNECEDORES=' . $item['COD_FORNECEDORES'] . '" />
                                            <a class="icon-trash" href="excluirFornecedor.php?id=' . $item['COD_FORNECEDORES'] . '" />
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


