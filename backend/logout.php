<?php
    /* Iniciando sessão */
    session_start();
    /* Revoga a autenticação de usuário e retorna a página inicial padrão */
    session_unset();
    session_destroy();
    header('Location: ../index.php');
?>