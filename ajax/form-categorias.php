<?php 

require_once 'forms-config.php';

$nome = $_POST['nome'];
if($nome == ''){
    $data['sucesso'] = false;
    $data['mensagem'] = 'O campo nome não pode ficar vazio!';
}else{
    $verificar = MySql::conectar()->prepare('SELECT * FROM `tb_site.categorias` WHERE nome = ?');
    $verificar->execute(array($_POST['nome']));
    if ($verificar->rowCount() == 0) {
        $slug = Painel::generateSlug($nome);
        $arr = ['nome' => $nome, 'slug' => $slug, 'order_id' => '0', 'nome_tabela' => 'tb_site.categorias'];
        Painel::insert($arr);
        $data['mensagem'] = 'O cadastro da categoria foi realizado com sucesso!';
    } else {
        $data['sucesso'] = false;
        $data['mensagem'] = 'Já existe uma categoria com este nome!';
    }
}

die(json_encode($data));
