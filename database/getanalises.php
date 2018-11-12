<?php
function get_analisesByid() {

    global $conn;
  $conn = pg_connect("host=db.fe.up.pt dbname=siem1818 user=siem1818 password=CMHTnbDy");
  if (!$conn) {
    echo "An error occured.\n";
    exit;
    }

    $idfilme = $_GET['id'];

    /*Definicao e execucao da query para seleção da bdd*/
    $query = "set schema 'trabalho2';";	
    pg_exec($conn, $query);
        
    /*Definicao e execucao da query sql de consulta*/
    $query = "SELECT * from analises WHERE idfilme = $idfilme ORDER BY id DESC;";
    $analises = pg_exec($conn, $query);


    pg_close($conn);
    return $analises;
}
?>