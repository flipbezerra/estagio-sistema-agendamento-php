<?php
    /* Iniciando conexão com banco de dados */
    include "conexao.php";
    
    include "UsuarioModel.php";
    /* Iniciando sessão */
    session_start();
    /* Verificação de login - se existe o redireciona a página de usuário autenticado */
    if(isset($_SESSION['usuario']))
    {
        header("Location: ../index_aut.php");
    }
    /* Coleta os dados do formulário de login */
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $usuarioModel = new UsuarioModel($conn);
    $user = $usuarioModel->isValid($usuario,$senha);
    /* Tenta realizar uma autenticação utilizando os dados inseridos no formulário login */
    if($user)
    {
        $usuario = ['id'=>$user->id,'usuario'=>$user->usuario];
        $_SESSION['usuario'] = $usuario;
        header("Location: ../index_aut.php");
    }else{
        header('Location: ../login.php?erro=1');
    } 
    /* Encerrando conexão com banco de dados */
    mysqli_close($conn);
?>