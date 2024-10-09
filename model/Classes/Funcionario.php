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

  public function __construct($CodFuncionario, $CodCargo, $Nome, $RG, $image = null, $bio = null) {
    $this->CodFuncionario = $CodFuncionario;
    $this->CodCargo = $CodCargo;
    $this->Nome = $Nome;
    $this->RG = $RG;
    $this->image = $image;
    $this->bio = $bio;
}

  public function generateToken() {
    return bin2hex(random_bytes(50));
  }
  
  public function generateSenha($senha) {
    return password_hash($senha, PASSWORD_DEFAULT);
}

public function imageGenerateName() { 
  return bin2hex(random_bytes(60)) . ".jpg"; 
}

  //Getters -->:
   public function getCodFuncionario() {
    return $this->CodFuncionario;
   }

   public function getCodCargo(){
    return $this->CodCargo;
   }

   public function getSenha(){
    return $this->Senha;
   }

   public function getRG(){
    return $this->RG;
   }

   public function getImage(){
     return $this->image;
   }

   public function getToken(){
    return $this->token;
   }

   //Setters em andamento ...

}

interface FuncionarioDAOInterface {
  public function buildFuncionario($data);                       // TODO Construir um objeto funcionário a partir de um objeto 
  
  public function create(Funcionario $funcionario, $authFuncionario = false); //Cria um novo funcionário no sistema
  
  public function update(Funcionario $funcionario, $redirect = true);         //Atualiza as informações de um funcionário existente 
  
  public function verifyToken($protected = false);                   // Verifica a validade de um token de autenticação
  
  public function setTokenToSession($token, $redirect = true);      //Armazena um token de autenticação na sessão do usuário.
  
  public function authenticateFuncionario($CodFuncionario, $senha); // Autenticar um funcionário utilizando seu código e senha
  
  public function findByCodFuncionario($CodFuncionario);    // Vai buscar um funcionário com base no seu código
  
  public function findById($CodFuncionario);                // Buscar um funcionário com base no seu ID ou código
  
  public function findByToken($token);                      //Buscar um funcionário com base no seu token de autenticação
  
  public function destroyToken();                           // Destruir/excluir um token de autenticação atual
  
  public function changeSenha(Funcionario $funcionario);    //Alterar a senha de um funcionário

}
