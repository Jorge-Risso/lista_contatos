<?php
require 'contato.php';
$id = isset($__POST['id']) ? $_POST['id'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if($acao == 'inserir'){
    if(empty($nome) || empty($telefone) || empty($email) ){
        header('location: index.php?inclusao=1');
    } else{
        $contato = new Contato();
        $contato->setNome($nome);
        $contato->setTelefone($telefone);
        $contato->setEmail($email);
        print_r($contato);
        $contato->inserir();
        header('location:index.php?inclusao=2');
    }
    } else if($acao == 'recuperar'){
        $contato = new Contato();
        $contatos = $contato->recuperar();
   
        
    }else if( $acao == 'atualizar'){
        $contato = new Contato();
        $contato->setId($_GET['id']);
        $contato->setNome($nome);
        $contato->setTelefone($telefone);
        $contato->setEmail($email);
        $contato->atualizar($contato->getId());
        header('location: index.php?inclusao=2');

    } else if($acao == 'excluir'){
        $contato = new Contato();
        $contato->setId($_GET['id']);
        $contato->excluir($contato->getId());
        header("index.php");
    }
