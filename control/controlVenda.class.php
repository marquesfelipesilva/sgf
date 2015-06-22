<?php
#inclui a classe Modelo Cliente
include_once '../model/modelVenda.class.php';
include_once '../model/modelProduto.class.php';

#incluir controle geral
include_once 'controlGeral.php';

class ControlVenda extends ControlGeral {

    #consultar
    function consultar($COD_VENDA, $DS_PRODUTO) {

        $objVenda = new modelVenda();
        return $listaVenda = $objVenda->consultar($COD_VENDA, $DS_PRODUTO);
    }

    #inserir cliente
    function inserir($NU_CPF, $NU_CNPJ, $NO_CLIENTE, $VALOR_PRODUTO, $VALOR_TOTAL, $VALOR_RECEBIDO, $VALOR_TROCO, $QTD_PRODUTO, $DS_PRODUTO) {

        #invocar métódo  e passar parâmetros
        $objVenda = new modelVenda();

        #verificar se o cpf é válido
        //if ($this->validaCPF($cpf)) {
            #se for válido invocar o método de iserir
            if ($objVenda->inserir($NU_CPF, $NU_CNPJ, $NO_CLIENTE, $VALOR_PRODUTO, $VALOR_TOTAL, $VALOR_RECEBIDO, $VALOR_TROCO, $QTD_PRODUTO, $DS_PRODUTO) == true) {
                #se for inserido com sucesso mostrar a mensagem
                echo $this->alerta("Inserido dom sucesso!",'success');
            }
        /*}*/ else {
            echo $this->alerta("Erro ao inserir!",'error');
        }
    }



    #exluir cliente
    function excluir($COD_VENDA) {

        #invocar métódo  e passar parâmetros
        $objVenda = new modelVenda();

        #invocar métódo  e passar parâmetros
        if ($objVenda->excluir($COD_VENDA) == true) {
            #se for excluído com sucesso mostrar a mensagem e redirecionar
            header("location: ../view/consultarVenda.php");
            echo $this->alerta("Excluído sucesso!",'success');
        } else {
            echo $this->alerta("Erro ao excluir",'error');
        }
    }

    function comboProduto()
    {
        $objProduto = new modelProduto();

        return $objProduto->consultar(null,null);
    }
}
