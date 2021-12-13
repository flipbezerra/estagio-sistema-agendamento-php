<?php
    session_start();
    include_once "conexao.php";
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    /* Conversão - data/hora do formato brasileiro para o formato do Banco de Dados */
    $data_start_conv = date("Y-m-d H:i:s", strtotime($dados['start']));
    $data_end_conv = date("Y-m-d H:i:s", strtotime($dados['end']));

    $query = "INSERT INTO events (title, color, start, end, dataCadastro) VALUES (?, ?, ?, ?, now())";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $dados['title'], $dados['color'], $data_start_conv, $data_end_conv);

    if ($stmt->execute()) {
        $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Evento criado com sucesso!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'];
        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento criado com sucesso!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    } else {
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-success" role="alert">Erro na criação do evento.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'];
    }

    header('Content-Type: application/json');
    echo json_encode($retorna);
?>