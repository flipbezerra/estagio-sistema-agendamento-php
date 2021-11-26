<?php
/*  //funcional
    require_once "conexao.php";

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
*/

    include 'conexao.php';

    $query_events = "SELECT id, title, color, start, end FROM events";
    $resultado_events = $conn->prepare($query_events);
    $resultado_events->execute();

    $eventos = [];

    while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
        $id = $row_events['id'];
        $title = $row_events['title'];
        $color = $row_events['color'];
        $start = $row_events['start'];
        $end = $row_events['end'];
        
        $eventos[] = [
            'id' => $id, 
            'title' => $title, 
            'color' => $color, 
            'start' => $start, 
            'end' => $end, 
            ];
    }

    echo json_encode($eventos);

?>