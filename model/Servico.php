<?php

include_once 'Conexao.php';

    // ===== Atributos =====
class Servico
{
    private $CodServico; // PK
    private $Descricao;
    private $conn;

    // ===== Getters & Setters =====

    // CodServico
    public function getCodServico() {
        return $this->CodServico;
    }

    public function setCodServico($iCodServico) {
        $this->CodServico = $iCodServico;
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