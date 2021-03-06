﻿<?php
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
    function inserir($params = array()) {

        #invocar métódo  e passar parâmetros
        $objCliente = new modelCliente();

        if ($params['telefone']){
            $arrTelefone = array();
            foreach ($params['telefone']['nu_telefone'] as $key => $telefone) {
                $arrTelefone[$key]['nu_telefone'] = $telefone;
                foreach ($params['telefone']['cod_tipo_telefone'] as $chave => $tipoTelefone){
                    $arrTelefone[$chave]['cod_tipo_telefone'] = $tipoTelefone;
                }
            }
        }
        #verificar se o cpf é válido
        //if ($this->validaCPF($cpf)) {
            #se for válido invocar o método de iserir
            if ($objCliente->inserir($params,$arrTelefone) == true) {
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
            echo $this->alerta("Atualizado sucesso!",'success');
            header("location: ../view/consultarCliente.php");
        } else {
            echo $this->alerta("Erro ao atualizar",'error');
        }
        header("location: ../view/consultarCliente.php");
    }

    #exluir cliente
    function excluir($COD_CLIENTE = null, $COD_TELEFONE = null, $COD_TIPO_TELEFONE = null) {

        #invocar métódo  e passar parâmetros
        $objCliente = new modelCliente();

        #invocar métódo  e passar parâmetros
        if ($objCliente->excluir($COD_CLIENTE = null, $COD_TELEFONE = null, $COD_TIPO_TELEFONE = null) == true) {
            #se for excluído com sucesso mostrar a mensagem e redirecionar
            header("location: ../view/consultarCliente.php");
            echo $this->alerta("Excluído sucesso!",'success');
        } else {
            echo $this->alerta("Erro ao excluir",'error');
        }
    }
}
