<?php
    /* Iniciando sessão */
    session_start();
    
    include_once "conexao.php";
    
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if ($dados['status']==1) {
        $cor = '#00D100';
    } else {
        $cor = '#FFD700';
    }
            
    $query = "UPDATE events SET color=?, status=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sii", $cor, $dados['status'], $dados['id']);

    if ($stmt->execute()) 
    {
        $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Evento editado com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'];
        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento editado com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    } else 
    {
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-success" role="alert">Erro ao editar evento. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'];
    }
    
    header('Content-Type: application/json');
    echo json_encode($retorna);
?>