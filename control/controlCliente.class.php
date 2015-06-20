<?php
#inclui a classe Modelo Cliente teste commit
include_once '../model/modelCliente.class.php';

#incluir controle geral
include_once 'controlGeral.php';

class ControlCliente extends ControlGeral {

    #consultar
    function consultar($COD_CLIENTE = null, $NO_CLIENTE = null) {

        $objCliente = new modelCliente();
        return $listaCliente = $objCliente->consultar($COD_CLIENTE = null, $NO_CLIENTE = null);
    }

    #inserir cliente
    function inserir($NO_CLIENTE = null, $DS_ENDERECO = null, $DS_EMAIL = null, $DT_CADASTRO = null) {

        #invocar métódo  e passar parâmetros
        $objCliente = new modelCliente();

        #verificar se o cpf é válido
        //if ($this->validaCPF($cpf)) {
            #se for válido invocar o método de iserir
            if ($objCliente->inserir($NO_CLIENTE, $DS_ENDERECO, $DS_EMAIL, $DT_CADASTRO) == true) {
                #se for inserido com sucesso mostrar a mensagem
                echo $this->alerta("Inserido dom sucesso!",'success');
            }
        /*}*/ else {
            echo $this->alerta("Erro ao inserir!",'error');
        }
    }

    #alterar cliente
    function alterar($COD_CLIENTE, $NO_CLIENTE, $DS_ENDERECO, $DS_EMAIL, $DT_CADASTRO) {

        #invocar métódo  e passar parâmetros
        $objCliente = new modelCliente();

        if ($objCliente->alterar($COD_CLIENTE, $NO_CLIENTE, $DS_ENDERECO, $DS_EMAIL, $DT_CADASTRO) == true) {
            #se for alterado com sucesso mostrar a mensagem
            echo $this->alerta("Atualizado sucesso!");
            header("location: ../view/consultarCliente.php");
        } else {
            echo $this->alerta("Erro ao atualizar");
        }
        header("location: ../view/consultarCliente.php");
    }

    #exluir cliente
    function excluir($COD_CLIENTE) {

        #invocar métódo  e passar parâmetros
        $objCliente = new modelCliente();

        #invocar métódo  e passar parâmetros
        if ($objCliente->excluir($COD_CLIENTE) == true) {
            #se for excluído com sucesso mostrar a mensagem e redirecionar
            header("location: ../view/consultarCliente.php");
            echo $this->alerta("Excluído sucesso!");
        } else {
            echo $this->alerta("Erro ao excluir");
        }
    }
}
