<?php
if($startaction == 1 && $acao == "logout"){
		setcookie("logado","");
		unset($_SESSION["DS_LOGIN"],$_SESSION["DS_SENHA"],$_SESSION["NIVEL"]);
}
?>