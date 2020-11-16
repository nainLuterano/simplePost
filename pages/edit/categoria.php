<?php
    require_once('../../index.php');
    template('header');
    if ($Categoria->valid($_POST)){
        $_POST['id'] = $_GET['id'];
        $Categoria->update($_POST);
    }

    $cat = $Categoria->getToId($_GET['id'])[0];
?>

    <div class="container mt-5">
        <form action="" method="post">
            <?php alert(); ?>
            <h2>Editar Categoria</h2>
            <input type="text" placeholder="categoria" name="nome" class="d-block form-control mt-2 mb-2"  value="<?php echo $cat['nome']; ?>">
            <button class="btn btn-info mt-3">Atualizar</button>
        </form>
    </div>

<?php

    template('footer');