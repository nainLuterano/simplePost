<?php 

if($Usuario->valid($_POST)) {
    $Usuario->logar($_POST);
}



?>


<!DOCTYPE html>
<html lang="pt-br" style="height:100%;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="d-flex h-100 flex-column justify-content-center">
<style>
    body{
        height: 100%;
    }

    .login {
        flex: 1;
        border: 1px solid rgba(0,0,0,0.15);
    }
</style>


    <div class="d-block ml-auto mr-auto mb-5">
        <form class="mt-5 login p-4" action="" method="post">
            <?php alert(); ?>
            <h2 class="mb-3">Login</h2>
            <input type="text" name="nick" placeholder="Nick" class="form-control">
            <input type="password" name="password"  placeholder="password" class="form-control mt-4 mb-4">
            <button class="btn btn-info">Logar</button>
        </form>
    </div>
    
</body>
</html>