<?php
    include "conexao.php";
    /* possível solução para a filtragem de eventos no menu
    $query_events = "SELECT * FROM eventos WHERE title LIKE '%teatro%' OR '%convenções%'";
    $query_events = "SELECT * FROM eventos WHERE title LIKE '%quadra%' OR '%piscina%'";
    $query_events = "SELECT * FROM eventos WHERE title LIKE '%laboratório%';
    */
    /*Cria um statement de exibição do MySQL, realiza uma consulta e insere os dados coletados nessa consulta em um array*/
    $query_events = "SELECT * FROM events";
    $resultado_events = mysqli_query($conn, $query_events);
    $eventos = array();

    while ($row_events = mysqli_fetch_assoc($resultado_events)) 
    {
        array_push($eventos, $row_events);
    }

    mysqli_free_result($resultado_events);
    mysqli_close($conn);
    echo json_encode($eventos);
?>