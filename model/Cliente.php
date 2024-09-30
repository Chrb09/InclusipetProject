<?php

class Cliente {
    private $CodCliente; // PK
    private $Nome;
    private $DataNasc;
    private $Telefone;
    private $CEP;
    private $CPF;
    private $Email; 
    private $Senha; 
    public  $token;

    // ===== Getters & Setters =====
    public function getCodCliente() {
        return $this->CodCliente;
    }

    public function setCodCliente($iCodCliente) {
        $this->CodCliente = $iCodCliente;
    }

    public function getNome() {
        return $this->Nome;
    }

    public function setNome($iNome) {
        $this->Nome = $iNome;
    }

    public function getDataNasc() {
        return $this->DataNasc;
    }

    public function setDataNasc($iDataNasc) {
        $this->DataNasc = $iDataNasc;
    }

    public function getTelefone() {
        return $this->Telefone;
    }

    public function setTelefone($iTelefone) {
        $this->Telefone = $iTelefone;
    }

    // O CEP e o CPF não podem ser mudados
    public function getCEP() {
        return $this->CEP;
    }

    public function getCPF() {
        return $this->CPF;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function setEmail($iEmail) {
        $this->Email = $iEmail;
    }

    public function getSenha() {
        return $this->Senha;
    }

    public function setSenha($iSenha) {
        $this->Senha = $iSenha;
    }
    
    // Gera um Token aleatório de 100 caracteres hexadecimais
    public function generateToken() {
      return bin2hex(random_bytes(50));
    }
    
    // Gera o hash da senha recebida como parâmetro
    public function generateSenha($Senha) {
      return password_hash($Senha, PASSWORD_DEFAULT);
    }

    /* public function imageGenerateName() { return bin2hex(random_bytes(60)) . ".jpg"; } */
}

interface ClienteDAOInterface {
    public function buildCliente($data);
    public function create(Cliente $cliente, $authCliente = false);
    public function update(Cliente $cliente, $redirect = true);
    public function verifyToken($protected = false);
    public function setTokenToSession($token, $redirect = true);
    public function authenticateCliente($Email, $Senha);
    public function findByEmail($Email);
    public function findByCodCliente($CodCliente);
    public function findByToken($token);
    public function destroyToken();
    public function changePassword(Cliente $cliente);
}

