<?php

#inclui arquivo da classe de conexão
include_once '../model/modelConexao.class.php';

class modelFornecedor extends modelConexao {

    #atributos

    private $COD_FORNECEDORES;
    private $NO_FORNECEDOR;
    private $NO_FANTASIA;
    private $RAZAO_SOCIAL;
    private $NU_CNPJ;
    private $NO_CIDADE;
    private $DS_ENDERECO;
    private $DS_COMPLMENTO_END;
    private $SIGLA_UF;
    private $NU_TELEFONE1;
    private $NU_TELEFONE2;
    private $NU_TELEFONE3;
    private $DS_EMAIL;
    private $DS_OBSERVACAO;
    private $DT_CADASTRO;

    public function getCOD_FORNECEDORES() {
        return $this->COD_FORNECEDORES;
    }

    public function getNO_FORNECEDOR() {
        return $this->NO_FORNECEDOR;
    }

    public function getNO_FANTASIA() {
        return $this->NO_FANTASIA;
    }

    public function getRAZAO_SOCIAL() {
        return $this->RAZAO_SOCIAL;
    }

    public function getNU_CNPJ() {
        return $this->NU_CNPJ;
    }

    public function getNO_CIDADE() {
        return $this->NO_CIDADE;
    }

    public function getDS_ENDERECO() {
        return $this->DS_ENDERECO;
    }

    public function getDS_COMPLMENTO_END() {
        return $this->DS_COMPLMENTO_END;
    }

    public function getSIGLA_UF() {
        return $this->SIGLA_UF;
    }

    public function getNU_TELEFONE1() {
        return $this->NU_TELEFONE1;
    }

    public function getNU_TELEFONE2() {
        return $this->NU_TELEFONE2;
    }

    public function getNU_TELEFONE3() {
        return $this->NU_TELEFONE3;
    }

    public function getDS_EMAIL() {
        return $this->DS_EMAIL;
    }

    public function getDS_OBSERVACAO() {
        return $this->DS_OBSERVACAO;
    }

    public function getDT_CADASTRO() {
        return $this->DT_CADASTRO;
    }

    public function setCOD_FORNECEDORES($COD_FORNECEDORES) {
        $this->COD_FORNECEDORES = $COD_FORNECEDORES;
    }

    public function setNO_FORNECEDOR($NO_FORNECEDOR) {
        $this->NO_FORNECEDOR = $NO_FORNECEDOR;
    }

    public function setNO_FANTASIA($NO_FANTASIA) {
        $this->NO_FANTASIA = $NO_FANTASIA;
    }

    public function setRAZAO_SOCIAL($RAZAO_SOCIAL) {
        $this->RAZAO_SOCIAL = $RAZAO_SOCIAL;
    }

    public function setNU_CNPJ($NU_CNPJ) {
        $this->NU_CNPJ = $NU_CNPJ;
    }

    public function setNO_CIDADE($NO_CIDADE) {
        $this->NO_CIDADE = $NO_CIDADE;
    }

    public function setDS_ENDERECO($DS_ENDERECO) {
        $this->DS_ENDERECO = $DS_ENDERECO;
    }

    public function setDS_COMPLMENTO_END($DS_COMPLMENTO_END) {
        $this->DS_COMPLMENTO_END = $DS_COMPLMENTO_END;
    }

    public function setSIGLA_UF($SIGLA_UF) {
        $this->SIGLA_UF = $SIGLA_UF;
    }

    public function setNU_TELEFONE1($NU_TELEFONE1) {
        $this->NU_TELEFONE1 = $NU_TELEFONE1;
    }

    public function setNU_TELEFONE2($NU_TELEFONE2) {
        $this->NU_TELEFONE2 = $NU_TELEFONE2;
    }

    public function setNU_TELEFONE3($NU_TELEFONE3) {
        $this->NU_TELEFONE3 = $NU_TELEFONE3;
    }

    public function setDS_EMAIL($DS_EMAIL) {
        $this->DS_EMAIL = $DS_EMAIL;
    }

    public function setDS_OBSERVACAO($DS_OBSERVACAO) {
        $this->DS_OBSERVACAO = $DS_OBSERVACAO;
    }

    public function setDT_CADASTRO($DT_CADASTRO) {
        $this->DT_CADASTRO = $DT_CADASTRO;
    }



        #metodo para executar uma consulta, recebe como parametro o id e o nome
    public function consultar($COD_FORNECEDORES = null, $NO_FORNECEDOR= null) {

        #setar os valores
        $this->setCOD_FORNECEDORES($COD_FORNECEDORES);
        $this->setNO_FORNECEDOR($NO_FORNECEDOR);

        #montar a consultar (whre 1 serve para selecionar todos os registros)
        $sql = 'select * from fornecedores where 1';

        #verificar se foi passado algum valor de $id
        if ($this->getCOD_FORNECEDORES() != null) {
            $sql.= ' and COD_FORNECEDORES=' . $this->getCOD_FORNECEDORES();
        }

        #verificar se foi passado algum valor de $nome
        if ($this->getNO_FORNECEDOR() != null) {
            $sql.= " and NO_FORNECEDOR like '%" . $this->getNO_FORNECEDOR() . "%'";
        }

        #executa consulta e controi um array com o resultado da consulta
        $result = $this->executarQuery($sql);
        $return = array();
        if ($result){
            while ($row = mysql_fetch_array($result)) {
                $return[] = $row;
            }
        }
        return $return;
    }

    #método para inserir um FORNECEDOR
    public function inserir($NO_FORNECEDOR,$NO_FANTASIA,$RAZAO_SOCIAL,$NU_CNPJ,$NO_CIDADE,$DS_ENDERECO,$DS_COMPLMENTO_END,$SIGLA_UF,$NU_TELEFONE1,$NU_TELEFONE2,$NU_TELEFONE3,$DS_EMAIL,$DS_OBSERVACAO,$DT_CADASTRO) {

        #setar os dados
        $this->setNO_FORNECEDOR($NO_FORNECEDOR);
        $this->setNO_FANTASIA($NO_FANTASIA);
        $this->setRAZAO_SOCIAL($RAZAO_SOCIAL);
        $this->setNU_CNPJ($NU_CNPJ);
        $this->setNO_CIDADE($NO_CIDADE);
        $this->setDS_ENDERECO($DS_ENDERECO);
        $this->setDS_COMPLMENTO_END($DS_COMPLMENTO_END);
        $this->setSIGLA_UF($SIGLA_UF);
        $this->setNU_TELEFONE1($NU_TELEFONE1);
        $this->setNU_TELEFONE2($NU_TELEFONE2);
        $this->setNU_TELEFONE3($NU_TELEFONE3);
        $this->setDS_EMAIL($DS_EMAIL);
        $this->setDS_OBSERVACAO($DS_OBSERVACAO);
        $this->setDT_CADASTRO($DT_CADASTRO);

        #montar a consulta
        $sql = "INSERT INTO fornecedores (NO_FORNECEDOR,NO_FANTASIA,RAZAO_SOCIAL,NU_CNPJ,NO_CIDADE,DS_ENDERECO,DS_COMPLMENTO_END,SIGLA_UF,NU_TELEFONE1,NU_TELEFONE2,NU_TELEFONE3,DS_EMAIL,DS_OBSERVACAO,DT_CADASTRO) VALUES ('" . $this->getNO_FORNECEDOR() . "','" . $this->getNO_FANTASIA() . "','" . $this->getRAZAO_SOCIAL() . "','" . $this->getNU_CNPJ() . "','" . $this->getNO_CIDADE() .  "','" . $this->getDS_ENDERECO() . "','" . $this->getDS_COMPLMENTO_END() . "','" . $this->getSIGLA_UF() ."','" . $this->getNU_TELEFONE1() ."','" . $this->getNU_TELEFONE2() ."','" . $this->getNU_TELEFONE3() ."','" . $this->getDS_EMAIL() ."','" . $this->getDS_OBSERVACAO() ."','" . $this->getDT_CADASTRO() ."')";

        #executa consulta e retorna o resultado para o controle
        if ($this->executarQuery($sql) == 1) {
            return true;
        } else {
            return false;
        }
    }

    #metodo para alterar um cliente
    public function alterar($COD_FORNECEDORES,$NO_FORNECEDOR,$NO_FANTASIA,$RAZAO_SOCIAL,$NU_CNPJ,$NO_CIDADE,$DS_ENDERECO,$DS_COMPLMENTO_END,$SIGLA_UF,$NU_TELEFONE1,$NU_TELEFONE2,$NU_TELEFONE3,$DS_EMAIL,$DS_OBSERVACAO,$DT_CADASTRO) {

        #setar os dados
        $this->setCOD_FORNECEDORES($COD_FORNECEDORES);
        $this->setNO_FORNECEDOR($NO_FORNECEDOR);
        $this->setNO_FANTASIA($NO_FANTASIA);
        $this->setRAZAO_SOCIAL($RAZAO_SOCIAL);
        $this->setNU_CNPJ($NU_CNPJ);
        $this->setNO_CIDADE($NO_CIDADE);
        $this->setDS_ENDERECO($DS_ENDERECO);
        $this->setDS_COMPLMENTO_END($DS_COMPLMENTO_END);
        $this->setSIGLA_UF($SIGLA_UF);
        $this->setNU_TELEFONE1($NU_TELEFONE1);
        $this->setNU_TELEFONE2($NU_TELEFONE2);
        $this->setNU_TELEFONE3($NU_TELEFONE3);
        $this->setDS_EMAIL($DS_EMAIL);
        $this->setDS_OBSERVACAO($DS_OBSERVACAO);
        $this->setDT_CADASTRO($DT_CADASTRO);
        #montar a consulta
        $sql = "UPDATE fornecedores SET NO_FORNECEDOR = '" . $this->getNO_FORNECEDOR() . "', NO_FANTASIA = '" . $this->getNO_FANTASIA() . "', RAZAO_SOCIAL = '" . $this->getRAZAO_SOCIAL() ."', NU_CNPJ = '" . $this->getNU_CNPJ() ."', NO_CIDADE = '" . $this->getNO_CIDADE()."', DS_ENDERECO = '" . $this->getDS_ENDERECO()."', DS_COMPLMENTO_END = '" . $this->getDS_COMPLMENTO_END()."', SIGLA_UF = '" . $this->getSIGLA_UF()."', NU_TELEFONE1 = '" . $this->getNU_TELEFONE1()."', NU_TELEFONE2 = '" . $this->getNU_TELEFONE2()."', NU_TELEFONE3 = '" . $this->getNU_TELEFONE3()."', DS_EMAIL = '" . $this->getDS_EMAIL()."', DS_OBSERVACAO = '" . $this->getDS_OBSERVACAO()."', DT_CADASTRO = '" . $this->getDT_CADASTRO().   "' WHERE COD_FORNECEDORES =" . $this->getCOD_FORNECEDORES();

        #executa consulta e retorna o resultado para o controle
        if ($this->executarQuery($sql) == 1) {
            return true;
        } else {
            return false;
        }
    }

    #metodo para excluir um cliente
    public function excluir($COD_FORNECEDORES) {

        #setar os dados
        $this->setCOD_FORNECEDORES($COD_FORNECEDORES);

        #montar a consulta
        $sql = "DELETE FROM fornecedores WHERE COD_FORNECEDORES=" . $this->getCOD_FORNECEDORES();

        #executa consulta e retorna o resultado para o controle
        if ($this->executarQuery($sql) == 1) {
            return true;
        } else {
            return false;
        }
    }
}


