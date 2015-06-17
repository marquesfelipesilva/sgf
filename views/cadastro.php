<?php
$page="SGF - Cadastro";
include("header.php");
?>
	<div id="cadastrar"><a href="index.php" title="Faça login!">Login &raquo;</a></div>
	<div id="login" class="form bradius" style="top:150px;">
    	<div class="message bradius " style="<?php echo $display;?>"><?php echo $msg;?></div>
        <div class="logo"><a href="<?php echo $home;?>" title="<?php echo $title;?>"><img src="css/imagens/farm.png" alt="<?php echo $title;?>" title="<?php echo $title;?>" width="200" height="150" /></a></div>
        <div class="acomodar">
        	<form action="cadastro.php?acao=cadastrar" method="post">
            <label for="NO_COLABORADOR">Nome: </label><input id="NO_COLABORADOR" type="text" class="txt bradius" name="NO_COLABORADOR"  />
             <label for="NU_CPF_COLABORADOR">CPF: </label><input id="NU_CPF_COLABORADOR" type="text" class="txt bradius" name="NU_CPF_COLABORADOR"  />
            <label for="DS_FUNCAO">Função: </label><input id="DS_FUNCAO" type="text" class="txt bradius" name="DS_FUNCAO" />
            <label for="DS_FUNCAO">Login: </label><input id="DS_LOGIN" type="text" class="txt bradius" name="DS_LOGIN" />
            <label for="DS_SENHA">Senha: </label><input  id="DS_SENHA" type="password" class="txt bradius" name="DS_SENHA"  />
            <input type="submit" class="sb bradius" value="Cadastrar" />
            </form>
        <!--acomodar-->
        </div>
       <!--login-->
    </div>
</body>
</html>