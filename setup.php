<?php

define('URL', "localhost");
define('IP','127.0.0.1');
define('BANCO','');//banco 
define('DB','');//usuário do banco de dados
define('PASS','');//senha do banco de dados
define('HAST','9BFD9E9A21FAC2ADC6A57E93875DAEA8');

try {

    $conexao = new PDO('mysql:dbname='.BANCO.';host='.IP,DB,PASS);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("create table  if not exists categoria(
        id bigint AUTO_INCREMENT ,
        nome varchar(25),
        PRIMARY KEY(id)
    )");
    
    
    
    $conexao->exec("create table if not exists postagem(
        id bigint AUTO_INCREMENT ,
        categoria_id bigint,
        titulo varchar(100) not null,
        conteudo text not null,
        PRIMARY KEY(id),
        CONSTRAINT fk_Post_Categoria foreign key(id) references categoria(id)
    )");


    $conexao->exec("create table if not exists usuario(
        id bigint  AUTO_INCREMENT,
        nome varchar(100) not null,
        nick varchar(100) not null,
        password varchar(255) not null,
        PRIMARY KEY(id)
    )");


    $conexao->exec(
        "insert usuario(nome,nick,password) values('fernando','nick','".crypt(123,  HAST)."')"
    );
    

} catch(PDOException $e) {
    echo "Connection falied: ".$e->getMessage();
}


