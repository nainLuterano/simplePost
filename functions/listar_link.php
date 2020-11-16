<?php

    function listar_link($link, $page){
        $titulo = '';
        if ( isset($_GET['titulo'])) {
            $titulo = "titulo=".$_GET['titulo']."&";
        }


        $page = "page=$page";


        return  "/pages/listar/$link.php?$titulo$page";


    }