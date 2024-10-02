<?php

class Funcionario {
  public $CodFuncionario; // PK
  public $CodCargo; // FK 
  public $Senha;
  public $Nome;
  public $RG;
  public $image;
  public $bio;
  public $token; // TODO adicionar no banco de dados

  //public function getFullName($funcionario) { return $funcionario->name . " " . $funcionario->lastname; }

  public function generateToken() {
    return bin2hex(random_bytes(50));
  }
  
  public function generateSenha($senha) {
    return senha_hash($senha, SENHA_DEFAULT);
  }

  //public function imageGenerateName() { return bin2hex(random_bytes(60)) . ".jpg"; }
}

interface FuncionarioDAOInterface {
  public function buildFuncionario($data);
  public function create(Funcionario $funcionario, $authFuncionario = false);
  public function update(Funcionario $funcionario, $redirect = true);
  public function verifyToken($protected = false);
  public function setTokenToSession($token, $redirect = true);
  public function authenticateFuncionario($CodFuncionario, $senha);
  public function findByCodFuncionario($CodFuncionario);
  public function findById($CodFuncionario);
  public function findByToken($token);
  public function destroyToken();
  public function changeSenha(Funcionario $funcionario);

}
