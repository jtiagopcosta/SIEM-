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
			if($_SESSION['administrador'] ){ ?>			
				<ul class="barra">	
					Olá <a  class="c" href="perfil.php"> <b><?=$_SESSION['nome']?></b></a>, como está?                 
					<form method='post' action='database/acaoLogout.php'>
						<input class="submitlogin" type='submit' name='logout' value='logout'></input>
					</form>
				</ul>	

			<?php }
			else if($_SESSION['usuario'] ){ ?>			
				<ul class="barra">	
					Olá <a  class="c" href="perfil.php"> <b><?=$_SESSION['nome']?></b></a>, como está?                  
					<form method='post' action='database/acaoLogout.php'>
						<input class="submitlogin" type='submit' name='logout' value='logout'></input>
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
				session_start();
				if($_SESSION['administrador'] ){ ?>
						<li><a class="active" href="index.php">Em destaque</a></li>
						<li><a href="filmes.php">Filmes</a></li>
						<li><a href="formulario.php">Inserir</a></li>
						<form method="POST" action="filmespesquisados.php">
							<input type="search" name="pesquisa" placeholder="pesquisa" class="input p">
							</form>

						<?php }
								else {
									?>

						<li><a class="active" href="index.php">Em destaque</a></li>
						<li><a href="filmes.php">Filmes</a></li>
						<li><a href="sobre.php">Sobre</a></li>
						<li  class="barrapesquisa">
							<form method="POST" action="filmespesquisados.php">
							<input type="search" name="pesquisa" placeholder="pesquisa" class="input p">
							</form>
						</li>
				<?php } ?>
			</ul>
		</div>


		<div class="main_div">

		<!-- primeira fila -->
		
		<div class="row">
		
		<?php 

		include_once("database/getfilmes.php");

		$result = get_filmes();	

		global $j;
		$j=0;
		while ($j < 5) { 

			$linha = pg_fetch_row($result,$j); ?>
			
			<div class="column">
					<a href="filmepag.php?id=<?=$linha[0]?>">
					<img  class="imagem" src="./img/<?=$linha[7]?>" width="100%">
					<a>
			</div>
			
		<?php $j++;  } ?>
		</div>
			
			<!-- segunda fila -->
			<div class="row">
				
				
				<?php 
				
				while ($j < 10) { 

					$linha = pg_fetch_row($result,$j); ?>
					
					<div class="column">
							<a href="filmepag.php?id=<?=$linha[0]?>">
							<img  class="imagem" src="./img/<?=$linha[7]?>" width="100%">
							<a>
					</div>
					
				<?php $j++;  } ?>
			</div>
		</div>
		<div class="main_div">
			Utilizador:admin<br>
			Pass:admin
		</div>
	</body>

</html>