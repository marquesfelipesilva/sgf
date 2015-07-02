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


if (isset($_POST["inserir"])) {
    #passa os dados para inserir
    $cc->inserir($_POST["NO_FORNECEDOR"], $_POST["NO_FANTASIA"], $_POST["RAZAO_SOCIAL"], $_POST["NU_CNPJ"], $_POST["NO_CIDADE"], $_POST["DS_ENDERECO"], $_POST["DS_COMPLMENTO_END"], $_POST["SIGLA_UF"], $_POST["NU_TELEFONE1"], $_POST["NU_TELEFONE2"], $_POST["NU_TELEFONE3"], $_POST["DS_EMAIL"], $_POST["DS_OBSERVACAO"], $_POST["DT_CADASTRO"]);
    #redirecionar
    header("location: ../view/consultarFornecedor.php");
}
?>
<html>
    <head>
        <title>Listar de Fornecedores</title>
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
                                <legend>Inserir Fornecedor</legend>
                                <form id="fornecedor" name="fornecedor" method="post" action="inserirFornecedor.php">
                                    <div class="control-group">
                                        <label class="control-label" for="NO_FORNECEDOR">Nome:</label>
                                        <div class="controls">
                                            <input class="span6" name="NO_FORNECEDOR" type="text" id="NO_FORNECEDOR"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="NO_FANTASIA">Nome Fantasia:</label>
                                        <div class="controls">
                                            <input class="span6" name="NO_FANTASIA" type="text" id="NO_FANTASIA" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="RAZAO_SOCIAL">Razão Social:</label>
                                        <div class="controls">
                                            <input class="span6" name="RAZAO_SOCIAL" type="text" id="RAZAO_SOCIAL"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="NU_CNPJ">CNPJ:</label>
                                        <div class="controls">
                                            <input class="span6" name="NU_CNPJ" type="text" id=NU_CNPJ />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="NO_CIDADE">Estado:</label>
                                        <div class="controls">
                                            <select name="NO_CIDADE">
                                            <option value="estado">Selecione o Estado</option> 
                                            <option value="ac">Acre</option> 
                                            <option value="al">Alagoas</option> 
                                            <option value="am">Amazonas</option> 
                                            <option value="ap">Amapá</option> 
                                            <option value="ba">Bahia</option> 
                                            <option value="ce">Ceará</option> 
                                            <option value="df">Distrito Federal</option> 
                                            <option value="es">Espírito Santo</option> 
                                            <option value="go">Goiás</option> 
                                            <option value="ma">Maranhão</option> 
                                            <option value="mt">Mato Grosso</option> 
                                            <option value="ms">Mato Grosso do Sul</option> 
                                            <option value="mg">Minas Gerais</option> 
                                            <option value="pa">Pará</option> 
                                            <option value="pb">Paraíba</option> 
                                            <option value="pr">Paraná</option> 
                                            <option value="pe">Pernambuco</option> 
                                            <option value="pi">Piauí</option> 
                                            <option value="rj">Rio de Janeiro</option> 
                                            <option value="rn">Rio Grande do Norte</option> 
                                            <option value="ro">Rondônia</option> 
                                            <option value="rs">Rio Grande do Sul</option> 
                                            <option value="rr">Roraima</option> 
                                            <option value="sc">Santa Catarina</option> 
                                            <option value="se">Sergipe</option> 
                                            <option value="sp">São Paulo</option> 
                                            <option value="to">Tocantins</option>
                                            </select>
                                            </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="DS_ENDERECO">Endereço:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_ENDERECO" type="text" id="DS_ENDERECO"  />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="DS_COMPLMENTO_END">Complemento Endereço:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_COMPLMENTO_END" type="text" id="DS_COMPLMENTO_END"  />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="SIGLA_UF">Sigla UF:</label>
                                        <div class="controls">
                                            <select name="SIGLA_UF">
                                                <option>Selecione...</option>
                                                <option value="AC">AC</option>
                                                <option value="AL">AL</option>
                                                <option value="AM">AM</option>
                                                <option value="AP">AP</option>
                                                <option value="BA">BA</option>
                                                <option value="CE">CE</option>
                                                <option value="DF">DF</option>
                                                <option value="ES">ES</option>
                                                <option value="GO">GO</option>
                                                <option value="MA">MA</option>
                                                <option value="MG">MG</option>
                                                <option value="MS">MS</option>
                                                <option value="MT">MT</option>
                                                <option value="PA">PA</option>
                                                <option value="PB">PB</option>
                                                <option value="PE">PE</option>
                                                <option value="PI">PI</option>
                                                <option value="PR">PR</option>
                                                <option value="RJ">RJ</option>
                                                <option value="RN">RN</option>
                                                <option value="RO">RO</option>
                                                <option value="RR">RR</option>
                                                <option value="RS">RS</option>
                                                <option value="SC">SC</option>
                                                <option value="SE">SE</option>
                                                <option value="SP">SP</option>
                                                <option value="TO">TO</option>
                                            </select>
                                            </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="NU_TELEFONE1">Telefone Fixo:</label>
                                        <div class="controls">
                                            <input class="span6" name="NU_TELEFONE1" type="text" id="NU_TELEFONE1" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="NU_TELEFONE2">Telefone Móvel:</label>
                                        <div class="controls">
                                            <input class="span6" name="NU_TELEFONE2" type="text" id="NU_TELEFONE2" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="NU_TELEFONE3">Telefone Recado:</label>
                                        <div class="controls">
                                            <input class="span6" name="NU_TELEFONE3" type="text" id="NU_TELEFONE3" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="DS_EMAIL">E-mail:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_EMAIL" type="text" id="DS_EMAIL" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="DS_OBSERVACAO">Observação:</label>
                                        <div class="controls">
                                            <input class="span6" name="DS_OBSERVACAO" type="text" id="DS_OBSERVACAO"  />
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


