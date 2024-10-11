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

  interface ClienteDAOInterface 
  {
    public function buildCliente($data);
    public function create(Cliente $cliente, $authCliente = false);  // Cria um novo cliente no sistema
    public function update(Cliente $cliente, $redirect = true);      // Atualiza as informações de um cliente existente 
    public function verifyToken($protected = false);                 // Verifica a validade de um token de autenticação
    public function setTokenToSession($token, $redirect = true);     // Armazena um token de autenticação na sessão do usuário
    public function authenticateCliente($email, $senha);             // Autentica um cliente usando seu código e sua senha
    public function findByEmail($email);                             // Busca o email do cliente
    public function findByCodCliente($codCliente);                   // Busca o código do cliente
    public function findByToken($token);                             // Busca o TOKEN
    public function destroyToken();                                  // Deleta o TOKEN
    public function changeSenha(Cliente $Cliente);                   // Altera a senha do cliente
  }