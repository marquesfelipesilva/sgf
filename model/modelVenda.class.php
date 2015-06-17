<?php

#inclui arquivo da classe de conexão
include_once '../model/modelConexao.class.php';

class modelVenda extends modelConexao {

    #atributos
    private $COD_VENDA;
    private $COD_ESTABELECIMENTO;
    private $COD_COLABORADOR;
    private $NU_CPF;
    private $NU_CNPJ;
    private $DT_CADASTRO;
    private $NO_CLIENTE;
    private $VALOR_PRODUTO;
    private $VALOR_TOTAL;
    private $VALOR_TROCO;
    private $QTD_PRODUTO;
    private $DS_PRODUTO;

    public function getCOD_VENDA() {
        return $this->COD_VENDA;
    }

    public function getCOD_ESTABELECIMENTO() {
        return $this->COD_ESTABELECIMENTO;
    }

    public function getCOD_COLABORADOR() {
        return $this->COD_COLABORADOR;
    }

    public function getNU_CPF() {
        return $this->NU_CPF;
    }

    public function getNU_CNPJ() {
        return $this->NU_CNPJ;
    }

    public function getDT_CADASTRO() {
        return $this->DT_CADASTRO;
    }

    public function getNO_CLIENTE() {
        return $this->NO_CLIENTE;
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

    public function getDS_PRODUTO() {
        return $this->DS_PRODUTO;
    }

    public function setCOD_VENDA($COD_VENDA) {
        $this->COD_VENDA = $COD_VENDA;
    }

    public function setCOD_ESTABELECIMENTO($COD_ESTABELECIMENTO) {
        $this->COD_ESTABELECIMENTO = $COD_ESTABELECIMENTO;
    }

    public function setCOD_COLABORADOR($COD_COLABORADOR) {
        $this->COD_COLABORADOR = $COD_COLABORADOR;
    }

    public function setNU_CPF($NU_CPF) {
        $this->NU_CPF = $NU_CPF;
    }

    public function setNU_CNPJ($NU_CNPJ) {
        $this->NU_CNPJ = $NU_CNPJ;
    }

    public function setDT_CADASTRO($DT_CADASTRO) {
        $this->DT_CADASTRO = $DT_CADASTRO;
    }

    public function setNO_CLIENTE($NO_CLIENTE) {
        $this->NO_CLIENTE = $NO_CLIENTE;
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

    public function setDS_PRODUTO($DS_PRODUTO) {
        $this->DS_PRODUTO = $DS_PRODUTO;
    }


        #metodo para executar uma consulta, recebe como parametro o id e o nome
    public function consultar($COD_VENDA, $DS_PRODUTO)
    {
        #setar os valores
        $this->setCOD_VENDA($COD_VENDA);
        $this->setDS_PRODUTO($DS_PRODUTO);

        #montar a consultar (whre 1 serve para selecionar todos os registros)
        $sql = 'select * from vendas  where 1 ';

        #verificar se foi passado algum valor de $id
        if ($this->getCOD_VENDA() != null) {
            $sql.= ' and COD_VENDA=' . $this->getCOD_VENDA();
        }

        #verificar se foi passado algum valor de $nome
        if ($this->getDS_PRODUTO() != null) {
            $sql.= " and DS_PRODUTO like '%" . $this->getDS_PRODUTO() . "%'";
        }

        #executa consulta e controi um array com o resultado da consulta
        $result = $this->executarQuery($sql);
        while ($row = mysql_fetch_array($result)) {
            $return[] = $row;
        }
        return $return;
    }

    #método para inserir um cliente
    public function inserir($NU_CPF, $NU_CNPJ, $NO_CLIENTE, $VALOR_PRODUTO, $VALOR_TOTAL, $VALOR_TROCO, $QTD_PRODUTO, $DS_PRODUTO) {


        #setar os dados
        $this->setNU_CPF($NU_CPF);
        $this->setNU_CNPJ($NU_CNPJ);
        $this->setNO_CLIENTE($NO_CLIENTE);
        $this->setVALOR_PRODUTO($VALOR_PRODUTO);
        $this->setVALOR_TOTAL($VALOR_TOTAL);
        $this->setVALOR_TROCO($VALOR_TROCO);
        $this->setQTD_PRODUTO($QTD_PRODUTO);
        $this->setDS_PRODUTO($DS_PRODUTO);

        #montar a consulta
        $sql = "INSERT INTO vendas (NU_CPF, NU_CNPJ, NO_CLIENTE, VALOR_PRODUTO, VALOR_TOTAL, VALOR_TROCO, QTD_PRODUTO, DS_PRODUTO) VALUES ('" . $this->getNU_CPF() . "','" . $this->getNU_CNPJ() . "','" . $this->getNO_CLIENTE() . "','" . $this->getVALOR_PRODUTO() ."','" . $this->getVALOR_TOTAL() ."','" . $this->getVALOR_TROCO() ."','" . $this->getQTD_PRODUTO() ."','" . $this->getDS_PRODUTO() . "')";

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
