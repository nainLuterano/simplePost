<?php

class Usuario extends Banco{
    use DadosFormat;
    private const HAST = '9BFD9E9A21FAC2ADC6A57E93875DAEA8';
    private static $dados_form = ['nick','password'];


    function logar($dados){
        $nick = $dados['nick'];
        $password = crypt($dados['password'],  self::HAST);
        $resultado = parent::select('id, nome','usuario'," nick = '$nick' and password = '$password' ");
        if($resultado) {
            setcookie('_id',$this->criptCookie($resultado[0]['id']));
            header('Location: /pages/listar/postagem.php');
        } else {
            set_alert('danger', "Usuário não existe");
        }
    }


    function validId($id){
        $id= $this->descriptCookie($id);
        $resultado = parent:: select('id','usuario'," id=$id");
        if( $resultado ){
            return true;
        } else {
            return false;
        }
    }


    function valid($dados){
        if($this->some_fields_empty($dados)) {
            set_alert('danger', "Preencha todos os campos!");
            return false;
        }
        return self::validate($dados, self::$dados_form);
    }

}