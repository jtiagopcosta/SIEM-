<?php

include_once ("../common/database.php");

$nome = $_POST['nome'];
$password = $_POST['senha'];
$password_md5 = md5($password);

$query = "set schema 'trabalho2';"; 
pg_exec($conn, $query);


$query = "SELECT * from usuarios where nome =  '" . $nome . "' AND senha_md5 = '" . $password_md5 . "';"  ;
echo "query: " . $query . "<p>";

       
$result = pg_exec($conn, $query);
$num_registos = pg_numrows($result);


//Se o n� de registos n�o for 0 ent�o � v�lido
session_start();
if ($query == 'admin')
        {
			$_SESSION['administrador'] = true;
			$_SESSION['nome'] = $_POST['nome'];
		}
		    header("Location: ../index.php");

if ($num_registos > 0)
	   {
	   		$_SESSION['usuario'] = true;
			$_SESSION['nome'] = $_POST['nome'];

	        header("Location: ../index.php");
   		}





pg_close($conn);

