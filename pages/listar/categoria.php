<?php
 require_once('../../index.php');




if ( isset($_GET['page'])) {
    $listaCategoria = $Categoria->pagination(intval($_GET['page']));
} else {
    $listaCategoria = $Categoria->pagination();
}


 if ( count($listaCategoria) > 0 ) {
     $total_registro = ceil($listaCategoria[0]['total_registro']/9);
 }
?>


<?php template('header'); ?>


<div class="container mt-5 pt-5">
    <div class="row">
    <?php if(count($listaCategoria) > 0): ?>
        <?php foreach($listaCategoria as $key => $categoria): ?>
   
            <div class="col-4 mb-4">
                <div class="postagem p-3">
                    <div class="h4 d-block titulo"><?php echo $categoria['nome'];?></div>
                    <div class="d-flex justify-content-between">

                        <button class="btn btn-info"><?php edit_link("categoria", $categoria['id']); ?></button>
                        <button class="btn btn-danger"><?php delete_link("categoria",$categoria['id']); ?></button>
                    </div>
                </div>
            </div>

    <?php endforeach; ?>
    </div>
            <?php if( $total_registro > 1): ?>
        <div class="w-100 d-flex justify-content-center">
            <nav aria-label="Page navigation ml-auto mr-auto d-block">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="<?php echo listar_link('categoria',page_prev());?>">Previous</a></li>
                    <?php for($inicio = 0;$inicio < $total_registro;): ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo listar_link('categoria',++$inicio ); ?>">
                                <?php echo $inicio;?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <li class="page-item"><a class="page-link" href="<?php echo listar_link('categoria',page_next($total_registro));?>">Next</a></li>
                </ul>
            </nav>
        </div>
    <?php endif;?>
    <?php else: ?>
        <h1 class="text-center">Adicione Categoria</h1>
    <?php endif; ?>
</div>


<?php template('footer'); ?>