<?php
    include "conexao.php";
<<<<<<< HEAD
    //possível solução para a filtragem de eventos
    //SELECT * FROM items WHERE items.xml LIKE '%123456%'
=======
    
>>>>>>> 36fd29b403d3d6ff8decc3d1140d9c2182d0c74e
    $json = array();
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