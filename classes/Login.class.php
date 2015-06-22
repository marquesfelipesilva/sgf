<?php
	class Login{
		public function logar($DS_LOGIN, $DS_SENHA){
			$buscar=mysql_query("SELECT * FROM colaborador WHERE DS_LOGIN='$DS_LOGIN' AND DS_SENHA='$DS_SENHA' LIMIT 1");

			if(mysql_num_rows($buscar) == 1){
				$dados=mysql_fetch_array($buscar);
				if($dados["STATUS"] == 1){
					$_SESSION["DS_LOGIN"]=$dados["DS_LOGIN"];
					$_SESSION["DS_SENHA"]=$dados["DS_SENHA"];
					$_SESSION["NIVEL"]=$dados["NIVEL"];
					$_SESSION["COD_COLABORADOR"]=$dados["COD_COLABORADOR"];
					setcookie("logado",1);
					$log=1;
				}else{
					$flash="Aguarde a nossa aprovação!";
				}
			}
				if(isset($log)){
					$flash="Você foi logado com sucesso";
				}else{
					if(empty($flash)){
					$flash="Digite seu Usuario e sua Senha corretamente!";
					}
				}
				echo $flash;
		}

	}

