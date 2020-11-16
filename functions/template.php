<?php

function template($file, $args = false) {
    $file = dirname(__DIR__,1)."/componentes/".$file.'.php';
    if(!file_exists($file)){
        throw new Exception("Arquivo ".$diretorio."${file}.php não existe");
    }

    if (is_array($args)) {
        extract($args);
    }

    ob_start();
    include_once($file);
    $resultado = ob_get_contents();
    ob_clean();
    echo $resultado;
}