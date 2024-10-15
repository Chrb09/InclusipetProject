<?php
class Funcionario {
  public $CodFuncionario;
  public $CodCargo ;
  public $Senha ;
  public $Nome ;
  public $RG;
  public $CPF ;
  public $Telefone;
  public $CEP;
  public $CodUnidade;
  public $Token;
  public $Imagem ;

  public function getFullName($funcionario) {
    return $funcionario->nome;
  }

  public function generateToken() {
    return bin2hex(random_bytes(50));
  }
  
  public function generatePassword($Senha) {
    return password_hash($Senha, PASSWORD_DEFAULT);
  }

  public function imageGenerateName() {
    return bin2hex(random_bytes(60)) . ".jpg";
  }
}
  interface FuncionarioDAOInterface{
      public function buildfuncionario($data);
      public function create(Funcionario $funcionario , $authfuncionario = false );
      public function update(Funcionario $funcionario , $redirect = true );
      public function verifyToken($protected = false);
      public function setTokenToSession($token, $redirect = true);
      public function findById($codfuncionario);
      public function findByToken($token);
      public function destroyToken();
      public function changePassword(Funcionario $funcionario);

      
  }


?>