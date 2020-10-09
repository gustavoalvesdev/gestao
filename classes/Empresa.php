<?php 

class Empresa {
    private $id;
    private $nomeEmpresa;
    private $nomeFantasia;
    private $telefone;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $uf;
    private $cidade;
    private $cep;
    private $cnpj;
    private $ie;
    private $inscricaoMunicipal;

    public function __construct(){}

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNomeEmpresa() {
        return $this->nomeEmpresa;
    }

    public function setNomeEmpresa($nomeEmpresa) {
        $this->nomeEmpresa = $nomeEmpresa;
    }

    public function getNomeFantasia() {
        return $this->nomeFantasia;
    }

    public function setNomeFantasia($nomeFantasia) {
        $this->nomeFantasia = $nomeFantasia;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function getUf() {
        return $this->uf;
    }

    public function setUf($uf) {
        $this->uf = $uf;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function getCep() {
        return $this->cep;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    } 

    public function getIe() {
        return $this->ie;
    }

    public function setIe($ie) {
        $this->ie = $ie;
    }

    public function getInscricaoMunicipal() {
        return $this->inscricaoMunicipal;
    }

    public function setInscricaoMunicipal($inscricaoMunicipal) {
        $this->inscricaoMunicipal = $inscricaoMunicipal;
    }

    public function __destruct(){}

}
