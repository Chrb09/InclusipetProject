<?php

require_once('../../../model/Classes/Modelagem/Cliente.php');
require_once("../../../model/Classes/Modelagem/Message.php");

class ClienteDAO implements ClienteDAOInterface
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

  public function buildcliente($data)
  {

    $cliente = new Cliente();

    $cliente->codcliente = $data["CodCliente"];
    $cliente->nome = $data["Nome"];
    $cliente->datanasc = $data["DataNasc"];
    $cliente->telefone = $data["Telefone"];
    $cliente->cep = $data["CEP"];
    $cliente->cpf = $data["CPF"];
    $cliente->email = $data["Email"];
    $cliente->senha = $data["Senha"];
    $cliente->token = $data["Token"];
    $cliente->imagem = $data["Imagem"];

    return $cliente;

  }

  public function create(Cliente $cliente, $authcliente = false)
  {

    $stmt = $this->conn->prepare("INSERT INTO cliente(Nome, DataNasc, Telefone, CEP, CPF, Email, Senha, Token) VALUES (:Nome, :DataNasc, :Telefone, :CEP, :CPF, :Email, :Senha, :Token)");

    // Liga os parâmetros da query com os atributos do objeto Cliente
    $stmt->bindParam(":Nome", $cliente->nome);
    $stmt->bindParam(":DataNasc", $cliente->datanasc);
    $stmt->bindParam(":Telefone", $cliente->telefone);
    $stmt->bindParam(":CEP", $cliente->cep);
    $stmt->bindParam(":CPF", $cliente->cpf);
    $stmt->bindParam(":Email", $cliente->email);
    $stmt->bindParam(":Senha", $cliente->senha);
    $stmt->bindParam(":Token", $cliente->token);

    $stmt->execute();

    // Autentica o usuário, caso auth seja true
    if ($authcliente) {
      $this->setTokenToSession($cliente->token);
    } else {
      $this->message->setMessage("Tutor cadastrado com sucesso!", "success", "popup", "back");
    }

  }


  public function update(Cliente $cliente, $redirect = true)
  {

    $stmt = $this->conn->prepare("UPDATE cliente SET 
      Nome = :Nome, DataNasc = :DataNasc, Telefone = :Telefone, CEP = :CEP, CPF = :CPF,
      Email = :Email, Senha = :Senha, Token = :Token, Imagem =:Imagem WHERE CodCliente = :CodCliente");

    $stmt->bindParam(":Nome", $cliente->nome);
    $stmt->bindParam(":DataNasc", $cliente->datanasc);
    $stmt->bindParam(":Telefone", $cliente->telefone);
    $stmt->bindParam(":CEP", $cliente->cep);
    $stmt->bindParam(":CPF", $cliente->cpf);
    $stmt->bindParam(":Email", $cliente->email);
    $stmt->bindParam(":Senha", $cliente->senha);
    $stmt->bindParam(":Token", $cliente->token);
    $stmt->bindParam(":Imagem", $cliente->imagem);
    $stmt->bindParam(":CodCliente", $cliente->codcliente);

    $stmt->execute();

    if ($redirect) {

      // Redireciona para o perfil do usuario
      $this->message->setMessage("Dados atualizados com sucesso!", "success", "popup", "../../../view/pages/Perfil/perfil.php");

    }
  }

  public function verifyToken($protected = false)
  {

    if (!empty($_SESSION["token_clienteInclusipet"])) {
      // Pega o token da session
      $token = $_SESSION["token_clienteInclusipet"];

      $cliente = $this->findByToken($token);

      if ($cliente) {
        return $cliente;
      } else if ($protected) {

        // Redireciona usuário não autenticado
        $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "popup", "../../../view/pages/Login/login.php");

      }
    } else if ($protected) {

      // Redireciona usuário não autenticado
      $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "popup", "../../../view/pages/Login/login.php");

    }

  }

  public function setTokenToSession($token, $redirect = true)
  {

    // Salva token na session
    $_SESSION["token_clienteInclusipet"] = $token;

    if ($redirect) {

      // Redireciona para o perfil do usuario
      $this->message->setMessage("Usuario autenticado com sucesso!", "success", "toast", "../../../view/pages/Perfil/perfil.php");

    }
  }

  public function authenticatecliente($email, $senha)
  {
    $cliente = $this->findByEmail($email);

    if ($cliente) {
      if (password_verify($senha, $cliente->senha)) {

        $token = $cliente->generateToken(); // Gera um token e o insere na session

        $this->setTokenToSession($token, false);

        // Atualiza token no usuário
        $cliente->token = $token;

        $this->update($cliente, false);

        return true;

      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function findByEmail($email)
  {

    // Verifica se foi enviado um email
    if ($email == "") {
      return false;
    } else {

      $stmt = $this->conn->prepare("SELECT * FROM cliente WHERE Email = :Email");
      $stmt->bindParam(":Email", $email);
      $stmt->execute();

      // Verifica se foi encontrado pelo menos um registro com o email fornecido
      if ($stmt->rowCount() <= 0) {

        return false;

      } else {

        // Obtém o primeiro registro retornado da consulta
        $data = $stmt->fetch();
        $cliente = $this->buildcliente($data);
        return $cliente;

      }
    }
  }

  public function findByCPF($cpf)
  {

    // Verifica se foi enviado um email
    if ($cpf == "") {
      return false;
    } else {

      $stmt = $this->conn->prepare("SELECT * FROM cliente WHERE CPF = :cpf");
      $stmt->bindParam(":cpf", $cpf);
      $stmt->execute();

      // Verifica se foi encontrado pelo menos um registro com o email fornecido
      if ($stmt->rowCount() <= 0) {

        return false;

      } else {

        // Obtém o primeiro registro retornado da consulta
        $data = $stmt->fetch();
        $cliente = $this->buildcliente($data);
        return $cliente;

      }
    }
  }
  public function validateAge($birthday)
  {

    $min_age = 18; // Set the min age in years

    $dataArray = explode("-", $birthday);
    if (mktime(0, 0, 0, $dataArray[1], $dataArray[2], $dataArray[0]) < mktime(0, 0, 0, date('m'), date('j'), (date('Y') - $min_age))) {
      return true;
    } else {
      return false;
    }
  }

  public function findById($codcliente)
  {
    if ($codcliente != "") {
      $stmt = $this->conn->prepare("SELECT * FROM  cliente WHERE CodCliente = :CodCliente");
      $stmt->bindParam(":CodCliente", $codcliente);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        $data = $stmt->fetch();
        $cliente = $this->buildcliente($data);

        return $cliente;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function findByToken($token)
  {
    if ($token == "") {

      return false;

    } else {

      $stmt = $this->conn->prepare("SELECT * FROM cliente WHERE Token = :token");
      $stmt->bindParam(":token", $token);
      $stmt->execute();

      // Verifica se foi encontrado pelo menos um registro com o email fornecido
      if ($stmt->rowCount() <= 0) {

        return false;

      } else {

        // Obtém o primeiro registro retornado da consulta
        $data = $stmt->fetch();
        $cliente = $this->buildcliente($data);
        return $cliente;

      }
    }
  }

  public function destroyToken()
  {

    $_SESSION["token_clienteInclusipet"] = ""; // Remove o token da session

    // Redireciona e apresentar a mensagem de sucesso
    $this->message->setMessage("Você fez o logout com sucesso!", "success", "toast", "../../../view/pages/index/index.php");

  }

  public function changePassword(Cliente $cliente)
  {
    $stmt = $this->conn->prepare("UPDATE cliente SET Senha = :Senha WHERE CodCliente = :CodCliente");

    $stmt->bindParam(":Senha", $cliente->senha);
    $stmt->bindParam(":CodCliente", $cliente->codcliente);

    $stmt->execute();

    $this->message->setMessage("Senha alterada com sucesso!", "success", "popup", "../../../view/pages/Perfil/perfil.php");
  }

  public function getAllCliente()
  {
    $clientes = [];

    $stmt = $this->conn->prepare("SELECT * FROM cliente");
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      $clientesArray = $stmt->fetchAll();

      foreach ($clientesArray as $cliente) {
        $clientes[] = $this->buildcliente($cliente);
      }
    }

    return $clientes;
  }

}