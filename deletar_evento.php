<?php
/**
* @author Cesar Szpak - Celke - cesar@celke.com.br
* @pagina desenvolvida usando FullCalendar e Bootstrap 4,
* o código é aberto e o uso é free,
* porém lembre-se de conceder os créditos ao desenvolvedor.
*/
session_start();

include_once 'conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)) {
    $query_event = "DELETE FROM events WHERE id=:id";
    $delete_event = $conn->prepare($query_event);
    $delete_event->bindParam('id', $id);
    if($delete_event->execute()) {
        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Envento deletado com sucesso!</div>';
        header("Location: index.php");
    } else {
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Envento não deletado!</div>';
        header("Location: index.php");
    }
} else {
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Envento não deletado!</div>';
    header("Location: index.php");
}
