<?php
$page="SGF - Login";
include("header.php");
?>

<div id="cadastrar"><a href="cadastro.php" title="Cadastre-se e faça parte da nossa equipe!">Cadastre-se &raquo;</a></div>
	<div id="login" class="form bradius">
    	<div class="message" style="<?php echo $display;?>"><?php echo $msg;?></div>
        <div class="logo"><a href="<?php echo $home;?>" title="<?php echo $title;?>"><img src="css/imagens/farm.png" alt="<?php echo $title;?>" title="<?php echo $title;?>" width="200" height="150" /></a></div>
        <div class="acomodar">
        	<form action="index.php?acao=logar" method="post">
            <label for="DS_LOGIN">Usuário: </label><input id="DS_LOGIN" type="text" class="txt bradius" name="DS_LOGIN" value="" />
            <label for="DS_SENHA">Senha: </label><input  id="DS_SENHA" type="password" class="txt bradius" name="DS_SENHA" value="" />
            <input type="submit" class="sb bradius" value="Entrar" />
            
                <?php
            
            //echo $DS_LOGIN;
            //echo $DS_SENHA;
                       
            ?>
            </form>
        <!--acomodar-->
        </div>
       <!--login-->
    </div>
</body>
</html>