<?php

include_once 'Conexao.php';

    // ===== Atributos =====
class Veterinario
{
    private $CodVeterinario; // PK
    private $CodCargo; // FK
    private $Senha;
    private $Nome;
    private $RG;
    private $CPF;
    private $Telefone;
    private $CEP;
    private $CodUnidade; // FK 
    private $conn;

    // ===== Getters & Setters =====

    // CodVeterinario
    public function getCodVeterinario() {
        return $this->CodVeterinario;
    }

    public function setCodVeterinario($iCodVeterinario) {
        $this->CodVeterinario = $iCodVeterinario;
    }

    // CodCargo
    public function getCodCargo() {
        return $this->CodCargo;
    }

    public function setCodCargo($iCodCargo) {
        $this->CodCargo = $iCodCargo;
    }

    // Senha
    public function getSenha() {
        return $this->Senha;
    }

    public function setSenha($iSenha) {
        $this->Senha = $iSenha;
    }

    // Nome
    public function getNome() {
        return $this->Nome;
    }

    public function setNome($iNome) {
        $this->Nome = $iNome;
    }

    // RG
    public function getRG() {
        return $this->RG;
    }

    public function setRG($iRG) {
        $this->RG = $iRG;
    }

    // CPF
    public function getCPF() {
        return $this->CPF;
    }

    public function setCPF($iCPF) {
        $this->CPF = $iCPF;
    }

    // Telefone
    public function getTelefone() {
        return $this->Telefone;
    }

    public function setTelefone($iTelefone) {
        $this->Telefone = $iTelefone;
    }

    // CEP
    public function getCEP() {
        return $this->CEP;
    }

    public function setCEP($iCEP) {
        $this->CEP = $iCEP;
    }

    // CodUnidade
    public function getCodUnidade() {
        return $this->CodUnidade;
    }

    public function setCodUnidade($iCodUnidade) {
        $this->CodUnidade = $iCodUnidade;
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