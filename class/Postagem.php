<?php


class Postagem extends Banco {
    private static $dados_form = ['titulo','categoria','conteudo'];
    use DadosFormat;

    function create($dados) {

        if($this->insert('titulo,categoria_id,conteudo', $this->array_string_banco($dados), 'postagem')) {
            set_alert('success', 'Postagem cadastrada com sucesso!');
        } else {
            set_alert('danger', 'Error no cadastro da postagem!');
        }
    }

    function show() {
        return $this->select(
            "p.id,titulo, conteudo, c.nome as categoria, 
            (select count(*) from postagem) as total_registro",
            'postagem as p inner join categoria as c ',
            "c.id = p.categoria_id"
        );
    }


    function pagination($limit = 1) {
        $page = ($limit - 1 ) * 9;
        return $this->select(
            'p.id,titulo, conteudo, c.nome as categoria,
            (select count(*) from postagem) as total_registro',
            'postagem as p inner join categoria as c ',
            "c.id = p.categoria_id limit $page,9"
        );
    }

    function update($dados) {
        $id = $dados['id'];
        unset($dados['id']);
        if ($this->up($this->formatArrayToUpdate($dados),"postagem","id=".$id)) {
            set_alert('success','Atualização feita com sucesso!');
        } else {
            set_alert('danger','Error na atualização!');
        }
    }

    function getToId($id) {
        return $this->select('id,titulo, conteudo, categoria_id',  'postagem ', "$id = id ");
    }

    function getToTitulo($titulo, $pagination = 1) {
        $pagination = ($pagination-1) * 9;
        $resultado = $this->select(
        'p.id,titulo, conteudo, c.nome as categoria',
        'postagem as p inner join  categoria as c',
        " titulo like '%$titulo%' and c.id = p.categoria_id limit $pagination,9");


        $total = $this->select(
            'count(*) total_registro',
            'postagem as p inner join  categoria as c',
            " titulo like '%$titulo%' and c.id = p.categoria_id")[0]['total_registro'];

            foreach($resultado as $key => $value) {
                $resultado[$key]['total_registro'] = $total;
            }
    
        return $resultado;

    }

    function destroy($id) {
        self::delete('postagem',$id);
    }
    
    function valid($dados){
        if($this->some_fields_empty($dados)) {
            set_alert('danger', "Preencha todos os campos!");
            return false;
        }
        return self::validate($dados, self::$dados_form);
    }
}