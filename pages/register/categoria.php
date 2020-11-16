<?php

include_once("../../index.php");

template('header', array('titulo' => 'casa'));

if ($Categoria->valid($_POST)){
    $Categoria->create($_POST['nome']);
}


?>

<style>
.postagem{
    border: 1px solid rgba(0,0,0,0.1);
    height: 250px; 
}
</style>


<div class="container mt-5">
    <form action="" method="post">
        <?php alert(); ?>
        <h1>Cadastro de categoria</h1>
        <input type="text" name="nome" placeholder="Nome da categoria" class="d-block w-100">
        <button class="btn btn-info mt-3">Cadastrar</button>
    </form>
</div>


<?php

template('footer');