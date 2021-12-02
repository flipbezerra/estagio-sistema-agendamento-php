<?php

    session_start();

    include_once 'conexao.php';

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if(!empty($id)) {

        $query = "DELETE FROM events WHERE id=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);

        if($stmt->execute()) {
            $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento deletado com sucesso!</div>';
            header("Location: .");
        } else {
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Evento não deletado!</div>';
            header("Location: .");
        }
    } else {
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Evento não deletado!</div>';
        header("Location: .");
    }
    
?>