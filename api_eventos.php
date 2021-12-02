<?php

    include "conexao.php";

    $buscar_eventos = "SELECT * FROM events";

    $buscar_query = mysqli_query($conn, $buscar_usuarios);

    $rows = array();
    while ($mostra_query = mysqli_fetch_assoc($buscar_query)) {
        $rows[] = $mostra_query;
    }

    header('Content-type: application/json');
    echo json_encode($rows);
    
?>