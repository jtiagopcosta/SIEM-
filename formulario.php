<!DOCTYPE html>
<?PHP
	session_start();

	if (is_null($_SESSION['administrador']))
	
		header("Location: index.php");		
?>
<html>
	<head>
		<link rel="stylesheet"  href="css/style.css" type="text/css"/>
		<link rel="stylesheet"  href="css/form.css" type="text/css"/>
		<link rel="stylesheet"  href="css/login.css" type="text/css"/>
		<link rel="stylesheet"  href="css/submit.css" type="text/css"/>
		<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
<body>
		<div>
				<ul class="barra">	
				Olá <b> <?php echo $_SESSION['nome'];?> </b>, como estás?               
			    <form method='post' action='database/acaoLogout.php'>
				<input class="logout" type='submit' name='logout' value='logout'></input>
				</form>
			</ul>	
			</div>
			
	<div id="div_top">
			<h1>Cin&eacutefilos.pt</h1>
			<img src="./img/title.jpg" width="100%" height="100%">
	</div>
	<!-- menu -->
	<ul>
		<li><a href="index.php">Em destaque</a></li>
		<li><a href="filmes.php">Filmes</a></li>
		<li><a class="active"  href="formulario.html">Inserir</a></li>
		<li  class="barrapesquisa">
			<input type="search" name="pesquisa" placeholder="pesquisa" class="input p">
		</li>
	</ul>
	
	<div class="div_moderador">
		<h2>Inserir Filmes</h2>

		<section> 
		<form class="form" action="database/upfilme.php" method="post" enctype="multipart/form-data">	
		<label for="fileToUpload">Carregar Imagem:</label>					
		<input type="file" value="Imagem" name="fileToUpload" id="fileToUpload" required><br>
		<input type="text"  class="input" name="nome" placeholder="Inserir Título" required>
		<input type="text" class="input" name="genero" placeholder="Inserir Categorias" required>
		<input type="text" class="input" name="elenco" placeholder="Inserir Elenco" required><br>
		<input type="text" class="input" name="autor" placeholder="Inserir Realizador" required>
		<input type="text" class="input" name="nacionalidade" placeholder="Inserir Nacionalidade"><br>
	
		<textarea name="mensagem" class="textarea" value="descrição" required></textarea><br>
		
		<input class="submit" type="submit" value="Adicionar Filme" name="submit">

		</section>
		</form>	
	</div>	
</body>

</html>