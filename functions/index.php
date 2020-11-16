<?php

$arquivos = dir(__DIR__);

while($arquivo = $arquivos->read()) {

    if($arquivo != '.' && $arquivo != '..' && $arquivo != 'index.php') {
    
        require_once($arquivo);
        
    }

}



$arquivos->close();
