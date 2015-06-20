<?php
#inclui arquivo da classe de conexão
include_once '../model/modelConexao.class.php';

class modelCliente extends modelConexao {

    #atributos
    private $COD_CLIENTE;
    private $NO_CLIENTE;
    private $DS_ENDERECO;
    private $DS_EMAIL;
    private $DT_CADASTRO;

    public function getCOD_CLIENTE() {
        return $this->COD_CLIENTE;
    }

    public function getNO_CLIENTE() {
        return $this->NO_CLIENTE;
    }

    public function getDS_ENDERECO() {
        return $this->DS_ENDERECO;
    }

    public function getDS_EMAIL() {
        return $this->DS_EMAIL;
    }


    public function getDT_CADASTRO() {
        return $this->DT_CADASTRO;
    }

    public function setCOD_CLIENTE($COD_CLIENTE) {
        $this->COD_CLIENTE = $COD_CLIENTE;
    }

    public function setNO_CLIENTE($NO_CLIENTE) {
        $this->NO_CLIENTE = $NO_CLIENTE;
    }

    public function setDS_ENDERECO($DS_ENDERECO) {
        $this->DS_ENDERECO = $DS_ENDERECO;
    }

    public function setDS_EMAIL($DS_EMAIL) {
        $this->DS_EMAIL = $DS_EMAIL;
    }


    public function setDT_CADASTRO($DT_CADASTRO) {
        $this->DT_CADASTRO = $DT_CADASTRO;
    }


        #metodo para executar uma consulta, recebe como parametro o id e o nome
    public function consultar($COD_CLIENTE = null, $NO_CLIENTE = null)
    {
        #setar os valores
        $this->setCOD_CLIENTE($COD_CLIENTE);
        $this->setNO_CLIENTE($NO_CLIENTE);

        #montar a consultar (whre 1 serve para selecionar todos os registros)
        $sql = 'select * from cliente  where 1 ';

        #verificar se foi passado algum valor de $id
        if ($this->getCOD_CLIENTE() != null) {
            $sql.= ' and COD_CLIENTE=' . $this->getCOD_CLIENTE();
        }

        #verificar se foi passado algum valor de $nome
        if ($this->getNO_CLIENTE() != null) {
            $sql.= " and NO_CLIENTE like '%" . $this->getNO_CLIENTE() . "%'";
        }

        #executa consulta e controi um array com o resultado da consulta
        $result = $this->executarQuery($sql);
        while ($row = mysql_fetch_array($result)) {
            $return[] = $row;
        }
        return $return;
    }

    #método para inserir um cliente
    public function inserir($NO_CLIENTE, $DS_ENDERECO, $DS_EMAIL, $DT_CADASTRO) {

        #setar os dados
        $this->setNO_CLIENTE($NO_CLIENTE);
        $this->setDS_ENDERECO($DS_ENDERECO);
        $this->setDS_EMAIL($DS_EMAIL);
        $this->setDT_CADASTRO($DT_CADASTRO);

        #montar a consulta
        $sql = "INSERT INTO cliente (NO_CLIENTE, DS_ENDERECO, DS_EMAIL, DT_CADASTRO) VALUES ('" . $this->getNO_CLIENTE() . "','" . $this->getDS_ENDERECO() . "','" . $this->getDS_EMAIL() . "','" . $this->getDT_CADASTRO() . "')";

        #executa consulta e retorna o resultado para o controle
        if ($this->executarQuery($sql) == 1) {
            return true;
        } else {
            return false;
        }
    }

    #metodo para alterar um cliente
    public function alterar($COD_CLIENTE, $NO_CLIENTE, $DS_ENDERECO, $DS_EMAIL, $DT_CADASTRO) {

        #setar os dados
        $this->setCOD_CLIENTE($COD_CLIENTE);
        $this->setNO_CLIENTE($NO_CLIENTE);
        $this->setDS_ENDERECO($DS_ENDERECO);
        $this->setDS_EMAIL($DS_EMAIL);
        $this->setDT_CADASTRO($DT_CADASTRO);
        #montar a consulta
        $sql = "UPDATE cliente SET NO_CLIENTE = '" . $this->getNO_CLIENTE() . "', DS_ENDERECO = '" . $this->getDS_ENDERECO() . "', DS_EMAIL = '" . $this->getDS_EMAIL() .  "' WHERE COD_CLIENTE =" . $this->getCOD_CLIENTE();

        #executa consulta e retorna o resultado para o controle
        if ($this->executarQuery($sql) == 1) {
            return true;
        } else {
            return false;
        }
    }

    #metodo para excluir um cliente
    public function excluir($COD_CLIENTE) {

        #setar os dados
        $this->setCOD_CLIENTE($COD_CLIENTE);

        #montar a consulta
        $sql = "DELETE FROM cliente WHERE COD_CLIENTE=" . $this->getCOD_CLIENTE();

        #executa consulta e retorna o resultado para o controle
        if ($this->executarQuery($sql) == 1) {
            return true;
        } else {
            return false;
        }
    }
}
