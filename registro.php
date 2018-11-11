<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet"  href="css/style.css" type="text/css"/>
		<link rel="stylesheet"  href="css/submit.css" type="text/css"/>
		<link rel="stylesheet"  href="css/login.css" type="text/css"/>
		<link rel="stylesheet"  href="css/registro.css" type="text/css"/>
	
		<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
<body>
	<!--LOGIN-->
	<div>
		<ul class="barra">
		<p align="center"  >JUNTE-SE A NOSSA COMUNIDADE </p>				
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
		<li><a href="sobre.html">Sobre</a></li>
		<li  class="barrapesquisa">
			<input type="search" name="pesquisa" placeholder="pesquisa" class="input p">
		</li>
	</ul>
	
	<div class="main_div">
		<h2 class="subh2">Registro</h2>  	
	
        				
		<form method="POST" action="database/acao.php" method="post" enctype="multipart/form-data">
		<label for="nome">Nome:</label>	
		<input type="text" name="nome" class="input" placeholder="Nome Completo" maxlength="30" required><br><br>
		<label for="username">Nome de utilizador: </label>
		<input type="text" name="username" class="input"  placeholder="Nome de usuário" maxlength="30" required><br><br>
		<label for="email">Endereço eletrónico: </label>
		<input type="text" name="email" class="input"  placeholder="E-mail" maxlength="32" required><br><br>
		<label for="senha">Palavra passe: </label>
		<input type="Password" name="senha" class="input"  placeholder="Senha" maxlength="32" required><br><br>
		<label for="fileToUpload">Carregar Imagem:</label>					
		<input type="file" value="Imagem" name="fileToUpload" id="fileToUpload" required><br>
		<input type="submit" class="submit" name="submit" value="Registar" > <br><br>	
	</form>	
	</div>

		
</body>

</html>