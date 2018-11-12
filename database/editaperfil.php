<?php

include_once ("../common/database.php");
if($_FILES['fileToUpload']!=NULL){
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
}

    $id6 = $_POST['id6']; 
 if($_POST['username']!=NULL){
  $username = $_POST['username'];
}
if($_POST['email']!=NULL){
  $email = $_POST['email'];
}
if($_POST['senha']!=NULL){
  $password = $_POST['senha'];
  $password_md5 = md5($password);
}

/*Definicao e execucao da query para seleção da bdd*/
$query = "set schema 'trabalho2';";	
pg_exec($conn, $query);
        
if ($username!==NULL){
    $query = "UPDATE usuarios SET username = '$username' WHERE id = '$id6';";
    $result = pg_exec($conn, $query);
}else {}
if ($email!==NULL){
    $query = "UPDATE usuarios SET email = '$email' WHERE id = '$id6';";
    $result = pg_exec($conn, $query);
}else {}
if ($password!==NULL){
    $query = "UPDATE usuarios SET senha_md5 = '".$password_md5."' WHERE id = '$id6';";
    $result = pg_exec($conn, $query);
}else {}
if ($file!==NULL){
    $query = "UPDATE usuarios SET imagem = '$path' WHERE id = '$id6';";
    $result = pg_exec($conn, $query);
}else {}


pg_close($conn);
header("Location:../perfil.php?id=$id6")

?>
