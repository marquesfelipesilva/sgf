<?php

#inclui a classe Modelo Cliente
include_once '../model/modelFornecedor.class.php';

#incluir controle geral
include_once 'controlGeral.php';

class ControlFornecedor extends ControlGeral {

    #consultar
    function consultar($COD_FORNECEDORES=null, $NO_FORNECEDOR=null) {

        $objFornecedor = new modelFornecedor();
        return $listaFornecedor = $objFornecedor->consultar($COD_FORNECEDORES, $NO_FORNECEDOR);
    }

    #inserir cliente
    function inserir($NO_FORNECEDOR,$NO_FANTASIA,$RAZAO_SOCIAL,$NU_CNPJ,$NO_CIDADE,$DS_ENDERECO,$DS_COMPLMENTO_END,$SIGLA_UF,$NU_TELEFONE1,$NU_TELEFONE2,$NU_TELEFONE3,$DS_EMAIL,$DS_OBSERVACAO,$DT_CADASTRO) {

        #invocar métódo  e passar parâmetros
        $objFornecedor = new modelFornecedor();

            #se for válido invocar o método de iserir
            if ($objFornecedor->inserir($NO_FORNECEDOR,$NO_FANTASIA,$RAZAO_SOCIAL,$NU_CNPJ,$NO_CIDADE,$DS_ENDERECO,$DS_COMPLMENTO_END,$SIGLA_UF,$NU_TELEFONE1,$NU_TELEFONE2,$NU_TELEFONE3,$DS_EMAIL,$DS_OBSERVACAO,$DT_CADASTRO) == true) {
                #se for inserido com sucesso mostrar a mensagem
                echo $this->alerta("Inserido dom sucesso!",'success');
            }
         else {
            echo $this->alerta("Erro ao inserir!",'error');
        }
    }

    #alterar cliente
    function alterar($COD_FORNECEDORES,$NO_FORNECEDOR,$NO_FANTASIA,$RAZAO_SOCIAL,$NU_CNPJ,$NO_CIDADE,$DS_ENDERECO,$DS_COMPLMENTO_END,$SIGLA_UF,$NU_TELEFONE1,$NU_TELEFONE2,$NU_TELEFONE3,$DS_EMAIL,$DS_OBSERVACAO,$DT_CADASTRO) {

        #invocar métódo  e passar parâmetros
        $objFornecedor = new modelFornecedor();

        if ($objFornecedor->alterar($COD_FORNECEDORES,$NO_FORNECEDOR,$NO_FANTASIA,$RAZAO_SOCIAL,$NU_CNPJ,$NO_CIDADE,$DS_ENDERECO,$DS_COMPLMENTO_END,$SIGLA_UF,$NU_TELEFONE1,$NU_TELEFONE2,$NU_TELEFONE3,$DS_EMAIL,$DS_OBSERVACAO,$DT_CADASTRO) == true) {
            #se for alterado com sucesso mostrar a mensagem
            echo $this->alerta("Atualizado sucesso!",'success');
            header("location: ../view/consultarFornecedor.php");
        } else {
            echo $this->alerta("Erro ao atualizar",'error');
        }
        header("location: ../view/consultarFornecedor.php");
    }

    #exluir cliente
    function excluir($COD_FORNECEDORES) {

        #invocar métódo  e passar parâmetros
        $objFornecedor = new modelFornecedor();

        #invocar métódo  e passar parâmetros
        if ($objFornecedor->excluir($COD_FORNECEDORES) == true) {
            #se for excluído com sucesso mostrar a mensagem e redirecionar
            echo $this->alerta("Excluído sucesso!",'success');
            header("location: ../view/consultarFornecedor.php");
        } else {
            echo $this->alerta("Erro ao excluir",'error');
        }
    }
}

