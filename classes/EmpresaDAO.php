<?php 

class EmpresaDAO {

    private $conn;

    public function __construct() {
        $this->conn = MySql::conectar();
    }

    public function addEmpresa($empresa) {
        $nomeEmpresa = $empresa->getNomeEmpresa();
        $nomeFantasia = $empresa->getNomeFantasia();
        $telefone = $empresa->getTelefone();
        $endereco = $empresa->getEndereco();
        $numero = $empresa->getNumero();
        $complemento = $empresa->getComplemento();
        $bairro = $empresa->getBairro();
        $uf = $empresa->getUf();
        $cidade = $empresa->getCidade();
        $cep = $empresa->getCep();
        $cnpj = $empresa->getCnpj();
        $ie = $empresa->getIe();
        $inscricaoMunicipal = $empresa->getInscricaoMunicipal();

        $sql = $this->conn->prepare('INSERT INTO empresa (nome_empresa, nome_fantasia, telefone, endereco, numero, complemento, bairro, uf, cidade, cep, cnpj, ie, inscricao_municipal) VALUES(:nome_empresa, :nome_fantasia, :telefone, :endereco, :numero, :complemento, :bairro, :uf, :cidade, :cep, :cnpj, :ie, :inscricao_municipal)'); 

        $sql->bindValue(':nome_empresa', $nomeEmpresa);
        $sql->bindValue(':nome_fantasia', $nomeFantasia);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':endereco', $endereco);
        $sql->bindValue(':numero', $numero);
        $sql->bindValue(':complemento', $complemento);
        $sql->bindValue(':bairro', $bairro);
        $sql->bindValue(':uf', $uf);
        $sql->bindValue(':cidade', $cidade);
        $sql->bindValue(':cep', $cep);
        $sql->bindValue(':cnpj', $cnpj);
        $sql->bindValue(':ie', $ie);
        $sql->bindValue(':inscricao_municipal', $inscricaoMunicipal);

        return $sql->execute();

    }

}
