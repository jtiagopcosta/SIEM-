<?php

   /**
       Conecta com o PostgreSQL
   */
   $conn = pg_connect("host=db.fe.up.pt dbname=siem1818 user=siem1818 password=CMHTnbDy");

   If ($conn)
   {

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

        $nome = $_POST['nome'];        
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['senha'];
        $password_md5 = md5($password);
      

       $query = "set schema 'trabalho2';";  
       pg_exec($conn, $query);
        /**
            Atribui a variável $sql a instrução para inserir um registro.
            OBS.: Na instrução SQL estou supondo que exista no banco de dados a tabela nomes com as colunas id e nome.
       */
        $sql = "INSERT INTO usuarios (nome, username, email, senha_md5, imagem)
                VALUES ('$nome','$username','$email','".$password_md5."', '$path')";
        $result = pg_exec($conn, $query);

       /**
            Invoca o método pg_query passando o ponteiro de conexão com o PostgreSQL e a string contendo a instrução SQL.
       */
       pg_query($conn, $sql);
       header("Location: ../index.php");
       /**
           Fecha a conexão com o PostgreSQL
       */
       pg_close($conn); 
   }
   else
   {
        echo "++ Falha na conexão com o PostgreSQL!!";
   }

?>