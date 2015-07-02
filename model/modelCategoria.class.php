<?php
#inclui arquivo da classe de conexão
include_once '../model/modelConexao.class.php';

class modelCategoria extends modelConexao {

    #atributos
    private $COD_CATEGORIA;
    private $DS_CATEGORIA;
    
    
    public function getCOD_CATEGORIA() {
        return $this->COD_CATEGORIA;
    }

    public function getDS_CATEGORIA() {
        return $this->DS_CATEGORIA;
    }

    public function setCOD_CATEGORIA($COD_CATEGORIA) {
        $this->COD_CATEGORIA = $COD_CATEGORIA;
    }

    public function setDS_CATEGORIA($DS_CATEGORIA) {
        $this->DS_CATEGORIA = $DS_CATEGORIA;
    }

    #metodo para executar uma consulta, recebe como parametro o id e o nome
    public function consultar($COD_CATEGORIA = null, $DS_CATEGORIA = null)
    {
        #setar os valores
        $this->setCOD_CATEGORIA($COD_CATEGORIA);
        $this->setDS_CATEGORIA($DS_CATEGORIA);

        #montar a consultar (whre 1 serve para selecionar todos os registros)
        $sql = 'select * from categoria  where 1 ';

        #verificar se foi passado algum valor de $id
        if ($this->getCOD_CATEGORIA() != null) {
            $sql.= ' and COD_CATEGORIA=' . $this->getCOD_CATEGORIA();
        }

        #verificar se foi passado algum valor de $nome
        if ($this->getDS_CATEGORIA() != null) {
            $sql.= " and DS_CATEGORIA like '%" . $this->getDS_CATEGORIA() . "%'";
        }

        #executa consulta e controi um array com o resultado da consulta
        $result = $this->executarQuery($sql);
        while ($row = mysql_fetch_array($result)) {
            $return[] = $row;
        }
        return $return;
    }

    #método para inserir um cliente
    public function inserir($DS_CATEGORIA) {

        #setar os dados
        $this->setDS_CATEGORIA($DS_CATEGORIA);
        
        #montar a consulta
        $sql = "INSERT INTO categoria (DS_CATEGORIA) VALUES ('" .$this->getDS_CATEGORIA()."')";
        //print_r($sql);die();
        #executa consulta e retorna o resultado para o controle
        if ($this->executarQuery($sql) == 1) {
            return true;
        } else {
            return false;
        }
    }

    #metodo para alterar um cliente
    public function alterar($COD_CATEGORIA = null, $DS_CATEGORIA = null) {

        #setar os dados
        $this->setCOD_CATEGORIA($COD_CATEGORIA);
        $this->setDS_CATEGORIA($DS_CATEGORIA);
        
        #montar a consulta
        $sql = "UPDATE categoria SET DS_CATEGORIA = '" . $this->getDS_CATEGORIA() . "' WHERE COD_CATEGORIA =" . $this->getCOD_CATEGORIA();

        #executa consulta e retorna o resultado para o controle
        if ($this->executarQuery($sql) == 1) {
            return true;
        } else {
            return false;
        }
    }

    #metodo para excluir um cliente
    public function excluir($COD_CATEGORIA) {

        #setar os dados
        $this->setCOD_CATEGORIA($COD_CATEGORIA);

        #montar a consulta
        $sql = "DELETE FROM categoria WHERE COD_CATEGORIA=" . $this->getCOD_CATEGORIA();

        #executa consulta e retorna o resultado para o controle
        if ($this->executarQuery($sql) == 1) {
            return true;
        } else {
            return false;
        }
    }
}
