<!DOCTYPE html>

<html>

	<head>
		<link rel="stylesheet"  href="css/style.css" type="text/css"/>
		<link rel="stylesheet"  href="css/sec.css" type="text/css"/>
		<link rel="stylesheet"  href="css/login.css" type="text/css"/>
		<link rel="stylesheet"  href="css/submit.css" type="text/css"/>
		<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>
		<!--DIVISORIA LOGIN-->
<div>
<?php
session_start();
if($_SESSION['usuario'] ){ ?>

			
			<ul class="barra">	
				Olá <b> <?php echo $_SESSION['nome'];?> </b>, como estás?               
			    <form method='post' action='database/acaoLogout.php'>
				<input class="submitlogin" type='submit' name='logout' value='logout'></input>
				</form>
			</ul>	

<?php }
else if($_SESSION['administrador'] ){ ?>
		 			  
			
			<ul class="barra">	
				Olá <b> <?php echo $_SESSION['nome'];?> </b>, como estás?               
			    <form method='post' action='database/acaoLogout.php'>
				<input class="submitlogin" type='submit' name='logout' value='logout'></input>
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
			<input type="search" name="pesquisa" placeholder="pesquisa" class="input p">
			</form>
		
		<?php }
				else {
					 ?>

		<li><a  href="index.php">Em destaque</a></li>
		<li><a class="active" href="filmes.php">Filmes</a></li>
		<li><a href="sobre.php">Sobre</a></li>
		<li  class="barrapesquisa">
			<form method="POST" action="filmespesquisados.php">
			<input type="search" name="pesquisa" placeholder="pesquisa" class="input p">
			</form>
		</li>
<?php } ?>
</ul>
</div>
		
	<!--FILTROS-->
		<div class="container">
			<div class="filters">

				<h2>Géneros</h2>

				<?php
				
				include_once ("database/getfilmes.php"); 
				$j=0;
				global $result ;
				$result = get_filmes();	
				global $numfilmes;
				$numfilmes = pg_numrows($result);
				
				/* extrair todos os géneros */
				while($j < $numfilmes) {
					$linha = pg_fetch_row ($result,$j);
					$linhas[]=$linha[2];
					$j++;
				}

				/* Tendo em conta que na base de dados os géneros de cada filme estão separados por
				virgulas é necessário separa-los.  É também preciso eliminar os espaços. Apos isto 
				é criado um array com todos os generos existentes, se repetir nenhum*/

				$generos = array();
				foreach ($linhas as $genero){
					$arr = explode(',', $genero);
					
					foreach($arr as $linhas){ if(trim($linhas) != '')
						$generos[] = trim($linhas);
					}
				}
				$input = array();
				$input = array_unique($generos);
				?>
				<form action="filmesfiltrados.php" method = "post"> <?php
				/*gerar a lista de géneros existentes*/ 
				foreach ($input as $genero){?>
					
						<input type="checkbox" name="genero[]" id="genero" value="<?=$genero?>"/><?=$genero?><br>
				<?php  } ?>
				<input class="submit" type="submit" value="OK" name="pesquisar_genero">
				</form>
			</div>


			<div>

				<?php

					$i=0;

					/*gera uma divisão para cada filme existente na base de dados*/
					while ($i < $numfilmes){

						echo "<div class='main_div'>";
						
							$linha = pg_fetch_row($result,$i);
							
							echo "<a href='filmepag.php?id=$linha[0]'>";
							echo '<img class="movie_picture" src="./img/';
							echo $linha[7];
							echo '">';
							echo "</a>";
					 { ?>		
					<?php
		session_start();
		if($_SESSION['administrador'] ){ ?>

				<a class='b' href='database/deletefilme.php?id=$linha[0]' style='text-decoration:none'>X</a>
					 <?php }

							echo "<h2>" .$linha[1]. "</h2>";
							echo $linha[2];
							echo "<p><b>Realizador: </b>".$linha[4]."</p>";
							echo "<p><b>Elenco: </b>".$linha[3]."</p>";
							//echo "<p>Descrição: " .$linha[5]." ";
							echo "</p>";

						echo "</div>";

						$i ++;}
					
					}	
				?>
			</div>	
		</div>
	</body>

</html>