<?php

class modelConexao {
    #atributos da conexão

    var $host;
    var $user;
    var $senha;
    var $dbase;
    var $link;

    #métodos gets e sets
    public function getHost() {
        return $this->host;
    }

    public function getUser() {
        return $this->user;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getDbase() {
        return $this->dbase;
    }

    public function getLink() {
        return $this->link;
    }

    public function setHost($host) {
        $this->host = $host;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setDbase($dbase) {
        $this->dbase = $dbase;
    }

    public function setLink($link) {
        $this->link = $link;
    }

    #método para conectar ao banco de dados MySQL
    function conecta() {

        #configurar banco de dados
        $this->setHost("192.168.56.115");
        $this->setUser("root");
        $this->setSenha("");
        $this->setDbase("bd_sisfarma");

        #define a conexão com o banco de dados
        $this->link = mysql_connect($this->getHost(), $this->getUser(), $this->getSenha());

        #verifica se a conexão obteve êxito
        if ($this->link) {
            #conecta ao banco de dados
            mysql_select_db($this->getDbase(), $this->link);
            #define codificação
            mysql_set_charset('UTF8', $this->link);
            return true;
        } else {
            return false;
        }
    }

    #método para executar uma consulta
    function executarQuery($consulta) {
        #conecta ao banco de dados
        $this->conecta();

        #execulta da consulta
        if ($resultado = mysql_query($consulta)) {
            return $resultado;
        } else {
            return false;
        }
        $this->desconecta();
    }

    #método para desconectar ao banco de dados MySQL
    function desconecta() {
        return mysql_close($this->link);
    }

}
