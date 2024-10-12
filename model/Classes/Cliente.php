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
    
    public function generateSenha($Senha) {
      return password_hash($Senha, PASSWORD_DEFAULT); // Exemplo de uso do PASSWORD_DEFAULT
    }

    public function imageGenerateName() { 
      return bin2hex(random_bytes(60)) . ".jpg"; 
    }
  }

  interface ClienteDAOInterface 
  {
    public function buildCliente($data);
    public function create(Cliente $cliente, $authCliente = false);  // Cria um novo cliente no sistema
    public function update(Cliente $cliente, $redirect = true);      // Atualiza as informações de um cliente existente 
    public function verifyToken($protected = false);                 // Verifica a validade de um token de autenticação
    public function setTokenToSession($Token, $redirect = true);     // Armazena um token de autenticação na sessão do usuário
    public function authenticateCliente($Email, $Senha);             // Autentica um cliente usando seu código e sua senha
    public function findByEmail($Email);                             // Busca o email do cliente
    public function findByCodCliente($codCliente);                   // Busca o código do cliente
    public function findByToken($Token);                             // Busca o TOKEN
    public function destroyToken();                                  // Deleta o TOKEN
    public function changeSenha(Cliente $cliente);                   // Altera a senha do cliente
  }