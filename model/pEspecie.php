<?php

include_once 'Conexao.php';

    // ===== Atributos =====
class Especie
{
    private $CodEspecie; // PK
    private $Descricao;
    private $conn;

    // ===== Getters & Setters =====

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