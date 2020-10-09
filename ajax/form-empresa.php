<?php 

require_once 'forms-config.php';

$nomeEmpresa = $_POST['nome_empresa'];
$nomeFantasia = $_POST['nome_fantasia'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$uf = $_POST['uf'];
$cidade = $_POST['cidade'];
$cep = $_POST['cep'];
$cnpj = $_POST['cnpj'];
$ie = $_POST['ie'];
$inscricaoMunicipal = $_POST['inscricao_municipal'];

$empresa = new Empresa();

$empresa->setNomeEmpresa($nomeEmpresa);
$empresa->setNomeFantasia($nomeFantasia);
$empresa->setTelefone($telefone);
$empresa->setEndereco($endereco);
$empresa->setNumero($numero);
$empresa->setComplemento($complemento);
$empresa->setBairro($bairro);
$empresa->setUf($uf);
$empresa->setCidade($cidade);
$empresa->setCep($cep);
$empresa->setCnpj($cnpj);
$empresa->setIe($ie);
$empresa->setInscricaoMunicipal($inscricaoMunicipal);

$empresaDao = new EmpresaDAO();

if ($empresaDao->addEmpresa($empresa)) {
    $data['mensagem'] = 'Empresa cadastrada com sucesso!';
} else {
    $data['sucesso'] = false;
    $data['mensagem'] = 'Falha ao cadastrar empresa!';
}

die(json_encode($data));
