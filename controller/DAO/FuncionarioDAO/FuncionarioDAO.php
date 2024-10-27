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

    $funcionario->CodFuncionario = $data["CodFuncionario"];
    $funcionario->CodCargo = $data["CodCargo"];
    $funcionario->Senha = $data["Senha"];
    $funcionario->Nome = $data["Nome"];
    $funcionario->RG = $data["RG"];
    $funcionario->CPF = $data["CPF"];
    $funcionario->Telefone = $data["Telefone"];
    $funcionario->CEP = $data["CEP"];
    $funcionario->CodUnidade = $data["CodUnidade"];
    $funcionario->Token = $data["Token"];
    $funcionario->Imagem = $data["Imagem"];

    return $funcionario;
  }

  //Função Create
  public function create(Funcionario $funcionario, $authfuncionario = false)
  {
    $stmt = $this->conn->prepare("INSERT INTO funcionarios (CodCargo, Senha, Nome, RG, CPF, Telefone, CEP, CodUnidade, Token, Imagem) VALUES ( CodCargo = :codcargo,
      Senha = :senha, Nome = :nome,RG = :rg, CPF = :cpf,
     Telefone = :telefone,CEP = :cep,CodUnidade = :codunidade,Token = :token, Imagem = :imagem)");

    $stmt->execute();
    if ($authfuncionario) {
      $this->setTokenToSession($funcionario->Token);
    }

  }

  public function update(Funcionario $funcionario, $redirect = true)
  {
    $stmt = $this->conn->prepare("UPDATE funcionario SET 
     CodCargo = :codcargo,Senha = :senha,Nome = :nome,RG = :rg,CPF = :cpf,Telefone = :telefone,CEP = :cep,CodUnidade = :codunidade,
     Token = :token,Imagem = :imagem,WHERE CodFuncionario = :codfuncionario
    ");

    $stmt->bindParam(":codcargo", $funcionario->CodCargo);
    $stmt->bindParam(":senha", $funcionario->Senha);
    $stmt->bindParam(":nome", $funcionario->Nome);
    $stmt->bindParam(":rg", $funcionario->RG);
    $stmt->bindParam(":cpf", $funcionario->CPF);
    $stmt->bindParam(":cep", $funcionario->CEP);
    $stmt->bindParam(":codunidade", $funcionario->CodUnidade);
    $stmt->bindParam(":token", $funcionario->Token);
    $stmt->bindParam(":imagem", $funcionario->Imagem);

    $stmt->execute();

    if ($redirect) {
      //If para redirecionamento do Funcionario Page
      $this->message->setMessage("Dados cadastrados com sucesso!", "success", "popup", "../../../view/pages/Funcionario/perfil.php");

    }
  }

  public function verifyToken($protected = false)
  {
    if (!empty($_SESSION["token"])) {
      $Token = $_SESSION["token"];

      $funcionario = $this->findByToken($Token);

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
    $_SESSION["token"] = $token;
    //if para autenticação se estiver autenticado redireciona a Perfil
    if ($redirect) {
      $this->message->setMessage("Usuario autenticado com sucesso!", "success", "toast", "../../../view/pages/Funcionario/perfil.php");
    }
  }

  public function authenticateFuncionario($codfuncionario, $senha)
  {
    $funcionario = $this->findById($codfuncionario);

    if ($funcionario) {
      if (password_verify($senha, $funcionario->Senha)) { // TODO
        $token = $funcionario->generateToken();
        $this->setTokenToSession($token, false);

        // Atualiza token no usuário
        $funcionario->Token = $token;
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
      $stmt = $this->conn->prepare("SELECT * FROM Funcionario WHERE CodFuncionario = :codfuncionario");
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

  public function findByToken($Token)
  {
    if ($Token == "") {

      return false;

    } else {

      $stmt = $this->conn->prepare("SELECT * FROM funcionario WHERE Token = :token");
      $stmt->bindParam(":token", $Token);
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
    $_SESSION["token"] = "";


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
