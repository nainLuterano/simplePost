<?php

include_once("../../index.php");

template('header', array('titulo' => 'casa'));

if ($Postagem->valid($_POST)){
    $Postagem->create($_POST);
}

$categorias = $Categoria->show();

if(count($categorias) == 0) {
    set_alert('danger', 'Você não tem categorias cadastradas');
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
        <h1>Criar nova postagem</h1>
        <input type="text" name="titulo" placeholder="titulo" class="d-block w-100">
        <select name="categoria" class="form-control mt-2">
            <option value="" select>Categoria</option>
            <?php foreach($categorias as $key => $values): ?>
            <option value="<?php echo $values['id']?>" ><?php echo $values['nome']; ?> </option>
            <?php endforeach; ?>
        </select>
        <textarea name="conteudo" class="d-block w-100 p-2 mt-2" placeholder="Conteúdo" cols="30" rows="10"></textarea>
        <button class="btn btn-info mt-3">Cadastrar</button>
    </form>
</div>


<?php

template('footer');