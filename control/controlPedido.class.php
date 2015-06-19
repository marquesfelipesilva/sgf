<?php

#inclui a classe Modelo Cliente
include_once '../model/modelPedido.class.php';
include_once '../model/modelProduto.class.php';
include_once '../model/modelFornecedor.class.php';

#incluir controle geral
include_once 'controlGeral.php';

class ControlPedido extends ControlGeral {

    #consultar
    function consultar($COD_PRODUTO = null, $COD_FORNECEDORES = null, $QTD_PRODUTO = NULL) {
        $objPedido = new modelPedido();
        return $listaPedido = $objPedido->consultar($COD_PRODUTO, $COD_FORNECEDORES, $QTD_PRODUTO);
    }

    #inserir cliente
    function inserir($COD_PRODUTO, $COD_FORNECEDORES, $QTD_PRODUTO) {

        #invocar métódo  e passar parâmetros
        $objPedido = new modelPedido();
            #se for válido invocar o método de iserir
            if ($objPedido->inserir($COD_PRODUTO, $COD_FORNECEDORES, $QTD_PRODUTO) == true) {
                #se for inserido com sucesso mostrar a mensagem
                echo $this->alerta("Inserido dom sucesso!",'success');
            }
         else {
            echo $this->alerta("Erro ao inserir!",'error');
        }
    }

    #alterar cliente
    function alterar($QTD_PRODUTO) {

        #invocar métódo  e passar parâmetros
        $objPedido = new modelPedido();

        if ($objPedido->alterar($QTD_PRODUTO) == true) {
            #se for alterado com sucesso mostrar a mensagem
            echo $this->alerta("Atualizado sucesso!",'success');
            //header("location: ../view/consultarPedido.php");
        } else {
            echo $this->alerta("Erro ao atualizar",'error');
        }
        header("location: ../view/consultarPedido.php");
    }

    #exluir cliente
    function excluir($COD_PEDIDO, $COD_PRODUTO, $COD_FORNECEDORES) {

        #invocar métódo  e passar parâmetros
        $objPedido = new modelPedido();

        #invocar métódo  e passar parâmetros
        if ($objPedido->excluir($COD_PEDIDO, $COD_PRODUTO, $COD_FORNECEDORES) == true) {
            #se for excluído com sucesso mostrar a mensagem e redirecionar
            echo $this->alerta("Excluído sucesso!",'success');
            header("location: ../view/consultarPedido.php");
        } else {
            echo $this->alerta("Erro ao excluir",'error');
        }
    }

    function comboProduto()
    {
        $objProduto = new modelProduto();

        return $objProduto->consultar(null,null);
    }

    function comboFornecedor()
    {
        $objFornecedor = new modelFornecedor();

        return $objFornecedor->consultar(null,null);
    }
}

