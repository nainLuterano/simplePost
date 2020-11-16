<?php

include_once("../../index.php");

template('header');

//register();
?>

<div class="container">

    <form action="." method="post" class="mt-5 d-flex justify-content-between flex-column">
        
        <?php alert(); ?>
        
        <h5 class="font-weight-bold">Cadastrar Postagem</h5>
        <input type="text" name="titulo" placeholder="Título da postagem">
        <input type="text" name="categoria" placeholder="Categoria da postagem" class="mt-2 mb-2">
        <textarea name="descricao"  placeholder="Descrição" cols="30" rows="10" class="mb-3 p-2"></textarea>
        <button class="btn btn-info">Cadastrar</button>
    </form>

</div>