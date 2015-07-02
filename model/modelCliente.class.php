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
        $sql = "select c.*,coalesce(
            (select t.NU_TELEFONE from tel_cliente tc 
            join telefone t on t.COD_TELEFONE = tc.COD_TELEFONE
            where t.COD_TELEFONE = (select max(COD_TELEFONE) from tel_cliente where COD_CLIENTE = c.COD_CLIENTE)
            ),'n/a') as NU_TELEFONE from cliente c ";

        #verificar se foi passado algum valor de $id
        if ($this->getCOD_CLIENTE() != null) {
            $sql.= ' and COD_CLIENTE=' . $this->getCOD_CLIENTE();
        }

        #verificar se foi passado algum valor de $nome
        if ($this->getNO_CLIENTE() != null) {
            $sql.= " and NO_CLIENTE like '%" . $this->getNO_CLIENTE() . "%'";
        }
//print_r($sql);die;
        #executa consulta e controi um array com o resultado da consulta
        $return = array();
        $result = $this->executarQuery($sql);
        //print_r($result);die;
        while ($row = mysql_fetch_array($result)) {
            $return[] = $row;
        }
        return $return;
    }

    #método para inserir um cliente
    public function inserir($params,$arrTelefone = null)
    {
        #setar os dados
        $this->setNO_CLIENTE($params['NO_CLIENTE']);
        $this->setDS_EMAIL($params['DS_EMAIL']);
        $this->setDT_CADASTRO($params['DT_CADASTRO']);
        $this->setDS_ENDERECO($params['DS_ENDERECO']);

        #montar a consulta
        $sql = "INSERT INTO cliente (NO_CLIENTE, DS_ENDERECO, DS_EMAIL, DT_CADASTRO) VALUES ('" . $this->getNO_CLIENTE() . "','" . $this->getDS_ENDERECO() . "','" . $this->getDS_EMAIL() . "','" . $this->getDT_CADASTRO() . "')";

        #executa consulta e retorna o resultado para o controle
        if ($this->executarQuery($sql) == 1) {
            $idCliente = mysql_insert_id();
            if ($arrTelefone) {
                foreach ($arrTelefone as $telefone) {
                    $sqlTel = "INSERT INTO telefone (NU_TELEFONE,COD_TIPO_TELEFONE) VALUES ('".$telefone['nu_telefone']."',".$telefone['cod_tipo_telefone'].")";
                    $this->executarQuery($sqlTel);

                    $sqlTelCli = "INSERT INTO tel_cliente (COD_TELEFONE,COD_CLIENTE) VALUES (".mysql_insert_id().",".$idCliente.")";
                    $this->executarQuery($sqlTelCli);
                }
            }
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
            $idCliente = mysql_insert_id();
            if ($arrTelefone) {
                foreach ($arrTelefone as $telefone) {
                    $sqlTel = "UPDATE telefone SET NU_TELEFONE = '".$telefone['nu_telefone']."', COD_TIPO_TELEFONE ='" .$telefone['cod_tipo_telefone'].")";
                    $this->executarQuery($sqlTel);

                    $sqlTelCli = "UPDATE tel_cliente SET COD_TELEFONE = '".mysql_insert_id()."',COD_CLIENTE = '".$idCliente.")";
                    $this->executarQuery($sqlTelCli);
                }
            }
            return true;
        } else {
            return false;
        }
    }

    #metodo para excluir um cliente
    public function excluir($COD_CLIENTE, $COD_TELEFONE, $COD_TIPO_TELEFONE) {

        #setar os dados
        $this->setCOD_CLIENTE($COD_CLIENTE, $COD_TELEFONE, $COD_TIPO_TELEFONE);

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
