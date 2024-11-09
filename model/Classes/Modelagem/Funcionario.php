<?php
class Funcionario
{
  public $codfuncionario;
  public $codcargo;
  public $senha;
  public $nome;
  public $rg;
  public $cpf;
  public $telefone;
  public $cep;
  public $codunidade;
  public $token;
  public $imagem;
  public $dataAdmissao;

  public function getFullName($funcionario)
  {
    return $funcionario->nome;
  }

  public function generateToken()
  {
    return bin2hex(random_bytes(50));
  }

  public function generatePassword($senha)
  {
    return password_hash($senha, PASSWORD_DEFAULT);
  }

  public function imageGenerateName()
  {
    return bin2hex(random_bytes(60)) . ".jpg";
  }
}
interface FuncionarioDAOInterface
{
  public function buildfuncionario($data);
  public function create(Funcionario $funcionario, $authfuncionario = false, $senha);
  public function update(Funcionario $funcionario, $redirect = true);
  public function verifyToken($protected = false);
  public function setTokenToSession($token, $redirect = true);
  public function authenticateFuncionario($codfuncionario, $senha);
  public function findById($codfuncionario);
  public function findByCPF($cpf);
  public function findByRG($rg);
  public function findByToken($token);
  public function destroyToken();
  public function changePassword(Funcionario $funcionario);
  public function getUnidadeByCod($codunidade);
  public function getCargoByCod($codcargo);
  public function getAllFuncionario();
  public function getAllCargo();
  public function getAllUnidade();

}


?>