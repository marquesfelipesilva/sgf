<?php
if($startaction == 1 && $acao == "logar"){
		//Dados
		$DS_LOGIN=$_POST["DS_LOGIN"];
		$DS_SENHA=$_POST["DS_SENHA"];
		
		if(empty($DS_LOGIN) || empty($DS_SENHA)){
			$msg="Preencha todos os campos!";
		}else{
			if(!filter_var($DS_LOGIN)){
				$msg="Digite seu login corretamente!";
			}else{
				//Executa a busca pelo usuário
				$login=new Login;
				echo "<div class=\"flash\">";
				$login=$login->logar($DS_LOGIN, $DS_SENHA); 
				echo"</div>";
				
			}
		}
}
?>