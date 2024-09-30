<?php

include_once 'Conexao.php';

    // ===== Atributos =====
class Raca
{
    private $CodRaca; // PK
    private $CodEspecie; // FK
    private $Descricao;
    private $conn;

    // ===== Getters & Setters =====

    // CodRaca 
    public function getCodRaca() {
        return $this->$CodRaca;
    }

    public function setCodRaca($iCodRaca) {
        $this->CodRaca = $iCodRaca;
    }

    // CodEspecie
    public function getCodEspecie() {
        return $this->CodEspecie;
    }

    public function setCodEspecie($iCodEspecie) {
        $this->CodEspecie = $iCodEspecie;
    }

    // Descricao
    public function getDescricao() {
        return $this->Descricao;
    }

    public function setDescricao($iDescricao) {
        $this->Descricao = $iDescricao;
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