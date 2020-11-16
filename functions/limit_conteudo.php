<?php

function limit_conteudo($conteudo) {
    if(strlen($conteudo) > 100 ) {
        return substr($conteudo, 0 ,100 ) . '...';
    } else {
        return $conteudo;
    }
}