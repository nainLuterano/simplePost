<?php
 require_once('../../index.php');

 if(isset($_GET['titulo']) ) {
     if ( isset($_GET['page'])) {
        $listaPostagens= $Postagem->getToTitulo($_GET['titulo'], $_GET['page']);
     } else {
        $listaPostagens= $Postagem->getToTitulo($_GET['titulo']);
     }

 } else {
     if( isset($_GET['page'])) {
        $listaPostagens = $Postagem->pagination(intval($_GET['page']));
     } else {
        $listaPostagens = $Postagem->pagination();
     }

 }
?>


<?php template('header'); ?>



<div class="container mt-5 pt-5">
    <?php if(count($listaPostagens) > 0): ?>    
        <div class="row">
            <?php foreach($listaPostagens as $key => $postagem): ?>
    
                <div class="col-4 mb-4">
                    <div class="postagem p-3">
                        <div class="h4 d-block titulo"><?php echo $postagem['titulo'];?></div>
                        <div class="categoria h6 d-block"><?php echo $postagem['categoria'];?></div>
                        <p class="mt-2 h6">
                        <?php echo limit_conteudo($postagem['conteudo']);?>
                        </p>
                        <div class="d-flex justify-content-between">

                            <button class="btn btn-info"><?php edit_link("postagem", $postagem['id']); ?></button>
                            <button class="btn btn-danger"><?php delete_link("postagem",$postagem['id']); ?></button>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>
        </div>

    <?php $total = ceil($listaPostagens[0]['total_registro'] / 9);?>

    <?php if( $total > 1): ?>
        <div class="w-100 d-flex justify-content-center">
            <nav aria-label="Page navigation ml-auto mr-auto d-block">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="<?php echo listar_link('postagem',page_prev());?>">Previous</a></li>
                    <?php for($inicio = 0;$inicio < $total;): ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo listar_link('postagem',++$inicio ); ?>">
                                <?php echo $inicio;?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <li class="page-item"><a class="page-link" href="<?php echo listar_link('postagem',page_next($total));?>">Next</a></li>
                </ul>
            </nav>
        </div>
    <?php endif;?>

    <?php else: ?>
        <h1 class="text-center">Vamos Postar! :)</h1>
    <?php endif; ?>
</div>


<?php template('footer'); ?>