<?php
//Iniciando a estutura DAO do funcionário
require_once('../../../model/Classes/Modelagem/Funcionario.php');
require_once("../../../model/Classes/Modelagem/Message.php"); //Chamando Message

class FuncionarioDAO implements FuncionarioDAOInterface
{
  private $conn;
  private $url;
  private $message;

  public function __construct(PDO $conn, $url)
  {
    $this->conn = $conn;
    $this->url = $url;
    $this->message = new Message($url);
  }

  public function buildfuncionario($data)
  {
    $funcionario = new Funcionario(); //Chamando a classe Funcionario

    $funcionario->codfuncionario = $data["CodFuncionario"];
    $funcionario->codcargo = $data["CodCargo"];
    $funcionario->senha = $data["Senha"];
    $funcionario->nome = $data["Nome"];
    $funcionario->rg = $data["RG"];
    $funcionario->cpf = $data["CPF"];
    $funcionario->telefone = $data["Telefone"];
    $funcionario->cep = $data["CEP"];
    $funcionario->codunidade = $data["CodUnidade"];
    $funcionario->token = $data["Token"];
    $funcionario->imagem = $data["Imagem"];

    return $funcionario;
  }

  //Função Create
  public function create(Funcionario $funcionario, $authfuncionario = false)
  {
    $stmt = $this->conn->prepare("INSERT INTO funcionarios (CodCargo, Senha, Nome, RG, CPF, Telefone, CEP, CodUnidade, Token, Imagem) 
     VALUES (:CodCargo, :CodCargo, :Senha, :Nome, :RG, :CPF, :Telefone, :CEP, :CodUnidade , :Token)");

    $stmt->execute();
    if ($authfuncionario) {
      $this->setTokenToSession($funcionario->token);
    }

  }

  public function update(Funcionario $funcionario, $redirect = true)
  {
    $stmt = $this->conn->prepare("UPDATE funcionario SET 
     CodCargo = :codcargo,Senha = :senha,Nome = :nome,RG = :rg,CPF = :cpf,Telefone = :telefone,CEP = :cep,CodUnidade = :codunidade,
     Token = :token,Imagem = :imagem,WHERE CodFuncionario = :codfuncionario
    ");

    $stmt->bindParam(":codcargo", $funcionario->codcargo);
    $stmt->bindParam(":senha", $funcionario->senha);
    $stmt->bindParam(":nome", $funcionario->nome);
    $stmt->bindParam(":rg", $funcionario->rg);
    $stmt->bindParam(":cpf", $funcionario->cpf);
    $stmt->bindParam(":cep", $funcionario->cep);
    $stmt->bindParam(":codunidade", $funcionario->codunidade);
    $stmt->bindParam(":token", $funcionario->token);
    $stmt->bindParam(":imagem", $funcionario->imagem);

    $stmt->execute();

    if ($redirect) {
      //If para redirecionamento do Funcionario Page
      $this->message->setMessage("Dados cadastrados com sucesso!", "success", "popup", "../../../view/pages/Funcionario/perfil.php");

    }
  }

  public function verifyToken($protected = false)
  {
    if (!empty($_SESSION["Token"])) {
      $token = $_SESSION["Token"];

      $funcionario = $this->findByToken($token);

      if ($funcionario) {
        return $funcionario;
      } else if ($protected) {

        $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "popup", "../../../view/pages/index/index.php");
      }
    } else if ($protected) {

      $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "popup", "../../../view/pages/index/index.php");
    }

  }

  public function setTokenToSession($token, $redirect = true)
  {
    $_SESSION["Token"] = $token;
    //if para autenticação se estiver autenticado redireciona a Perfil
    if ($redirect) {
      $this->message->setMessage("Usuario autenticado com sucesso!", "success", "toast", "../../../view/pages/Funcionario/perfil.php");
    }
  }

  public function authenticateFuncionario($codfuncionario, $senha)
  {
    $funcionario = $this->findById($codfuncionario);

    if ($funcionario) {
      if (password_verify($senha, $funcionario->senha)) { // TODO
        $token = $funcionario->generateToken();
        $this->setTokenToSession($token, false);

        // Atualiza token no usuário
        $funcionario->token = $token;
        $this->update($funcionario, false);
        return true;

      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function findById($codfuncionario)
  {
    if (empty($codfuncionario)) {
      return false; // Retorna falso se o código estiver vazio
    } else {
      // Prepara a consulta para buscar pelo código do funcionário
      $stmt = $this->conn->prepare("SELECT * FROM Funcionario WHERE CodFuncionario = :CodFuncionario");
      $stmt->bindParam(":codfuncionario", $codfuncionario);
      $stmt->execute();

      // Verifica se foi encontrado pelo menos um registro com o código fornecido
      if ($stmt->rowCount() <= 0) {
        return false; // Retorna falso se não encontrar registros
      } else {
        // Obtém o primeiro registro retornado da consulta
        $data = $stmt->fetch();
        $funcionario = $this->buildfuncionario($data); // Método para construir o objeto Funcionario
        return $funcionario; // Retorna o objeto Funcionario
      }
    }
  }

  public function findByToken($token)
  {
    if ($token == "") {

      return false;

    } else {

      $stmt = $this->conn->prepare("SELECT * FROM funcionario WHERE Token = :Token");
      $stmt->bindParam(":Token", $token);
      $stmt->execute();

      // Verifica se foi encontrado pelo menos um registro com o email fornecido
      if ($stmt->rowCount() <= 0) {

        return false;

      } else {

        // Obtém o primeiro registro retornado da consulta
        $data = $stmt->fetch();
        $funcionario = $this->buildfuncionario($data);
        return $funcionario;

      }
    }
  }

  public function destroyToken()
  {
    $_SESSION["Token"] = "";


    $this->message->setMessage("Você fez o logout com sucesso!", "success", "toast", "../../../view/pages/index/index.php");
  }

  public function changePassword(Funcionario $funcionario)
  {

  }

  public function getAllFuncionario()
  {
    $funcionarios = []; // Inicializa um array vazio para armazenar os funcionários

    // Prepara e executa uma consulta para selecionar todos os funcionários
    $stmt = $this->conn->prepare("SELECT * FROM funcionario");
    $stmt->execute();

    // Verifica se a consulta retornou algum resultado
    if ($stmt->rowCount() > 0) {
      // Armazena todos os resultados em um array
      $funcionariosArray = $stmt->fetchAll();

      // Itera pelos resultados e constrói cada funcionário
      foreach ($funcionariosArray as $funcionario) {
        $funcionarios[] = $this->buildfuncionario($funcionario);
      }
    }

    return $funcionarios; // Retorna o array de funcionários
  }
}
