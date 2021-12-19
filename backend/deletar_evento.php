<?php
    /* Iniciando sessão */
    session_start();

    include_once "conexao.php";
    /*Coleta o id do evento cujo modal foi aberto*/
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if(!empty($id)) 
    {
        /*Cria um statement de exclusão do MySQL, prepara para execução e atribui os parâmetros coletados no formulário corretamente*/
        $query = "DELETE FROM events WHERE id=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        /*Executa o statement de exclusão do MySQL e emite um alerta na tela para função realizada com sucesso ou erro*/
        if($stmt->execute()) 
        {
            $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Solicitação deletada com sucesso!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            header("Location: ../index_aut.php");
        } else {
            $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Solicitação deletada com sucesso!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            header("Location: ../index_aut.php");
        }
    } else {
        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Erro ao deletar solicitação.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        header("Location: ../index_aut.php");
    }
?>