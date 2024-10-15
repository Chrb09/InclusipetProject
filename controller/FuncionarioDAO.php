<?php
//Iniciando a estutura DAO do funcionário
require_once('../controller/FuncionarioDAO.php'); //Chamando DAO

class FuncionarioDAO implements FuncionarioDAOInterface{
    private $conn;
    private $url;

    public function __construct(PDO $conn, $url) {
      $this->conn = $conn;
      $this->url = $url;
    }

    public function buildfuncionario($data)
    {
        $funcionario = new Funcionario(); //Chamando a classe Funcionario

        $funcionario->CodFuncionario = $data["codfuncionario"];
        $funcionario->CodCargo = $data["codcargo"];
        $funcionario->Senha = $data["senha"];
        $funcionario->Nome = $data["nome"];
        $funcionario->RG = $data["rg"];
        $funcionario->CPF = $data["cpf"];
        $funcionario->Telefone = $data["telefone"];
        $funcionario->CEP = $data["cep"];
        $funcionario->CodUnidade = $data["codunidade"];
        $funcionario->Token = $data["token"];
        $funcionario->Imagem = $data["imagem"];

        return $funcionario;
    }

    public function create(Funcionario $funcionario, $authfuncionario = false) {
      
    }

    public function update(Funcionario $funcionario, $redirect = true) {

    }

    public function verifyToken($protected = false) {

    }

    public function setTokenToSession($token, $redirect = true) {

    }
    

    public function findById($codcliente) {

    }

    public function findByToken($token) {

    }

    public function destroyToken() {

    }

    public function changePassword(Funcionario $funcionario) {
      
    }

}
?>