<?php

require_once 'forms-config.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$tipo = $_POST['tipo_cliente'];
$cpf = '';
$cnpj = '';

if ($tipo == 'fisico') {
	$cpf = $_POST['cpf'];
} elseif ($tipo == 'juridico') {
	$cnpj = $_POST['cnpj'];
}

$novaImagem = '';
$imagem = $_POST['imagem'];

if ($nome == '' || $email == '' || $tipo == '') {
	$data['sucesso'] = false;
	$data['mensagem'] = 'Atenção: Campos vazios não são permitidos!';
}

if (isset($_FILES['novaImagem'])) {
	if (Painel::imagemValida($_FILES['novaImagem'])) {	
		$novaImagem = $_FILES['novaImagem'];
	} else {
		$data['sucesso'] = false;
		$data['mensagem'] = 'Você está tentando realizar um upload com imagem inválida';
	}
} else {
	$imagem = $_POST['imagem'];
}

if ($data['sucesso']) {
	// tudo okay, só cadastrar
	if (is_array($novaImagem)) {
		@unlink('../uploads/'.$imagem);
		$imagem = Painel::uploadFile($novaImagem);
    }

	$sql = MySql::conectar()->prepare('UPDATE `tb_admin.clientes` SET nome = :nome, email = :email, tipo = :tipo, cpf_cnpj = :cpf_cnpj, imagem = :imagem WHERE id = :id');
	$sql->bindValue(':nome', $nome);
	$sql->bindValue(':email', $email);
	$sql->bindValue(':tipo', $tipo);
	$dadoFinal = ($cpf == '') ? $cnpj : $cpf;
	$sql->bindValue(':cpf_cnpj', $dadoFinal);
	$sql->bindValue(':imagem', $imagem);
	$sql->bindValue(':id', $id);
	
	if($sql->execute()) {
		$data['mensagem'] = 'Dados do cliente atualizados com sucesso!';
	} else {
		$data['sucesso'] = false;
		$data['mensagem'] = 'Falha ao atualizar dados do cliente!';
	}
}

die(json_encode($data));
