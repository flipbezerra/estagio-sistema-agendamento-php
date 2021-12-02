<?php

    session_start();

    include_once 'conexao.php';

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $data_start = str_replace('/', '-', $dados['start']);
    $data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

    $data_end = str_replace('/', '-', $dados['end']);
    $data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));

    $query = "INSERT INTO events (title, color, start, end, dataCadastro) VALUES (?, ?, ?, ?, now())";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $dados['title'], $dados['color'], $data_start_conv, $data_end_conv);

    if ($stmt->execute()) {
        $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Evento salvo com sucesso!</div>'];
        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento salvo com sucesso!</div>';
    } else {
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Evento não foi cadastrado!</div>'];
    }

    header('Content-Type: application/json');
    echo json_encode($retorna);

?>