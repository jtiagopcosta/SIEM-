<!DOCTYPE html>

<html>

	<head>
		<link rel="stylesheet"  href="css/style.css" type="text/css"/>
		<link rel="stylesheet"  href="css/perfil.css" type="text/css"/>
		<link rel="stylesheet"  href="css/login.css" type="text/css"/>
		<link rel="stylesheet"  href="css/submit.css" type="text/css"/>
		<link rel="stylesheet"  href="css/form.css" type="text/css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>
		<!--DIVISORIA LOGIN-->
		<div >
			<?php
			session_start();
			if($_SESSION['usuario'] ){ ?>

						
						<ul class="barra">	
							Olá <a  class="c" href="perfil.php?id=<?=$_SESSION['id']?>"> <b><?=$_SESSION['nome']?></b></a>, como está?             
							<form method='post' action='database/acaoLogout.php'>
							<input class="logout" type='submit' name='logout' value='logout'></input>
							</form>
						</ul>	

			<?php }
			else if($_SESSION['administrador'] ){ ?>
								
						
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
				session_start();
				if($_SESSION['administrador'] ){ ?>
						<li><a  href="index.php">Em destaque</a></li>
						<li><a class="active" href="filmes.php">Filmes</a></li>
						<li><a href="formulario.php">Inserir</a></li>
						<form method="POST" action="filmespesquisados.php">
							<input type="search" name="pesquisa" placeholder="pesquisa" class="pesquisadorAdm">
							</form>
						
						<?php }
								else {
									?>

						<li><a  href="index.php">Em destaque</a></li>
						<li><a class="active" href="filmes.php">Filmes</a></li>
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
		
			<?php
			/*geração da página com os dados do filme existe na BD*/
			include_once ("database/getperfil.php");
			$result = get_perfilByid (); 
			$linha = pg_fetch_row($result,0);?>
			<img  class="picture_3" src="./img/<?=$linha[6]?>" width="100%">
			</a>

			<div class="text_div">
			<h2><?=$linha[1]?></h2>
			<p><b>Nome:</b> <?=$linha[2]?></p>
			<p><b>Endereço eletrónico:</b> <?=$linha[3]?></h4>
			
			<h3>Alterar dados:</h3>						
			<form method="POST" action="database/editaperfil.php" method="post" enctype="multipart/form-data">
			<label for="username">Nome: </label>
			<input type="text" name="username" class="input"  placeholder="Nome de usuário" maxlength="30" ><br><br>
			<label for="email">Endereço eletrónico: </label>
			<input type="text" name="email" class="input"  placeholder="E-mail" maxlength="32" ><br><br>
			<label for="senha">Palavra passe: </label>
			<input type="Password" name="senha" class="input"  placeholder="Senha" maxlength="32" ><br><br>
			<input type="hidden" name="id6" value="<?=$linha[0]?>">
			<label for="fileToUpload">Carregar Imagem:</label>					
			<input type="file" value="Imagem" name="fileToUpload" id="fileToUpload" ><br>
			<input type="submit" class="submit" name="submit" value="Alterar" > <br><br>	
			</form>	
			</div>
            
        </div>
    </body>

</html>