<?php

  class Cliente 
  {
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

    public function getFullName() {
      return $this->Nome; 
    }

    public function generateToken() {
      return bin2hex(random_bytes(50));
    }
    
    public function generateSenha($senha) {
      return password_hash($senha, PASSWORD_DEFAULT); // Exemplo de uso do PASSWORD_DEFAULT
    }

    public function imageGenerateName() { 
      return bin2hex(random_bytes(60)) . ".jpg"; 
    }
  }

  interface ClienteDAOInterface {

    public function buildCliente($data);
    public function create(Cliente $cliente, $authCliente = false);  // Cria um novo Cliente no sistema
    public function update(Cliente $cliente, $redirect = true);      // Atualiza as informações de um funcionário existente 
    public function verifyToken($protected = false);    
    public function setTokenToSession($token, $redirect = true);
    public function authenticateCliente($email, $senha);
    public function findByEmail($email);
    public function findByCodCliente($codCliente);
    public function findByToken($token);
    public function destroyToken();
    public function changeSenha(Cliente $Cliente);

  }