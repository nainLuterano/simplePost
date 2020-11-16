<?php 
 
require_once(dirname(__DIR__).'/estudo/config/index.php');


spl_autoload_register(function($class_name) {
    include_once(dirname(__DIR__).'/estudo/class/'.$class_name . '.php');
});

require_once(dirname(__DIR__)."/estudo/functions/index.php");

$classes = array('Categoria','Postagem','Usuario');

foreach($classes as $key => $value) {
    extract(array(
        $value => new $value
    ));
}


$status = array();

if( $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'] == URL."/index.php") {

    if (isset($_COOKIE['_id'])) {
        if($Usuario->validId($_COOKIE['_id'])) {
            header('Location: /pages/listar/postagem.php');
        } else {
            unsetcookie('_id');
            require_once('./pages/login/login.php');
        }
    } else {
        require_once('./pages/login/login.php');
    }
} else {
    if (isset($_COOKIE['_id'])) {
        if(!$Usuario->validId($_COOKIE['_id'])) {
            header('Location: /');
        } 
    } else {

        header('Location: /');
    }
}

