<?php
 class Conexao{

    private $host = 'localhost';
    private $dbname = 'lista_contatos';
    private $user = 'root';
    private $senha = '';

    public function conectar(){
        try{

            $conexao = new PDO(
                "mysql:dbname=lista_contatos;host=$this->host",
                 "$this->user",
                 "$this->senha"
            );

            return $conexao;

        } catch(PDOException $e){
            echo '<p>'.$e->getMessage().'</p>';
        }
    }

}
