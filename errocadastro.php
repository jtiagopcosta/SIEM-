<!DOCTYPE html>
<html>
	<head>
	    <link rel="stylesheet"  href="css/style.css" type="text/css"/>
		<link rel="stylesheet"  href="css/principal.css" type="text/css"/>
		<link rel="stylesheet"  href="css/login.css" type="text/css"/>
		<link rel="stylesheet"  href="css/barralateral.css" type="text/css"/>
		<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

<body>
		<!--DIVISORIA DE LOGIN-->
		<div >
			<?php
			session_start();
			if(isset($_SESSION['administrador']) ){ ?>			
				<ul class="barra">	
				Olá <a  class="c" href="perfil.php?id=<?=$_SESSION['id']?>"> <b><?=$_SESSION['nome']?></b></a>, como está?              
					<form method='post' action='database/acaoLogout.php'>
						<input class="logout" type='submit' name='logout' value='logout'></input>
					</form>
				</ul>	

			<?php }
			else if(isset($_SESSION['usuario']) ){ ?>			
				<ul class="barra">	
				Olá <a  class="c" href="perfil.php?id=<?=$_SESSION['id']?>"> <b><?=$_SESSION['nome']?></b></a>, como está?                 
					<form method='post' action='database/acaoLogout.php'>
						<input class="logout" type='submit' name='logout' value='logout'></input>
					</form>
				</ul>	

			<?php }
			else {
					?>
						<ul class="barra">
						<a href="registro.php" class="registro">Registar-se</a>
					<form method="POST" action="database/validacao_user.php">
						<input class="submitlogin" type="submit" value="Sign in" />
						<li class="login"><input type="Password" name="senha" placeholder="Password" class="firstbar" required></li>
						<li class="login"><input type="Login" name="nome" placeholder="Username" class="firstbar" required></li>	
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
				
				if(isset($_SESSION['administrador'] )){ ?>
						<li><a class="active" href="index.php">Em destaque</a></li>
						<li><a href="filmes.php">Filmes</a></li>
						<li><a href="formulario.php">Inserir</a></li>
						<form method="POST" action="filmespesquisados.php">
							<input type="search" name="pesquisa" placeholder="pesquisa" class="pesquisadorAdm">
							</form>

						<?php }
								else {
									?>

						<li><a class="active" href="index.php">Em destaque</a></li>
						<li><a href="filmes.php">Filmes</a></li>
						<li><a href="sobre.php">Sobre</a></li>
						<li  class="barrapesquisa">
							<form method="POST" action="filmespesquisados.php">
							<input type="search" name="pesquisa" placeholder="pesquisa" class="pesquisador">
							</form>
						</li>
				<?php } ?>
			</ul>
		</div>

<div class="main_div">
	<article text-align: justify>
	<p>Já exite um usuário com este nome, por favor tente novamente.</p>
	<p>Desculpe o transtorno!</p>
	<a href="registro.php"> Clique aqui para tentar novamente</a>
	</article>
	<img src="./img/erro.png">
</div>
	</body>

</html>