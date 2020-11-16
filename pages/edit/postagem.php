<?php
    require_once('../../index.php');
    template('header');
    if ($Postagem->valid($_POST)){
        $_POST['id'] = $_GET['id'];
        $_POST['categoria_id'] = $_POST['categoria'];
        unset($_POST['categoria']);
        $Postagem->update($_POST);
    }


?>

<div class="container mt-5">
    <?php foreach($Postagem->getToId($_GET['id']) as $key => $postagem): ?>
        <form method="post" action="">
            <?php alert(); ?>
            <h2>Atualizar Postagem</h2>
            <input type="text" placeholder="titulo" name="titulo" class="d-block form-control" value="<?php echo $postagem['titulo']; ?>">
            <select name="categoria" class="d-block form-control mt-2 mb-2">
                <?php foreach($Categoria->show() as $key => $cat ): ?>
                    <option value="<?php echo $cat['id']; ?>" <?php if($cat['id'] == $postagem['categoria_id']) { echo "selected"; } ?>>
                        <?php echo $cat['nome']; ?>
                    </option>
                <?php endforeach;?>
            </select>
            <textarea name="conteudo" class="form-control" cols="30" rows="10"><?php echo $postagem['conteudo']; ?></textarea>
            <button class="btn btn-info mt-4">Atualizar</button>
        </form>

    <?php endforeach; ?>

</div>

<?php

    template('footer');