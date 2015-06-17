<?php

#inclui a classe Modelo Cliente
include_once '../model/modelProduto.class.php';
include_once '../model/modelCategoria.class.php';

#incluir controle geral
include_once 'controlGeral.php';

class ControlProduto extends ControlGeral {

    function comboCategoria(){
        $objCategoria = new modelCategoria();
        return $objCategoria->consultar();
    }
    #consultar
    function consultar($COD_PRODUTO, $DS_PRODUTO) {

        $objProduto = new modelProduto();
        return $listaProduto = $objProduto->consultar($COD_PRODUTO, $DS_PRODUTO);
    }

    #inserir cliente
    function inserir($DS_PRODUTO,$NU_COD_BARRAS,$NU_QTDE_PRODUTO,$TIPO_PRODUTO,$VALOR_PRODUTO,$DT_FABRICACAO,$DT_VALIDADE,$DT_CADASTRO) {

        #invocar métódo  e passar parâmetros
        $objProduto = new modelProduto();

            #se for válido invocar o método de iserir
            if ($objProduto->inserir($DS_PRODUTO,$NU_COD_BARRAS,$NU_QTDE_PRODUTO,$TIPO_PRODUTO,$VALOR_PRODUTO,$DT_FABRICACAO,$DT_VALIDADE,$DT_CADASTRO) == true) {
                #se for inserido com sucesso mostrar a mensagem
                echo $this->alerta("Inserido dom sucesso!");
            }
         else {
            echo $this->alerta("Erro ao inserir!");
        }
    }

    #alterar cliente
    function alterar($COD_PRODUTO,$DS_PRODUTO,$NU_COD_BARRAS,$NU_QTDE_PRODUTO,$TIPO_PRODUTO,$VALOR_PRODUTO,$DT_FABRICACAO,$DT_VALIDADE,$DT_CADASTRO) {

        #invocar métódo  e passar parâmetros
        $objProduto = new modelProduto();
        
        if ($objProduto->alterar($COD_PRODUTO,$DS_PRODUTO,$NU_COD_BARRAS,$NU_QTDE_PRODUTO,$TIPO_PRODUTO,$VALOR_PRODUTO,$DT_FABRICACAO,$DT_VALIDADE,$DT_CADASTRO) == true) {
            #se for alterado com sucesso mostrar a mensagem
            echo $this->alerta("Atualizado sucesso!");
            //header("location: ../view/consultarProduto.php");
        } else {
            echo $this->alerta("Erro ao atualizar");
        }
        header("location: ../view/consultarProduto.php");
    }

    #exluir cliente
    function excluir($COD_PRODUTO) {

        #invocar métódo  e passar parâmetros
        $objProduto = new modelProduto();

        #invocar métódo  e passar parâmetros
        if ($objProduto->excluir($COD_PRODUTO) == true) {
            #se for excluído com sucesso mostrar a mensagem e redirecionar
            echo $this->alerta("Excluído sucesso!");
            header("location: ../view/consultarProduto.php");
        } else {
            echo $this->alerta("Erro ao excluir");
        }
    }
}

