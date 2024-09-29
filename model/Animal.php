<?php

include_once 'Conexao.php';

    // ===== Atributos =====
class Animal
{
    private $CodAnimal; // PK
    private $CodRaca; // FK
    private $Nome;
    private $Sexo;
    private $DataNasc;
    private $DataAprox;
    private $Peso;
    private $conn;

    // ===== Getters & Setters =====

    // CodAnimal
    public function getCodAnimal() {
        return $this->CodAnimal;
    }

    public function setCodAnimal($iCodAnimal) {
        $this->cod_livro = $iCodAnimal;
    }

    // CodRaca
    public function getCodRaca() {
        return $this->CodRaca;
    }

    public function setCodRaca($iCodRaca) {
        $this->CodRaca = $iCodRaca;
    }

    // Nome
    public function getNome() {
        return $this->Nome;
    }

    public function setNome($iNome) {
        $this->Nome = $iNome;
    }

    // Sexo
    public function getSexo() {
        return $this->Sexo;
    }

    public function setSexo($iSexo) {
        $this->Sexo = $iSexo;
    }

    // DataNasc
    public function getDataNasc() {
        return $this->DataNasc;
    }

    public function setDataNasc($iDataNasc) {
        $this->DataNasc = $iDataNasc;
    }

    // DataAprox
    public function getDataAprox() {
        return $this->DataAprox;
    }

    public function setDataAprox($iDataAprox) {
        $this->DataAprox = $iDataAprox;
    }

    // Peso
    public function getPeso() {
        return $this->Peso;
    }

    public function setPeso($iPeso) {
        $this->Peso = $iPeso;
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