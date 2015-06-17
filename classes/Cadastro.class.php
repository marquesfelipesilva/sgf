<?php
	class Cadastro{
		public function cadastrar($NO_COLABORADOR, $NU_CPF_COLABORADOR, $DS_FUNCAO, $DS_LOGIN, $DS_SENHA){
			//Tratamento das variáveis
			$NO_COLABORADOR=ucwords(strtolower($NO_COLABORADOR));
			$NU_CPF_COLABORADOR=($NU_CPF_COLABORADOR);
                        $DS_FUNCAO=$DS_FUNCAO;
                        $DS_LOGIN=$DS_LOGIN;
			$DS_SENHA=$DS_SENHA;
			//Inserção no banco de dados
			$validaremail=mysql_query("SELECT * FROM colaborador WHERE DS_LOGIN='$DS_LOGIN'");
			$contar=mysql_num_rows($validaremail);
			if($contar == 0){
			$insert=mysql_query("INSERT INTO colaborador(NO_COLABORADOR, NU_CPF_COLABORADOR, DS_FUNCAO, DS_LOGIN, DS_SENHA, NIVEL, STATUS)VALUES('$NO_COLABORADOR','$NU_CPF_COLABORADOR','$DS_FUNCAO','$DS_LOGIN','$DS_SENHA', 1, 0)");}else{
			$flash="Desculpe, mas já existe um usuário cadastrado com este login em nosso sistema!";
			}
			if(isset($insert)){
				$flash="Cadastro realizado com sucesso, aguarde a nossa aprovação!";
			}else{
				if(empty($flash)){
				$flash="Ops! Houve um erro em nosso sistema, contate o administrador!";
				}
			}
			
			//Retorno para o usuário
			echo $flash;
		}
	
	}

?>