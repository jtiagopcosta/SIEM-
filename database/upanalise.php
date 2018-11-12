<?php

include_once ("../common/database.php");
session_start();
$idfilme = $_GET['id'];
$analise = $_POST['mensagem'];
$id = $_SESSION['id'];

$query = "set schema 'trabalho2';";	
pg_exec($conn, $query);

$query = "INSERT INTO analises ( analise, idusuario, idfilme ) VALUES ( '$analise', '$id', '$idfilme')";
pg_query($conn, $query);
pg_close($conn); 
?>