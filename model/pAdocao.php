<?php

include_once 'Conexao.php';

    // ===== Atributos =====
class Adocao
{
    private $CodAdocao; // PK
    private $CodEspecie; // FK
    private $CodCliente; // FK
    private $Nome;
    private $Idade;
    private $Porte;
    private $Castrado;
    private $Sexo;
    private $Descricao;
    private $Detalhes;
    private $Telefone;
    private $Endereco;
    private $conn;

    // ===== Getters & Setters =====

    // CodAdocao
    public function getCodAdocao() {
        return $this->CodAdocao;
    }

    public function setCodAdocao($iCodAdocao) {
        $this->CodAdocao = $iCodAdocao;
    }

    // CodEspecie
    public function getCodEspecie() {
        return $this->CodEspecie;
    }

    public function setCodEspecie($iCodEspecie) {
        $this->CodEspecie = $iCodEspecie;
    }

    // CodCliente
    public function getCodCliente() {
        return $this->CodCliente;
    }

    public function setCodCliente($iCodCliente) {
        $this->CodCliente = $iCodCliente;
    }

    // Nome
    public function getNome() {
        return $this->Nome;
    }

    public function setNome($iNome) {
        $this->Nome = $iNome;
    }

    // Idade
    public function getIdade() {
        return $this->Idade;
    }

    public function setIdade($iIdade) {
        $this->Idade = $iIdade;
    }

    // Porte
    public function getPorte() {
        return $this->Porte;
    }

    public function setPorte($iPorte) {
        $this->Porte = $iPorte;
    }

    // Castrado
    public function getCastrado() {
        return $this->Castrado;
    }

    public function setCastrado($iCastrado) {
        $this->Castrado = $iCastrado;
    }

    // Sexo
    public function getSexo() {
        return $this->Sexo;
    }

    public function setSexo($iSexo) {
        $this->Sexo = $iSexo;
    }

    // Descricao
    public function getDescricao() {
        return $this->Descricao;
    }

    public function setDescricao($iDescricao) {
        $this->Descricao = $iDescricao;
    }

    // Detalhes
    public function getDetalhes() {
        return $this->Detalhes;
    }

    public function setDetalhes($iDetalhes) {
        $this->Detalhes = $iDetalhes;
    }

    // Telefone
    public function getTelefone() {
        return $this->Telefone;
    }

    public function setTelefone($iTelefone) {
        $this->Telefone = $iTelefone;
    }

    // Endereco
    public function getEndereco() {
        return $this->Endereco;
    }

    public function setEndereco($iEndereco) {
        $this->Endereco = $iEndereco;
    }

    // ===== Métodos =====
    function create() {
        // TODO
    }

    function read() {
        // TODO
    }

    public function update() {
        // TODO
    }

    public function delete() {
        // TODO
    }
}

?>