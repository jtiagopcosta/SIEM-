<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet"  href="css/style.css" type="text/css"/>
		<link rel="stylesheet"  href="css/perfil.css" type="text/css"/>
		<link rel="stylesheet"  href="css/login.css" type="text/css"/>
		<link rel="stylesheet"  href="css/submit.css" type="text/css"/>
		<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <!--DIVISORIA LOGIN-->
		<div >
                <?php
                session_start();
                if(isset($_SESSION['usuario']) ){ ?>
    
                            
                            <ul class="barra">	
                                Olá <a  class="c" href="perfil.php?id=<?=$_SESSION['id']?>"> <b><?=$_SESSION['nome']?></b></a>, como está?             
                                <form method='post' action='database/acaoLogout.php'>
                                <input class="logout" type='submit' name='logout' value='logout'></input>
                                </form>
                            </ul>	
    
                <?php }
                else if(isset($_SESSION['administrador']) ){ ?>
                                    
                            
                            <ul class="barra">	
                                Olá <a  class="c" href="perfil.php?id=<?=$_SESSION['id']?>"> <b><?=$_SESSION['nome']?></b></a>, como está?             
                                <form method='post' action='database/acaoLogout.php'>
                                <input class="logout" type='submit' name='logout' value='logout'></input>
                                </form>
                            </ul>	
    
                <?php }
    
                else {?>
                                <ul class="barra">
                                <a href="registro.php" class="registro">Registar-se</a>
                                <form method="POST" action="database/validacao_user.php">
                                <input class="submitlogin" type="submit" value="Sign in" />
                                <li class="login"><input type="Password" name="senha" placeholder="Password" class="firstbar"></li>
                                <li class="login"><input type="Login" name="nome" placeholder="Username" class="firstbar"></li>	
                                </form>
                <?php } ?>
            </div>
    
            <div id="div_top">
                    <h1>Cin&eacutefilos.pt</h1>
                    <img src="./img/title.jpg" width="100%" height="100%">
            </div>
    
            <!-- menu -->
            <div>
                <ul>
                    <?php
                    
                    if(isset($_SESSION['administrador']) ){ ?>
                            <li><a  href="index.php">Em destaque</a></li>
                            <li><a  href="filmes.php">Filmes</a></li>
                            <li><a href="formulario.php">Inserir</a></li>
                            <form method="POST" action="filmespesquisados.php">
                                <input type="search" name="pesquisa" placeholder="pesquisa" class="pesquisadorAdm">
                                </form>
                            
                            <?php }
                                    else {
                                        ?>
    
                            <li><a  href="index.php">Em destaque</a></li>
                            <li><a  href="filmes.php">Filmes</a></li>
                            <li><a class="active" href="sobre.php">Sobre</a></li>
                            <li  class="barrapesquisa">
                                <form method="POST" action="filmespesquisados.php">
                                <input type="search" name="pesquisa" placeholder="pesquisa" class="pesquisador">
                                </form>
                            </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="main_div">
                <p>Este trabalho foi realizado por: Jorge Tiago Costa e Caio Andrade<p><br>
                Em princípio o <i>site</i> será bem apresentado em qualquer resolução. Os testes foram sempre feitos usando o Mozilla Firefox versão 63.
                <div class="row">		
                        <a href="./css">
                            <img class="icon" src="./img/css.png">
                        <a>
                            
                        <a href="./mockup/JorgeCosta_CaioAndrade_Mockup.pptx">
                            <img class="icon" src="./img/ppt.png" width="100%">
                        <a>		
                        <a href="./JorgeCosta_trabalho1.zip">
                            <img class="icon" src="./img/zip.png" width="100%">
                        <a>		
		        </div>                            
            </div>
   
    </body>
</html>