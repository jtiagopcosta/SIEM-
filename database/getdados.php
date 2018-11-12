<?php
function get_dadosByid($idperfil) {

    global $conn;
  $conn = pg_connect("host=db.fe.up.pt dbname=siem1818 user=siem1818 password=CMHTnbDy");
  if (!$conn) {
    echo "An error occured.\n";
    exit;
    }


    /*Definicao e execucao da query para seleção da bdd*/
    $query = "set schema 'trabalho2';";	
    pg_exec($conn, $query);
        
    /*Definicao e execucao da query sql de consulta*/
    $query = "SELECT * from usuarios WHERE id = $idperfil;";
    $dados = pg_exec($conn, $query);

    return $dados;
    pg_close($conn);
    
}
?>