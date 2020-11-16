<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postagem</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <style>
     header {
         background-color: #fff;
         border-bottom: 1px solid rgba(0,0,0,0.2);
     }

     header  form {
         height: 35px;
     }

     a{
        color: rgba(0,0,0,0.5);
     }

     a:hover{
        text-decoration: none !important;
        color: rgba(0,0,0,0.5);
     }

    </style>
    <header class=" d-flex justify-content-between container-fluid pt-2 pb-2">
        <h1 class="h4 mt-auto mb-auto">Postagem</h1>

        <nav class="d-flex">
            <div class="dropdown mr-3 ">
                <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Listar
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/pages/listar/postagem.php">Posgagem</a>
                    <a class="dropdown-item" href="/pages/listar/categoria.php">Categoria</a>
                </div>
            </div>

            
            <div class="dropdown mr-4">
                <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cadastrar
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/pages/register/postagem.php">Posgagem</a>
                    <a class="dropdown-item" href="/pages/register/categoria.php">Categoria</a>
                </div>
            </div>
            
            <form action="/pages/listar/postagem.php" method="get" class="d-flex">
                <input type="text" name="titulo" class="form-control" placeholder="titulo da postagem">
                <button class="btn btn-info">Enviar</button>
            </form>
        </nav>
    </header>