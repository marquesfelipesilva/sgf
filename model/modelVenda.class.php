<?php

#inclui arquivo da classe de conexão
include_once '../model/modelConexao.class.php';

class modelVenda extends modelConexao {

    #atributos
    private $COD_VENDA;
    private $COD_COLABORADOR;
    private $DT_CADASTRO;
    private $VALOR_PRODUTO;
    private $VALOR_TOTAL;
    private $VALOR_TROCO;
    private $QTD_PRODUTO;
    private $COD_PRODUTO;

    public function getCOD_VENDA() {
        return $this->COD_VENDA;
    }

    public function getCOD_ESTABELECIMENTO() {
        return $this->COD_ESTABELECIMENTO;
    }

    public function getCOD_COLABORADOR() {
        return $this->COD_COLABORADOR;
    }

    public function getDT_CADASTRO() {
        return $this->DT_CADASTRO;
    }

    public function getVALOR_PRODUTO() {
        return $this->VALOR_PRODUTO;
    }

    public function getVALOR_TOTAL() {
        return $this->VALOR_TOTAL;
    }

    public function getVALOR_TROCO() {
        return $this->VALOR_TROCO;
    }

    public function getQTD_PRODUTO() {
        return $this->QTD_PRODUTO;
    }

    public function getCOD_PRODUTO() {
        return $this->COD_PRODUTO;
    }

    public function setCOD_VENDA($COD_VENDA) {
        $this->COD_VENDA = $COD_VENDA;
    }

    public function setCOD_COLABORADOR($COD_COLABORADOR) {
        $this->COD_COLABORADOR = $COD_COLABORADOR;
    }

    public function setDT_CADASTRO($DT_CADASTRO) {
        $this->DT_CADASTRO = $DT_CADASTRO;
    }

    public function setVALOR_PRODUTO($VALOR_PRODUTO) {
        $this->VALOR_PRODUTO = $VALOR_PRODUTO;
    }

    public function setVALOR_TOTAL($VALOR_TOTAL) {
        $this->VALOR_TOTAL = $VALOR_TOTAL;
    }

    public function setVALOR_TROCO($VALOR_TROCO) {
        $this->VALOR_TROCO = $VALOR_TROCO;
    }

    public function setQTD_PRODUTO($QTD_PRODUTO) {
        $this->QTD_PRODUTO = $QTD_PRODUTO;
    }

    public function setCOD_PRODUTO($DS_PRODUTO) {
        $this->COD_PRODUTO = $DS_PRODUTO;
    }


        #metodo para executar uma consulta, recebe como parametro o id e o nome
    public function consultar($COD_VENDA = null,$COD_COLABORADOR = null,$DS_PRODUTO = null,$QTD_PRODUTO = null)
    {
        #setar os valores
        $this->setCOD_VENDA($COD_VENDA);
        //pega codigo do colaborador logado
        $this->setCOD_COLABORADOR($_SESSION['COD_COLABORADOR']);
        $this->setCOD_PRODUTO($DS_PRODUTO);
        $this->setQTD_PRODUTO($QTD_PRODUTO);

        #montar a consultar (whre 1 serve para selecionar todos os registros)
        $sql = 'select * from vendas v join produto p on v.COD_PRODUTO = p.COD_PRODUTO  where 1 ';

        #verificar se foi passado algum valor de $id
        if ($this->getCOD_VENDA() != null) {
            $sql.= ' and COD_VENDA=' . $this->getCOD_VENDA();
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
    public function inserir($params) {

        #setar os dados
        $this->setCOD_COLABORADOR($_SESSION['COD_COLABORADOR']);
        $this->setVALOR_PRODUTO($params['VALOR_PRODUTO']);
        $this->setVALOR_TOTAL($params['VALOR_TOTAL']);
        $this->setVALOR_TROCO($params['VALOR_TROCO']);
        $this->setQTD_PRODUTO($params['QTD_PRODUTO']);
        $this->setCOD_PRODUTO($params['COD_PRODUTO']);

        #montar a consulta
        $sql = "INSERT INTO vendas (COD_COLABORADOR,VALOR_PRODUTO, VALOR_TOTAL, VALOR_TROCO, QTD_PRODUTO, COD_PRODUTO) VALUES (" . $this->getCOD_COLABORADOR() .",'" . $this->getVALOR_PRODUTO() ."','" . $this->getVALOR_TOTAL() ."','" . $this->getVALOR_TROCO() ."','" . $this->getQTD_PRODUTO() . "',".$this->getCOD_PRODUTO().")";

        #executa consulta e retorna o resultado para o controle
        if ($this->executarQuery($sql) == 1) {
            return true;
        } else {
            return false;
        }
    }

    #metodo para excluir um cliente
    public function excluir($COD_VENDA) {

        #setar os dados
        $this->setCOD_VENDA($COD_VENDA);

        #montar a consulta
        $sql = "DELETE FROM vendas WHERE COD_VENDA=" . $this->getCOD_VENDA();

        #executa consulta e retorna o resultado para o controle
        if ($this->executarQuery($sql) == 1) {
            return true;
        } else {
            return false;
        }
    }
}
