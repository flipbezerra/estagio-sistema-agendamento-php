<?php
    session_start();

    include_once 'conexao.php';

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

<<<<<<< HEAD
if (!empty($id)) {
    $query_event = "DELETE FROM events WHERE id=:id";
    $delete_event = $conn->prepare($query_event);
    $delete_event->bindParam('id', $id);
    if ($delete_event->execute()) {
        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento deletado com sucesso!</div>';
        header("Location: index.php");
=======
    if(!empty($id)) {
        $query_event = "DELETE FROM events WHERE id=:id";
        $delete_event = $conn->prepare($query_event);
        $delete_event->bindParam('id', $id);
        if($delete_event->execute()) {
            $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento deletado com sucesso!</div>';
            header("Location: .");
        } else {
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Evento não deletado!</div>';
            header("Location: .");
        }
>>>>>>> 4a85b48d92b7e76add88155730050076a8e589cc
    } else {
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Evento não deletado!</div>';
        header("Location: .");
    }
<<<<<<< HEAD
} else {
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Evento não deletado!</div>';
    header("Location: index.php");
}
=======
>>>>>>> 4a85b48d92b7e76add88155730050076a8e589cc
?>