<?php

include_once 'Conexao.php';

    // ===== Atributos =====
class Cargo
{
    private $CodCargo; // PK
    private $Descricao;
    private $conn;

    // ===== Getters & Setters =====

    // CodCargo
    public function getCodCargo() {
        return $this->CodCargo;
    }

    public function setCodCargo($iCodCargo) {
        $this->CodCargo = $iCodCargo;
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