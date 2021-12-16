<?php
    /* Iniciando sessão */
    session_start();

    include_once "conexao.php";
    
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if(!empty($id)) 
    {
        $query = "DELETE FROM events WHERE id=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);

        if($stmt->execute()) 
        {
            $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento deletado com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            header("Location: ../index_aut.php");
        } else 
        {
            $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento deletado com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            header("Location: ../index_aut.php");
        }
    } else 
    {
        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Erro ao deletar evento. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        header("Location: ../index_aut.php");
    }
?>