<?php

trait DadosFormat {
    function validate($dados,$dados_form){



        if( count($dados) == 0) {return false;}

        $validate = 0;
        foreach ($dados as $key => $value) {
            if ( in_array($key, $dados_form)  ) {
                $validate++;
            }
        }

        if($validate != count($dados_form)) {
            set_alert('danger', 'Preencha os campos');
            return false;
        } else {
            return true;
        }

    }

    function some_fields_empty($dados){
        $resultado = false;
        foreach ($dados as $key => $value) {
            if (empty($value)) {
                $resultado = true;
            }
        }
        return $resultado;

    }

    function formatArrayToUpdate($dados) {
        $resultado = '';
        foreach ($dados as $key => $value) {
            $resultado = $resultado . "$key = '$value',"; 
        }
        $resultado = substr($resultado, 0, strlen($resultado)-1 );
        return $resultado;
    }


    function array_string_banco($dados) {
        
        foreach($dados as $key => $values) {
            $dados[$key] = "'$values'";
        }

        return implode(",",$dados);
    }


    function criptCookie($dado) {
        $dado = random_bytes(4). $dado . random_bytes(4);
        return base64_encode($dado);
    }

    function descriptCookie($dado) {
        $dado = base64_decode($dado);
        $dado = substr($dado,4, strlen($dado));
        $dado = substr($dado,0, strlen($dado) - 4);
        return $dado;
    }
}