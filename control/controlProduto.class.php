<?php

#inclui a classe Modelo Cliente
include_once '../model/modelProduto.class.php';
include_once '../model/modelCategoria.class.php';

#incluir controle geral
include_once 'controlGeral.php';

class ControlProduto extends ControlGeral {


    #consultar
    function consultar($COD_PRODUTO = null, $DS_PRODUTO = null) {

        $objProduto = new modelProduto();
        return $listaProduto = $objProduto->consultar($COD_PRODUTO  = null, $DS_PRODUTO  = null);
    }

    #inserir cliente
    function inserir($COD_CATEGORIA,$DS_PRODUTO,$NU_COD_BARRAS,$NU_QTDE_PRODUTO,$TIPO_PRODUTO,$VALOR_PRODUTO,$DT_FABRICACAO,$DT_VALIDADE,$DT_CADASTRO) {

        #invocar métódo  e passar parâmetros
        $objProduto = new modelProduto();

            #se for válido invocar o método de iserir
            if ($objProduto->inserir($COD_CATEGORIA,$DS_PRODUTO,$NU_COD_BARRAS,$NU_QTDE_PRODUTO,$TIPO_PRODUTO,$VALOR_PRODUTO,$DT_FABRICACAO,$DT_VALIDADE,$DT_CADASTRO) == true) {
                #se for inserido com sucesso mostrar a mensagem
                echo $this->alerta("Inserido dom sucesso!",'success');
            }
         else {
            echo $this->alerta("Erro ao inserir!",'error');
        }
    }

    #alterar cliente
    function alterar($COD_PRODUTO,$COD_CATEGORIA,$DS_PRODUTO,$NU_COD_BARRAS,$NU_QTDE_PRODUTO,$TIPO_PRODUTO,$VALOR_PRODUTO,$DT_FABRICACAO,$DT_VALIDADE,$DT_CADASTRO) {

        #invocar métódo  e passar parâmetros
        $objProduto = new modelProduto();

        if ($objProduto->alterar($COD_PRODUTO,$COD_CATEGORIA,$DS_PRODUTO,$NU_COD_BARRAS,$NU_QTDE_PRODUTO,$TIPO_PRODUTO,$VALOR_PRODUTO,$DT_FABRICACAO,$DT_VALIDADE,$DT_CADASTRO) == true) {
            #se for alterado com sucesso mostrar a mensagem
            echo $this->alerta("Atualizado sucesso!",'success');
            //header("location: ../view/consultarProduto.php");
        } else {
            echo $this->alerta("Erro ao atualizar",'error');
        }
        header("location: ../view/consultarProduto.php");
    }

    #exluir cliente
    function excluir($COD_PRODUTO,$COD_CATEGORIA) {

        #invocar métódo  e passar parâmetros
        $objProduto = new modelProduto();

        #invocar métódo  e passar parâmetros
        if ($objProduto->excluir($COD_PRODUTO,$COD_CATEGORIA) == true) {
            #se for excluído com sucesso mostrar a mensagem e redirecionar
            echo $this->alerta("Excluído sucesso!",'success');
            header("location: ../view/consultarProduto.php");
        } else {
            echo $this->alerta("Erro ao excluir",'error');
        }
    }
    
    function comboCategoria()
    {
        $objCategoria = new modelCategoria();

        return $objCategoria->consultar(null);
    }


}

