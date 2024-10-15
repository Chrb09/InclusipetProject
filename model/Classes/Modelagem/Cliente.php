<?php

  class Cliente {

    public $codcliente;
    public $nome;
    public $datanasc;
    public $telefone;
    public $cep;
    public $cpf;
    public $email;
    public $senha;
    public $token;
    public $imagem;

    public function getFullName($cliente) {
      return $cliente->nome;
    }

    public function generateToken() {
      return bin2hex(random_bytes(50));
    }
    
    public function generatePassword($senha) {
      return password_hash($senha, PASSWORD_DEFAULT);
    }

    public function imageGenerateName() {
      return bin2hex(random_bytes(60)) . ".jpg";
    }
  }

  interface ClienteDAOInterface {

    public function buildcliente($data);
    public function create(Cliente $cliente, $authcliente = false);
    public function update(Cliente $cliente, $redirect = true);
    public function verifyToken($protected = false);
    public function setTokenToSession($token, $redirect = true);
    public function authenticatecliente($email, $senha);
    public function findByEmail($email);
    public function findById($codcliente);
    public function findByToken($token);
    public function destroyToken();
    public function changePassword(Cliente $cliente);

  }