<?php
$page="SisFarma - Painel Administrativo";
include("header.php");

?>
<div id="cadastrar"><a href="index.php?acao=logout" title="Fazer logout!">Logout &raquo;</a></div></BR></BR></BR>
<center><p><a href="view/consultarCliente.php">Acessar o Sistema</a></p></center>
	<div id="login" class="form bradius">
    	<div class="message" style="<?php echo $display;?>"></div>
        <div class="logo"><a href="<?php echo $home;?>" title="<?php echo $title;?>"><img src="css/imagens/farm.png" alt="<?php echo $title;?>" title="<?php echo $title;?>" width="200" height="150" /></a></div>
        <div class="acomodar">
        <?php
        
		if($NIVEL == 2){
                                        
			?>
            
                
			<table width="100%" border="0">
            	<tr>
                        
                        
                	<th>Nome</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
                
                <?php
				$buscarusuarios=mysql_query("SELECT * FROM colaborador WHERE NIVEL='1'");
				if(mysql_num_rows($buscarusuarios) == 0){
				echo"Nenhum usuário cadastrado no sistema!";
				}else{
					while($linha=mysql_fetch_array($buscarusuarios)){
				?>
                <tr>
                	<td><?php echo $linha["NO_COLABORADOR"];?></td>
                    <td><?php echo $linha["STATUS"];?></td>
                    <td><?php $COD_COLABORADOR=$linha["COD_COLABORADOR"]; if($linha["STATUS"] == 0){ echo "<a href=\"index.php?acao=aprovar&amp;COD_COLABORADOR=$COD_COLABORADOR\">Aprovar</a>";}else{echo"<a href=\"index.php?acao=bloquear&amp;COD_COLABORADOR=$COD_COLABORADOR\">Bloquear</a>";}?></td>
                </tr>
                <?php } }?>
            </table>
            <?php }else{?>
            
            <!--echo '<meta HTTP-EQUIV="Refresh" CONTENT="2; URL=">';?>-->

            <!--<p>Usuário Colaborador</p>-->
            <?php }?>
        <!--acomodar-->
        </div>
       <!--login-->
    </div>
</body>
</html>