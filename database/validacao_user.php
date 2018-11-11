<?php

include_once ("../common/database.php");

$nome = $_POST['nome'];
$senha_md5 = md5('senha');

$query = "set schema 'trabalho2';"; 
pg_exec($conn, $query);


$query = "SELECT * from usuarios where nome =  '" . $nome . "' AND senha_md5 = '" . $senha_md5 . "';"  ;

       
$result = pg_exec($conn, $query);


//Se o nº de registos não for 0 então é válido
session_start();
if ($nome == 'admin')
        {
			$_SESSION['administrador'] = true;
			$_SESSION['nome'] = $_POST['nome'];
		}
		    header("Location: ../teste.php");

if ($nome == 'user')
	   {
	   		$_SESSION['usuario'] = true;
			$_SESSION['nome'] = $_POST['nome'];

	        header("Location: ../index.php");
   		}




pg_close($conn);

