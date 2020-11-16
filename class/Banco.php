<?php

class Banco {
    private $con;

    function __construct(){
        try {

            $this->con = new PDO('mysql:dbname='.BANCO.';host='.IP,DB,PASS);
        } catch(PDOException $e) {
           
            echo "Connection falied: ".$e->getMessage();
        }
    }

    protected function getConexao() {
        return $this->con;
    }

   protected function select($valores, $banco, $filtro = '') {
        if(strstr($banco, 'join')) {
            $filtro = " on $filtro ";
        } else {
            if($filtro != '') { $filtro = " where $filtro "; }
        }

        $query = $this->getConexao()->prepare("select $valores from $banco $filtro");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }





    function insert($campos, $dados, $banco) {
        try {
            if(!$this->getConexao()->query("insert into $banco ($campos) values($dados)")) {
                throw new Exception('Error na query');
            }
            return true;
        } catch(Exception $e) {
            echo $e->getMessage();
            return false;
        }

    }

    function delete($tabela, $id) {
        try {
            if(!$this->getConexao()->query("delete from $tabela where id = $id")) {
                throw new Exception('Error na query');
            }
            return true;
        } catch(Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }


    function up($campos,$banco, $id) {
        try {
            if(!$this->getConexao()->query("update $banco set $campos where $id")) {
                throw new Exception('Error na query');
            }
            return true;
        } catch(Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }



    function __destroy() {
        $this->con = null;
    }
}