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
    public $token; // TODO adicionar no banco de dados

    public function getFullName($nome) {
      return $cliente -> Nome; 
    }

    public function generateToken() {
      return bin2hex(random_bytes(50));
    }
    
    public function generatePassword($senha) {
      return senha_hash($senha, PASSWORD_DEFAULT);
    }

    // public function imageGenerateName() { return bin2hex(random_bytes(60)) . ".jpg"; }

  }

  interface ClienteDAOInterface {

    public function buildUser($data);
    public function create(User $user, $authUser = false);
    public function update(User $user, $redirect = true);
    public function verifyToken($protected = false);
    public function setTokenToSession($token, $redirect = true);
    public function authenticateUser($email, $password);
    public function findByEmail($email);
    public function findById($id);
    public function findByToken($token);
    public function destroyToken();
    public function changePassword(User $user);

  }