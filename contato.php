<?php
    require 'conexao.php';
    class Contato{
        private $id;
        private $nome;
        private $telefone;
        private $email;
        private $conexao;
            
        public function __construct()
        {
          $con = new conexao();
          $this->conexao = $con->conectar();
        }

        /** Getters e setters**/

        public function setId($id){
            $this->id = $id;
        }
        
        public function getId(){
            return $this->id;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }
        
        public function getNome(){
            return $this->nome;
        }

        public function setTelefone($telefone){
            $this->telefone= $telefone;
        }
        
        public function getTelefone(){
            return $this->Telefone;
        }

        public function setEmail($email){
            $this->email = $email;
        }
        
        public function getEmail(){
            return $this->email;
        }

        public function inserir(){
            $query = "insert into contato(nome, telefone, email) values(?,?,?) ";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindParam(1, $this->nome);
            $stmt->bindParam(2, $this->telefone);
            $stmt->bindParam(3, $this->email);
            $stmt->execute();
        }

        public function recuperaContato(){
            $sql = 'select * from contato where id='.$_GET['id'];
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
    
        public function recuperar(){
            $query = "select * from contato order by nome";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
             return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    
        public function atualizar($id){
            $query = "update contato set nome = ?, telefone = ?,  email = ? where id=?";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindParam(1, $this->nome);
            $stmt->bindParam(2, $this->telefone);
            $stmt->bindParam(3, $this->email);
            $stmt->bindParam(4, $id);
            return $stmt->execute();
        }

        public function excluir($id){
            $query = 'delete from contato where id ='.$id;
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
        }

        

    }
