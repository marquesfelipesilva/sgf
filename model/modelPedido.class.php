<?php

#inclui arquivo da classe de conexão
include_once '../model/modelConexao.class.php';

class modelPedido extends modelConexao {

    #atributos
    private $COD_PEDIDO;
    private $COD_PRODUTO;
    private $COD_FORNECEDORES;
    private $QTD_PRODUTO;
    
    public function getCOD_PEDIDO() {
        return $this->COD_PEDIDO;
    }

    public function getCOD_PRODUTO() {
        return $this->COD_PRODUTO;
    }

    public function getCOD_FORNECEDORES() {
        return $this->COD_FORNECEDORES;
    }

    public function getQTD_PRODUTO() {
        return $this->QTD_PRODUTO;
    }

    public function setCOD_PEDIDO($COD_PEDIDO) {
        $this->COD_PEDIDO = $COD_PEDIDO;
    }

    public function setCOD_PRODUTO($COD_PRODUTO) {
        $this->COD_PRODUTO = $COD_PRODUTO;
    }

    public function setCOD_FORNECEDORES($COD_FORNECEDORES) {
        $this->COD_FORNECEDORES = $COD_FORNECEDORES;
    }

    public function setQTD_PRODUTO($QTD_PRODUTO) {
        $this->QTD_PRODUTO = $QTD_PRODUTO;
    }

        #metodo para executar uma consulta, recebe como parametro o id e o nome
    public function consultar($COD_PEDIDO = null, $COD_PRODUTO=null, $COD_FORNECEDORES=null, $QTD_PRODUTO=null) {

        #setar os valores
        $this->setCOD_PEDIDO($COD_PEDIDO);
        $this->setCOD_PRODUTO($COD_PRODUTO);
        $this->setCOD_FORNECEDORES($COD_FORNECEDORES);
        $this->setQTD_PRODUTO($QTD_PRODUTO);
        

        #montar a consultar (whre 1 serve para selecionar todos os registros)
        $sql = 'select * from pedido p join produto pd on p.COD_PRODUTO = pd.COD_PRODUTO join fornecedores f on p.COD_FORNECEDORES = f.COD_FORNECEDORES ';

        #verificar se foi passado algum valor de $id
        if ($this->getCOD_PEDIDO() != null) {
            $sql.= ' and COD_PEDIDO=' . $this->getCOD_PEDIDO();
        }

        #verificar se foi passado algum valor de $nome
        if ($this->getQTD_PRODUTO() != null) {
            $sql.= " and QTD_PRODUTO like '%" . $this->getQTD_PRODUTO() . "%'";
        }
        #executa consulta e controi um array com o resultado da consulta
        $result = $this->executarQuery($sql);
        $return = array();
        while ($row = mysql_fetch_array($result)) {
            $return[] = $row;
        }
        return $return;
    }

    #método para inserir um cliente
    public function inserir($COD_PRODUTO, $COD_FORNECEDORES, $QTD_PRODUTO) {

        #setar os dados
        
        $this->setCOD_PRODUTO($COD_PRODUTO);
        $this->setCOD_FORNECEDORES($COD_FORNECEDORES);
        $this->setQTD_PRODUTO($QTD_PRODUTO);
        
        #montar a consulta
        $sql = "INSERT INTO pedido (COD_PRODUTO, COD_FORNECEDORES, QTD_PRODUTO) VALUES (" . $this->getCOD_PRODUTO() ."," . $this->getCOD_FORNECEDORES() ."," . $this->getQTD_PRODUTO() . ")";

     
        #executa consulta e retorna o resultado para o controle
        if ($this->executarQuery($sql) == 1) {
            return true;
        } else {
            return false;
        }
    }

    #metodo para alterar um cliente
    public function alterar($QTD_PRODUTO) {

        #setar os dados
        $this->setQTD_PRODUTO($QTD_PRODUTO);
        #montar a consulta
        $sql = "UPDATE pedido SET QTD_PRODUTO = '" . $this->getQTD_PRODUTO() . " WHERE COD_PEDIDO =" . $this->getCOD_PEDIDO();

        #executa consulta e retorna o resultado para o controle
        if ($this->executarQuery($sql) == 1) {
            return true;
        } else {
            return false;
        }
    }

    #metodo para excluir um cliente
    public function excluir($COD_PEDIDO, $COD_PRODUTO, $COD_FORNECEDORES) {

        #setar os dados
        $this->setCOD_PEDIDO($COD_PEDIDO);
        $this->setCOD_PEDIDO($COD_PRODUTO);
        $this->setCOD_PEDIDO($COD_FORNECEDORES);
 
        #montar a consulta
        $sql = "DELETE FROM pedido WHERE COD_PEDIDO=" . $this->getCOD_PEDIDO(). "AND COD_PRODUTO=". $this->getCOD_PRODUTO(). "AND COD_FORNECEDORES =". $this->getCOD_FORNECEDORES();

        #executa consulta e retorna o resultado para o controle
        if ($this->executarQuery($sql) == 1) {
            return true;
        } else {
            return false;
        }
    }
}


