<?php

    session_start();

    include_once "conexao.php";

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    /* Conversão - data/hora do formato brasileiro para o formato do Banco de Dados */
    $data_start = str_replace('/', '-', $dados['start']);
    $data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

    $data_end = str_replace('/', '-', $dados['end']);
    $data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));
    /* fim conversão */

    $query = "UPDATE events SET title=?, color=?, start=?, end=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $dados['title'], $dados['color'], $data_start_conv, $data_end_conv, $dados['id']);

    if ($stmt->execute()) {
        $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Evento editado com sucesso!</div>'];
        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento editado com sucesso!</div>';
    } else {
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Evento não foi editado!</div>'];
    }

    header('Content-Type: application/json');
    echo json_encode($retorna);

/*  /* em andamento */
    $id = $_POST['id'];
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $sqlUpdate = "UPDATE events SET title='".$title."', start='".$start."', end='".$end."' WHERE id=" . $id;
    mysqli_query($conn, $sqlUpdate)
    mysqli_close($conn);

    
    exemplo
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
*/

?>