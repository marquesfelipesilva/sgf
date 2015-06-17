<?php
if($startaction == 1 && $acao == "aprovar"){
		if($NIVEL == 2){
			if(isset($_GET["COD_COLABORADOR"])){
				$COD_COLABORADOR=$_GET["COD_COLABORADOR"];
				$query=mysql_query("UPDATE colaborador SET STATUS='1' WHERE COD_COLABORADOR='$COD_COLABORADOR'");
			}
		}
}
?>