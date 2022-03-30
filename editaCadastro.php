<?php
    require 'processa.php';
    $contato = new Contato();
    $usuario = $contato->recuperaContato();
    
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
        <title>Editar Contato</title>
    </head>
    <body>
        <h1 class="h1">agenda contatos</h1>
        <form class="" action="processa.php?acao=atualizar&id=<?= $usuario->id ?>" method="post" class=" mb-5 mt-5">
            <span>Nome do contato:</span>
            <input type="text" class="form-control" name="nome" placeholder="Ex: Junior" value="<?= $usuario->nome ?>">
            <span>Telefone:</span>
            <input type="text" maxlength="9" class="form-control" name="telefone" placeholder="ex: 9999-9999" value="<?= $usuario->telefone ?>">
            <span>Email:</span>
            <input type="email" class="form-control" name="email" placeholder="Ex: email@teste..." value="<?= $usuario->email ?>">
            <div class="btn-group mt-4" role="group" aria-label="Basic mixed styles example">
                <button type="submit"  class="btn btn-lg btn-success">Confirmar</button>
                <button type="button" class="btn btn-warning "><a class="btn" href="index.php">Voltar</a></button>
            </div>
        </form>


    </body>
</html>