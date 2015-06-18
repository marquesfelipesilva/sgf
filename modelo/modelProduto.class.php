<?php
#jghjfghfhfhghfhfhfhfhfhh
#inclui arquivo da classe de conexão
include_once '../model/modelConexao.class.php';

class modelProduto extends modelConexao {

    #atributos
    private $COD_PRODUTO;
    private $DS_PRODUTO;
    private $NU_COD_BARRAS;
    private $NU_QTDE_PRODUTO;
    private $TIPO_PRODUTO;
    private $VALOR_PRODUTO;
    private $DT_FABRICACAO;
    private $DT_VALIDADE;
    private $DT_CADASTRO;


    public function getCOD_PRODUTO() {
        return $this->COD_PRODUTO;
    }

    public function getDS_PRODUTO() {
        return $this->DS_PRODUTO;
    }

    public function getNU_COD_BARRAS() {
        return $this->NU_COD_BARRAS;
    }

    public function getNU_QTDE_PRODUTO() {
        return $this->NU_QTDE_PRODUTO;
    }

    public function getTIPO_PRODUTO() {
        return $this->TIPO_PRODUTO;
    }

    public function getVALOR_PRODUTO() {
        return $this->VALOR_PRODUTO;
    }

    public function getDT_FABRICACAO() {
        return $this->DT_FABRICACAO;
    }

    public function getDT_VALIDADE() {
        return $this->DT_VALIDADE;
    }

    public function getDT_CADASTRO() {
        return $this->DT_CADASTRO;
    }

    public function setCOD_PRODUTO($COD_PRODUTO) {
        $this->COD_PRODUTO = $COD_PRODUTO;
    }

    public function setDS_PRODUTO($DS_PRODUTO) {
        $this->DS_PRODUTO = $DS_PRODUTO;
    }

    public function setNU_COD_BARRAS($NU_COD_BARRAS) {
        $this->NU_COD_BARRAS = $NU_COD_BARRAS;
    }

    public function setNU_QTDE_PRODUTO($NU_QTDE_PRODUTO) {
        $this->NU_QTDE_PRODUTO = $NU_QTDE_PRODUTO;
    }

    public function setTIPO_PRODUTO($TIPO_PRODUTO) {
        $this->TIPO_PRODUTO = $TIPO_PRODUTO;
    }

    public function setVALOR_PRODUTO($VALOR_PRODUTO) {
        $this->VALOR_PRODUTO = $VALOR_PRODUTO;
    }

    public function setDT_FABRICACAO($DT_FABRICACAO) {
        $this->DT_FABRICACAO = $DT_FABRICACAO;
    }

    public function setDT_VALIDADE($DT_VALIDADE) {
        $this->DT_VALIDADE = $DT_VALIDADE;
    }

    public function setDT_CADASTRO($DT_CADASTRO) {
        $this->DT_CADASTRO = $DT_CADASTRO;
    }



        #metodo para executar uma consulta, recebe como parametro o id e o nome
    public function consultar($COD_PRODUTO, $DS_PRODUTO) {

        #setar os valores
        $this->setCOD_PRODUTO($COD_PRODUTO);
        $this->setDS_PRODUTO($DS_PRODUTO);

        #montar a consultar (whre 1 serve para selecionar todos os registros)
        $sql = 'select * from produto  where 1 ';

        #verificar se foi passado algum valor de $id
        if ($this->getCOD_PRODUTO() != null) {
            $sql.= ' and COD_PRODUTO=' . $this->getCOD_PRODUTO();
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
    public function inserir($DS_PRODUTO,$NU_COD_BARRAS,$NU_QTDE_PRODUTO,$TIPO_PRODUTO,$VALOR_PRODUTO,$DT_FABRICACAO,$DT_VALIDADE,$DT_CADASTRO) {

        #setar os dados
        $this->setDS_PRODUTO($DS_PRODUTO);
        $this->setNU_COD_BARRAS($NU_COD_BARRAS);
        $this->setNU_QTDE_PRODUTO($NU_QTDE_PRODUTO);
        $this->setTIPO_PRODUTO($TIPO_PRODUTO);
        $this->setVALOR_PRODUTO($VALOR_PRODUTO);
        $this->setDT_FABRICACAO($DT_FABRICACAO);
        $this->setDT_VALIDADE($DT_VALIDADE);
        $this->setDT_CADASTRO($DT_CADASTRO);

        #montar a consulta
        $sql = "INSERT INTO produto (DS_PRODUTO,NU_COD_BARRAS,NU_QTDE_PRODUTO,TIPO_PRODUTO,VALOR_PRODUTO,DT_FABRICACAO,DT_VALIDADE,DT_CADASTRO) VALUES ('" . $this->getDS_PRODUTO() . "','" . $this->getNU_COD_BARRAS() . "','" . $this->getNU_QTDE_PRODUTO() . "','" . $this->getTIPO_PRODUTO() . "','" . $this->getVALOR_PRODUTO() .  "','" . $this->getDT_FABRICACAO() . "','" . $this->getDT_VALIDADE() . "','" . $this->getDT_CADASTRO() ."')";

        #executa consulta e retorna o resultado para o controle
        if ($this->executarQuery($sql) == 1) {
            return true;
        } else {
            return false;
        }
    }

    #metodo para alterar um cliente
    public function alterar($COD_PRODUTO,$DS_PRODUTO,$NU_COD_BARRAS,$NU_QTDE_PRODUTO,$TIPO_PRODUTO,$VALOR_PRODUTO,$DT_FABRICACAO,$DT_VALIDADE,$DT_CADASTRO) {

        #setar os dados
        $this->setCOD_PRODUTO($COD_PRODUTO);
        $this->setDS_PRODUTO($DS_PRODUTO);
        $this->setNU_COD_BARRAS($NU_COD_BARRAS);
        $this->setNU_QTDE_PRODUTO($NU_QTDE_PRODUTO);
        $this->setTIPO_PRODUTO($TIPO_PRODUTO);
        $this->setVALOR_PRODUTO($VALOR_PRODUTO);
        $this->setDT_FABRICACAO($DT_FABRICACAO);
        $this->setDT_VALIDADE($DT_VALIDADE);
        $this->setDT_CADASTRO($DT_CADASTRO);
        #montar a consulta
        $sql = "UPDATE produto SET DS_PRODUTO = '" . $this->getDS_PRODUTO() . "', NU_COD_BARRAS = '" . $this->getNU_COD_BARRAS() . "', NU_QTDE_PRODUTO = '" . $this->getNU_QTDE_PRODUTO() ."', TIPO_PRODUTO = '" . $this->getTIPO_PRODUTO() ."', VALOR_PRODUTO = '" . $this->getVALOR_PRODUTO()."', DT_FABRICACAO = '" . $this->getDT_FABRICACAO()."', DT_VALIDADE = '" . $this->getDT_VALIDADE()."', DT_CADASTRO = '" . $this->getDT_CADASTRO().   "' WHERE COD_PRODUTO =" . $this->getCOD_PRODUTO();

        #executa consulta e retorna o resultado para o controle
        if ($this->executarQuery($sql) == 1) {
            return true;
        } else {
            return false;
        }
    }

    #metodo para excluir um cliente
    public function excluir($COD_PRODUTO) {

        #setar os dados
        $this->setCOD_PRODUTO($COD_PRODUTO);

        #montar a consulta
        $sql = "DELETE FROM produto WHERE COD_PRODUTO=" . $this->getCOD_PRODUTO();

        #executa consulta e retorna o resultado para o controle
        if ($this->executarQuery($sql) == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getTodosProdutos()
    {
        $sql = 'select * from produto';

        $result = $this->executarQuery($sql);
        return mysql_fetch_array($result);
    }
}


