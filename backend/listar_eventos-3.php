<?php
    /* Iniciando conexão com banco de dados */
    include "conexao.php";
    /*Cria um statement de exibição do MySQL, realiza uma consulta e insere os dados coletados nessa consulta em um array*/
    $query_events = "SELECT * FROM events WHERE title LIKE '%Laboratório%'";
    $resultado_events = mysqli_query($conn, $query_events) or die(mysqli_error($conn));
    $eventos = array();

    while ($row_events = mysqli_fetch_assoc($resultado_events)) 
    {
        array_push($eventos, $row_events);
    }
    
    echo json_encode($eventos);

    /* Encerrando conexão com banco de dados */
    mysqli_free_result($resultado_events);
    mysqli_close($conn);
?>