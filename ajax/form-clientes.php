<?php

require_once 'forms-config.php';

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

$imagem = '';

if ($nome == '' || $email == '' || $tipo == '') {
	$data['sucesso'] = false;
	$data['mensagem'] = 'Atenção: Campos vazios não são permitidos!';
}

if (isset($_FILES['imagem'])) {
	if (Painel::imagemValida($_FILES['imagem'])) {	
		$imagem = $_FILES['imagem'];
	} else {
		$data['sucesso'] = false;
		$data['mensagem'] = 'Você está tentando realizar um upload com imagem inválida';
	}
}

if ($data['sucesso']) {
	// tudo okay, só cadastrar
	if (is_array($imagem)) {
		$imagem = Painel::uploadFile($imagem);
	}
	$sql = MySql::conectar()->prepare('INSERT INTO `tb_admin.clientes` VALUES(null, ?, ?, ?, ?, ?)');
	$dadoFinal = ($cpf == '') ? $cnpj : $cpf;
	$sql->execute(array($nome, $email, $tipo, $dadoFinal, $imagem));
	$data['mensagem'] = 'Cliente cadastrado com sucesso!';
}

die(json_encode($data));
