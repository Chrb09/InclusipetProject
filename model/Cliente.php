<?php

include_once 'Conexao.php';

    // ===== Atributos =====
class Cliente
{
    private $CodCliente; // PK
    private $Nome;
    private $DataNasc;
    private $Telefone;
    private $CEP;
    private $CPF;
    private $Email; 
    private $Senha; 
    private $conn;

    // ===== Getters & Setters =====

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

    // DataNasc
    public function getDataNasc() {
        return $this->DataNasc;
    }

    public function setDataNasc($iDataNasc) {
        $this->DataNasc = $iDataNasc;
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

    // CPF
    public function getCPF() {
        return $this->CPF;
    }

    public function setCPF($iCPF) {
        $this->CPF = $iCPF;
    }

    // Email
    public function getEmail() {
        return $this->Email;
    }

    public function setEmail($iEmail) {
        $this->Email = $iEmail;
    }

    // Senha
    public function getSenha() {
        return $this->Senha;
    }

    public function setSenha($iSenha) {
        $this->Senha = $iSenha;
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