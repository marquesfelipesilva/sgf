<?php
#inclui a classe Modelo Cliente teste commit
include_once '../model/modelCategoria.class.php';

#incluir controle geral
include_once 'controlGeral.php';

class ControlCategoria extends ControlGeral {

    #consultar
    function consultar($COD_CATEGORIA = null, $DS_CATEGORIA = null) {

        $objCategoria = new modelCategoria(null,null);
        return $listaCategoria = $objCategoria->consultar($COD_CATEGORIA = null, $DS_CATEGORIA = null);
    }

    #inserir cliente
    function inserir($DS_CATEGORIA = null, $NO_LABORATORIO = null) {

        #invocar métódo  e passar parâmetros
        $objCategoria = new modelCategoria();

        #verificar se o cpf é válido
        //if ($this->validaCPF($cpf)) {
            #se for válido invocar o método de iserir
            if ($objCategoria->inserir($DS_CATEGORIA, $NO_LABORATORIO) == true) {
                #se for inserido com sucesso mostrar a mensagem
                echo $this->alerta("Inserido com sucesso!",'success');
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
            echo $this->alerta("Atualizado sucesso!",'success');
            header("location: ../view/consultarCategoria.php");
        } else {
            echo $this->alerta("Erro ao atualizar",'error');
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
            echo $this->alerta("Excluído sucesso!",'success');
        } else {
            echo $this->alerta("Erro ao excluir",'error');
        }
    }
}
