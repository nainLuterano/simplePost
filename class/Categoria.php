<?php 


    class Categoria extends Banco {
        private static $dados_form = ['nome'];
        use DadosFormat;
         function create($nome) {

            if ($this->insert('nome',"'$nome'", 'categoria')) {
                set_alert('success', 'Cadastro realizado com sucesso!');
            } else {
                set_alert('danger', 'Error no cadastro, tente mais tarde!');
            }
        }

        function show() {
            return $this->select('id,nome','categoria');    
        }

        function getToId($id) {
            return $this->select('id,nome',  'categoria', "$id = id");
        }

        function pagination($limit = 1) {
            $limit = ($limit - 1) * 9;
            return $this->select(
                'id,nome, (select count(*) from categoria) as total_registro',
                'categoria',
                "1 limit $limit,9");
        }


    function update($dados) {
        $id = $dados['id'];
        unset($dados['id']);

        if ($this->up($this->formatArrayToUpdate($dados),"categoria","id=".$id)) {
            set_alert('success','Atualização feita com sucesso!');
        } else {
            set_alert('danger','Error na atualização!');
        }
    }

    function destroy($id){
        self::delete('categoria',$id);

    }

        function valid($dados){
            if($this->some_fields_empty($dados)) {
                set_alert('danger', "Preencha o campo!");
                return false;
            }
            return self::validate($dados, self::$dados_form);
        }

    }