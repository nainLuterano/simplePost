<?php 

require_once('../../index.php');

$Categoria->destroy($_GET['id']);


header('Location: /pages/listar/categoria.php');