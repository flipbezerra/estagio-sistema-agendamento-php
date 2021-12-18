<?php
    class UsuarioModel{
        private $conexao;
        public function __construct($conexao){          
            $this->conexao = $conexao;
        }

        public function getUsuarios(): mysqli_result{
            $sql = "SELECT * FROM usuario";
            $res = mysqli_query($this->conexao, $sql) or die(mysqli_error($this->conexao));
            return $res;
        }

        public function getUsuarioId($id):object{
            $sql = "SELECT * FROM usuario WHERE id= '$id'";
            $res = mysqli_query($this->conexao, $sql) or die(mysqli_error($this->conexao));
            $obj = mysqli_fetch_object($res);
            return $obj;
        }

        public function isValid($usuario,$senha){
            $sql = "SELECT * FROM usuario WHERE usuario='$usuario' AND senha = '$senha'";
            $res = mysqli_query($this->conexao,$sql) or die(mysqli_error($this->conexao));
            $obj = mysqli_fetch_object($res);
            return $obj;
        }
    }
?>