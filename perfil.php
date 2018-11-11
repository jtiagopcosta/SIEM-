<!DOCTYPE html>

<html>

	<head>
		<link rel="stylesheet"  href="css/style.css" type="text/css"/>
		<link rel="stylesheet"  href="css/perfil.css" type="text/css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>

		<div id="div_top">
				<h1>Cin&eacutefilos.pt</h1>
				<img src="./img/title.jpg" width="100%" height="100%">
		</div>

		<!-- menu -->
		<ul>
			<li><a href="index.php">Em destaque</a></li>
			<li><a href="filmes.php">Filmes</a></li>
			<li><a href="sobre.html">Sobre</a></li>
			<li><a href="formulario.html">Inserir</a></li>
			<li  class="barrapesquisa">
				<form method="POST" action="filmespesquisados.php">
				<input type="search" name="pesquisa" placeholder="pesquisa" class="input p">
				</form>
			</li>
        </ul>
        
        <div class="main_div">
			
			olá
			addslashessda
			<?php
			/*geração da página com os dados do filme existe na BD*/
			include_once ("database/getperfilByid.php");
			$result = get_perfilByid (); 
			$linha = pg_fetch_row($result,0);?>
			<img  class="picture_2" src="./img/<?=$linha[7]?>" width="100%">
			</a>

			<div class="text_div">
			<h2><?=$linha[1]?></h2>
			<h3><?=$linha[2]?></h3>
			<p><b>Realizador:</b> <?=$linha[4]?></p>
			<p><b>Elenco:</b> <?=$linha[3]?></h4>
			<p><b>Descrição:</b> <?=$linha[5]?></p>
			</div>
			
            
        </div>
    </body>

</html>