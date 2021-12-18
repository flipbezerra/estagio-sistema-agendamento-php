<?php
    include "conexao.php";
    //possível solução para a filtragem de eventos
    //SELECT * FROM items WHERE items.xml LIKE '%123456%'
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