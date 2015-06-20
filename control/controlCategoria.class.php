<?php
#inclui a classe Modelo Cliente teste commit
include_once '../model/modelCategoria.class.php';

#incluir controle geral
include_once 'controlGeral.php';

class ControlCategoria extends ControlGeral {

    #consultar
    function consultar($COD_CATEGORIA, $DS_CATEGORIA) {

        $objCategoria = new modelCategoria();
        return $listaCategoria = $objCategoria->consultar($COD_CATEGORIA, $DS_CATEGORIA);
    }

    #inserir cliente
    function inserir($DS_CATEGORIA, $NO_LABORATORIO) {

        #invocar métódo  e passar parâmetros
        $objCategoria = new modelCategoria();

        #verificar se o cpf é válido
        //if ($this->validaCPF($cpf)) {
            #se for válido invocar o método de iserir
            if ($objCategoria->inserir($DS_CATEGORIA, $NO_LABORATORIO) == true) {
                #se for inserido com sucesso mostrar a mensagem
                echo $this->alerta("Inserido dom sucesso!",'success');
            }
        /*}*/ else {
            echo $this->alerta("Erro ao inserir!",'error');
        }
    }

    #alterar cliente
    function alterar($COD_CATEGORIA, $DS_CATEGORIA, $NO_LABORATORIO) {

        #invocar métódo  e passar parâmetros
        $objCategoria = new modelCategoria();

        if ($objCategoria->alterar($COD_CATEGORIA, $DS_CATEGORIA, $NO_LABORATORIO) == true) {
            #se for alterado com sucesso mostrar a mensagem
            echo $this->alerta("Atualizado sucesso!");
            header("location: ../view/consultarCategoria.php");
        } else {
            echo $this->alerta("Erro ao atualizar");
        }
        header("location: ../view/consultarCategoria.php");
    }

    #exluir cliente
    function excluir($COD_CATEGORIA) {

        #invocar métódo  e passar parâmetros
        $objCategoria = new modelCategoria();

        #invocar métódo  e passar parâmetros
        if ($objCategoria->excluir($COD_CATEGORIA) == true) {
            #se for excluído com sucesso mostrar a mensagem e redirecionar
            header("location: ../view/consultarCategoria.php");
            echo $this->alerta("Excluído sucesso!");
        } else {
            echo $this->alerta("Erro ao excluir");
        }
    }
}
