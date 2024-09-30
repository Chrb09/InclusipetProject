<?php

include_once 'Conexao.php';

    // ===== Atributos =====
class Unidade
{
    private $CodUnidade; // PK
    private $Nome;
    private $Endereco;
    private $Bairro;
    private $Telefone;
    private $HorarioInicial;
    private $HorarioFinal; 
    private $conn;

    // ===== Getters & Setters =====

    // CodUnidade
    public function getCodUnidade() {
        return $this->CodUnidade;
    }

    public function setCodUnidade($iCodUnidade) {
        $this->CodUnidade = $iCodUnidade;
    }

    // Nome
    public function getNome() {
        return $this->Nome;
    }

    public function setNome($iNome) {
        $this->Nome = $iNome;
    }

    // Endereco
    public function getEndereco() {
        return $this->Endereco;
    }

    public function setEndereco($iEndereco) {
        $this->Endereco = $iEndereco;
    }

    // Bairro
    public function getBairro() {
        return $this->Bairro;
    }

    public function setBairro($iBairro) {
        $this->Bairro = $iBairro;
    }

    // Telefone
    public function getTelefone() {
        return $this->Telefone;
    }

    public function setTelefone($iTelefone) {
        $this->Telefone = $iTelefone;
    }

    // HorarioInicial
    public function getHorarioInicial() {
        return $this->HorarioInicial;
    }

    public function setHorarioInicial($iHorarioInicial) {
        $this->HorarioInicial = $iHorarioInicial;
    }

    // HorarioFinal
    public function getHorarioFinal() {
        return $this->HorarioFinal;
    }

    public function setHorarioFinal($iHorarioFinal) {
        $this->HorarioFinal = $iHorarioFinal;
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