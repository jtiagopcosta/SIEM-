<?php

include_once ("../common/database.php");

$analise = $_POST['analise'];

$query = "set schema 'trabalho2';";	
pg_exec($conn, $query);

$query = "INSERT INTO analises (hora, analise ) VALUES ('$nome', '$analise')";
pg_query($conn, $query);
?>