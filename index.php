<?php
    $acao = '';
    require 'processa.php';
    $contato = new Contato();
    $contatos = $contato->recuperar();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="estilo.css">
        <title>Agenda de contatos</title>
    </head>
    <body>
        <h1 class="h1">agenda contatos</h1>
        <div id="form2"></div>
        <?php
       if(isset($_GET['inclusao']) && $_GET['inclusao'] ==1 ){ ?>
        <div class="bg-danger pt-2 text-white d-flex justify-content-center">
        <h5>Preencha todos os campos</h5>
        </div>
       <?php } else if(isset($_GET['inclusao']) && $_GET['inclusao'] ==2 ){ ?>
        <div class="bg-success pt-2 text-white d-flex justify-content-center">
        <h5>Contato salvo</h5>
        </div>
       <?php } ?>
        <form action="processa.php?acao=inserir" method="post" class=" mb-5 mt-5">
            <span>Nome do contato:</span>
            <input required minlength="4" type="text" class="form-control" name="nome" placeholder="Ex: Junior">
            <span>Telefone:</span>
            <input required type="number" maxlength="9" class="form-control" name="telefone" placeholder="ex: 9999-9999">
            <span>Email:</span>
            <input required type="email" class="form-control" name="email" placeholder="Ex: email@teste...">
            <input type="submit" class="btn btn-success" value="Cadastrar">
        </form>
    
    <table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</td>
            <th>Telefone</td>
            <th>Email</td>
            <th>Ações</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($contatos as $i=> $contato){?>
            <tr>
                <td ><?= $contato->id ?></td>   
                <td><?= $contato->nome ?></td>
                <td><?= $contato->telefone ?> </td>
                <td> <?= $contato->email ?></td>
                <td> 
                    <a href="editaCadastro.php?acao=editar&id=<?= $contato->id?>"><i class="fas fa-edit fa-lg text-info" ></i></a>
                    <a href="index.php?acao=excluir&id=<?= $contato->id?>"><i class="fas fa-trash-alt fa-lg text-danger"></i></a>
                </td>
            </tr>
        <?php } ?>  
    </tbody>

    </table>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>