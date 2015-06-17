<?php
if($startaction == 1 && $acao == "cadastrar"){
		$NO_COLABORADOR=$_POST["NO_COLABORADOR"];
		$NU_CPF_COLABORADOR=$_POST["NU_CPF_COLABORADOR"];
		$DS_FUNCAO=$_POST["DS_FUNCAO"];
                $DS_LOGIN=$_POST["DS_LOGIN"];
		$DS_SENHA=$_POST["DS_SENHA"];		
		
		if(empty($NO_COLABORADOR) || empty($NU_CPF_COLABORADOR) || empty($DS_FUNCAO) || empty($DS_LOGIN) || empty($DS_SENHA)){
			$msg="Preencha todos os campos!";
		}
		//Todos os campos preenchidos
		else{
			//Login válido
			if(filter_var($DS_LOGIN)){
				//Senha inválida
				if(strlen($DS_SENHA) < 8){
					$msg="As senhas devem ter no mínimo oito caracteres!";
				}
				//Senha válida
				else{
					//Executa a classe de cadastro
					$conectar=new Cadastro;
					echo"<div class=\"flash\">";
					$conectar=$conectar->cadastrar($NO_COLABORADOR, $NU_CPF_COLABORADOR, $DS_FUNCAO, $DS_LOGIN, $DS_SENHA); 
					echo"</div>";
				}
			}
			//login inválido
			else{
				$msg="Digite seu login corretamente!";
			}
		}
}

?>