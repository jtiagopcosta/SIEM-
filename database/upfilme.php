<?php

include_once ("../common/database.php");

/*Upload de imagem para o servidor */
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


/* diretório para a imagem guardada (este diretório é gravado na base de dados mais abaixo) */
$file = $_FILES['fileToUpload'];
$name = $file['name'];

$path = "../img/" . basename($name);
if (move_uploaded_file($file['tmp_name'], $path)) {
    // Move succeed.
} else {
    // Move failed. Possible duplicate?
}

/* Obtenção de dados do formulario e envio para a BD */

$nome = $_POST['nome'];
$genero = $_POST['genero'];
$elenco = $_POST['elenco'];
$autor = $_POST['autor'];
$nacionalidade = $_POST['nacionalidade'];
$descricao = $_POST['mensagem'];

$query = "set schema 'trabalho2';";	
pg_exec($conn, $query);

$query = "INSERT INTO filmes (nome, genero, elenco, autor, nacionalidade, descrição, imagem ) VALUES ('$nome', '$genero', '$elenco', '$autor','$nacionalidade', '$descricao', '$path')";
pg_query($conn, $query);


pg_close($conn); 

header("Location:../filmes.php")
?> 