<?php

  class Cliente {
    public $CodCliente; // PK
    public $Nome;
    public $DataNasc;
    public $Telefone;
    public $CEP;
    public $CPF;
    public $Email;
    public $Senha;
    public $Imagem;
    public $Token; 

    public function getFullName($nome) {
      return $cliente -> Nome; 
    }

    public function generateToken() {
      return bin2hex(random_bytes(50));
    }
    
    public function generateSenha($senha) {
      return senha_hash($senha, SENHA_DEFAULT);
    }

    public function imageGenerateName() { 
      return bin2hex(random_bytes(60)) . ".jpg"; 
    }
  }

  interface ClienteDAOInterface {

    public function buildCliente($data);
    public function create(Cliente $cliente, $authCliente = false);
    public function update(Cliente $cliente, $redirect = true);
    public function verifyToken($protected = false);
    public function setTokenToSession($token, $redirect = true);
    public function authenticateCliente($email, $senha);
    public function findByEmail($email);
    public function findByCodCliente($codCliente);
    public function findByToken($token);
    public function destroyToken();
    public function changePassword(Cliente $Cliente);

  }