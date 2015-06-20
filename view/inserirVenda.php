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
$produtos = $cc->comboProduto();





if (isset($_POST["inserir"])) {
    #passa os dados para inserir

    $cc->inserir($_POST["DS_PRODUTO"], $_POST["QTD_PRODUTO"], $_POST["VALOR_PRODUTO"], $_POST["VALOR_TOTAL"], $_POST["VALOR_RECEBIDO"], $_POST["VALOR_TROCO"]);
    #redirecionar
    header("location: ../view/consultarVenda.php");
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
                                <legend>Inserir Venda</legend>
                                <form class="form-horizontal" id="venda" name="venda" method="post" action="inserirVenda.php">
                                    <div class="control-group">
                                        <label class="control-label" for="DS_PRODUTO">Produto:</label>
                                        <div class="controls">
                                            <select name="COD_PRODUTO">
                                                <option>Selecione...</option>
                                                <?php foreach ($produtos as $prod):?>
                                                    <option value="<?php echo $prod['COD_PRODUTO'] ?>"><?php echo $prod['DS_PRODUTO'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="QTD_PRODUTO">Quantidade:</label>
                                        <div class="controls">
                                            <input class="span6" name="QTD_PRODUTO" type="number" id="QTD_PRODUTO" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="VALOR_PRODUTO">Valor do Produto:</label>
                                        <div class="controls">
                                            <input class="span6" name="VALOR_PRODUTO" type="number" id="VALOR_PRODUTO" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="VALOR_TOTAL">Total:</label>
                                        <div class="controls">
                                            <input class="span6" name="VALOR_TOTAL" type="number" id="VALOR_TOTAL"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="VALOR_RECEBIDO">Valor Recebido:</label>
                                        <div class="controls">
                                            <input class="span6" name="VALOR_RECEBIDO" type="number" id="VALOR_RECEBIDO" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="VALOR_TROCO">Valor do Troco:</label>
                                        <div class="controls">
                                            <input class="span6" name="VALOR_TROCO" type="text" id="VALOR_TROCO" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="DT_CADASTRO">Data do Cadastro:</label>
                                        <div class="controls">
                                            <input class="span6" name="DT_CADASTRO" type="date" id="DT_CADASTRO" />
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
   $('#VALOR_PRODUTO').blur(function(){
    $('#VALOR_TOTAL').val($(this).val() * $('#QTD_PRODUTO').val());
});
$('#VALOR_RECEBIDO').blur(function(){
    $('#VALOR_TROCO').val($(this).val() - $('#VALOR_TOTAL').val());
});

});
</script>











