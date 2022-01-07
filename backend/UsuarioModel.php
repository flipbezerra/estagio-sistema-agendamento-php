<?php
    /* Realiza o gerenciamento e a validação de usuários no banco de dados */
    class UsuarioModel
    {
        private $conexao;
    
        public function __construct($conexao)
        {          
            $this->conexao = $conexao;
        }

        public function getUsuarioId($id): object
        {
            $query_sql = "SELECT * FROM users WHERE id= '$id'";
            $resultado_sql = mysqli_query($this->conexao, $query_sql) or die(mysqli_error($this->conexao));
            $obj = mysqli_fetch_object($resultado_sql);
            return $obj;
        }

        public function isValid($usuario,$senha)
        {
            $query_sql = "SELECT * FROM users WHERE user='$usuario' AND password='$senha'";
            $resultado_sql = mysqli_query($this->conexao, $query_sql) or die(mysqli_error($this->conexao));
            $obj = mysqli_fetch_object($resultado_sql);
            return $obj;
        }
    }
?>