<?php

global $conn;
  $conn = pg_connect("host=db.fe.up.pt dbname=siem1818 user=siem1818 password=CMHTnbDy");
  if (!$conn) {
    echo "An error occured.\n";
    exit;
    }

$idfilme = $_POST['id'];
$analise = $_POST['mensagem'];
$id = $_POST['id2'];

$query = "set schema 'trabalho2';";	
pg_exec($conn, $query);

$query = "INSERT INTO analises (analise, idusuario, idfilme ) VALUES ('$analise', '$id', '$idfilme')";
pg_query($conn, $query);
pg_close($conn); 
header("Location:../filmepag.php?id=$idfilme")

?>