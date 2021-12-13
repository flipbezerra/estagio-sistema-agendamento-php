<?php

    include "conexao.php";
    include "UsuarioModel.php";

    session_start();

    if(isset($_SESSION['usuario'])){
        header("Location: ../pages/admin");
    }

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $usuarioModel = new UsuarioModel($conn);
    $user = $usuarioModel->isValid($usuario,$senha);

    if($user){
        $usuario = ['id'=>$user->id,'usuario'=>$user->usuario];
        $_SESSION['usuario'] = $usuario;
        header("Location: ../pages/admin");
    }else{
        header('Location: ../login.php?erro=1');
    }      

?>