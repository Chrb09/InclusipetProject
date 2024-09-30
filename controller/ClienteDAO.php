<?php

  require_once("../models/Cliente.php");
  require_once("../models/Message.php");

  class ClienteDAO implements ClienteDAOInterface {
    private $conn;
    private $url;
    private $message; // TODO

    public function __construct(PDO $conn, $url) {
      $this->conn = $conn;
      $this->url = $url;
      $this->message = new Message($url);
    }

    public function buildClient($data) {
      $cliente = new Cliente();
      $cliente->CodCliente = $data["CodCliente"];
      $cliente->Nome = $data["Nome"];
      $cliente->DataNasc = $data["DataNasc"];
      $cliente->Telefone = $data["Telefone"];
      $cliente->CEP = $data["CEP"];
      $cliente->CPF = $data["CPF"];
      $cliente->Email = $data["Email"];
      $cliente->Senha = $data["Senha"];
      $cliente->token = $data["token"];

      return $cliente;
    }

    // ===== CREATE =====
    public function create(Cliente $cliente, $authCliente = false) {
      $stmt = $this->conn->prepare("INSERT INTO Cliente(Nome, DataNasc, Telefone, CEP, CPF, Email, Senha, token) 
      VALUES (:Nome, :DataNasc, :Telefone, :CEP, :CPF, :Email, :Senha, :token)");
      
      // Associar os parâmetros corretos do objeto Cliente
      $stmt->bindParam(":Nome", $cliente->Nome);
      $stmt->bindParam(":DataNasc", $cliente->DataNasc);
      $stmt->bindParam(":Telefone", $cliente->Telefone);
      $stmt->bindParam(":CEP", $cliente->CEP);
      $stmt->bindParam(":CPF", $cliente->CPF);
      $stmt->bindParam(":Email", $cliente->Email);
      $stmt->bindParam(":Senha", $cliente->Senha);
      $stmt->bindParam(":token", $cliente->token);

      $stmt->execute();

      // Autenticar usuário, caso auth seja true
      if($authCliente) {
        $this->setTokenToSession($cliente->token);
      }
    }

    // ===== UPDATE =====
    public function update(Cliente $cliente, $redirect = true) {
      $stmt = $this->conn->prepare("UPDATE Cliente SET
        Nome = :Nome,
        DataNasc = :DataNasc,
        Telefone = :Telefone,
        CEP = :CEP,
        CPF = :CPF,
        Email = :Email,
        Senha = :Senha,
        token = :token
        WHERE CodCliente; = :CodCliente;
        ");

        // Associar os parâmetros corretos do objeto Cliente
        $stmt->bindParam(":Nome", $cliente->Nome);
        $stmt->bindParam(":DataNasc", $cliente->DataNasc);
        $stmt->bindParam(":Telefone", $cliente->Telefone);
        $stmt->bindParam(":CEP", $cliente->CEP);
        $stmt->bindParam(":CPF", $cliente->CPF);
        $stmt->bindParam(":Email", $cliente->Email);
        $stmt->bindParam(":Senha", $cliente->Senha);
        $stmt->bindParam(":token", $cliente->token);
        $stmt->bindParam("CodCliente;", $cliente-> CodCliente);
        
        $stmt->execute();
        
        if($redirect) { // Redireciona para o perfil do usuario
          $this->message->setMessage("Dados atualizados com sucesso!", "success", "editprofile.php");
        }
    }

    // ===== VERIFICA O TOKEN =====
    public function verifyToken($protected = false) {
      if(!empty($_SESSION["token"])) {

        $token = $_SESSION["token"];  // Pega o token da session
        $cliente = $this->findByToken($token);
        
        if($cliente) {
          return $cliente;
        } 

        else if($protected) { // Redireciona o usuário não autenticado
          $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "index.php");
        }
      } 
      else if($protected) { // Redireciona usuário não autenticado
        $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "index.php");
      }
    }

    // ===== SALVA O TOKEN DA SESSÃO =====
    public function setTokenToSession($token, $redirect = true) {
      $_SESSION["token"] = $token; // Salvar token na session

      if($redirect) { // Redireciona para o perfil do usuario
        $this->message->setMessage("Seja bem-vindo!", "success", "editprofile.php");
      }
    }

    // ===== VERIFICA O USUÁRIO =====
    public function authenticateCliente($Email, $Senha) {
      $cliente = $this->findByEmail($Email);

      if($cliente) {
        if(password_verify($Senha, $Cliente->Senha)) { // Checa se as senhas batem
          $token = $Cliente->generateToken(); // Gera um token e inserir na session

          $this->setTokenToSession($token, false);
          $Cliente->token = $token; // Atualiza token no usuário

          $this->update($Cliente, false);
          return true;
        } 
        else { return false; }
      } 
      else { return false; }
    }

    // ===== BUSCA O EMAIL =====
    public function findByEmail($Email) {

      if($Email != "") {
        $stmt = $this->conn->prepare("SELECT * FROM Cliente WHERE Email = :Email");
        $stmt->bindParam(":Email", $Email);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
          $data = $stmt->fetch();
          $cliente = $this->buildClient($data);
          return $cliente;
        } 
        else { return false; }
      } 
      else { return false; }
    }

    // ===== BUSCA O CODIGO DO CLIENTE =====
    public function findByCodCliente($CodCliente) {
      if($CodCliente != "") {
        $stmt = $this->conn->prepare("SELECT * FROM Cliente WHERE CodCliente = :CodCliente");
        $stmt->bindParam(":CodCliente", $CodCliente);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
          $data = $stmt->fetch();
          $cliente = $this->buildClient($data);
          return $cliente;
        } 
        else { return false; }
      } 
      else { return false; }
    }

    // ===== BUSCA O TOKEN =====
    public function findByToken($token) {
      if($token != "") {
        $stmt = $this->conn->prepare("SELECT * FROM Cliente WHERE token = :token");
        $stmt->bindParam(":token", $token);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
          $data = $stmt->fetch();
          $cliente = $this->buildClient($data);
          return $cliente;
        } 
        else { return false; }
      } 
      else { return false; }
    }

    // ===== REMOVE O TOKEN DA SESSAO =====
    public function destroyToken() {
      $_SESSION["token"] = ""; // Remove o token da session

      // Redirecionar e apresentar a mensagem de sucesso
      $this->message->setMessage("Você fez o logout com sucesso!", "success", "index.php");
    }

    // ===== MUDA A SENHA =====
    public function changeSenha(Cliente $cliente) {

      $stmt = $this->conn->prepare("UPDATE Cliente SET Senha = :Senha
        WHERE Cliente = :CodCliente ");

      $stmt->bindParam(":Senha", $cliente->Senha);
      $stmt->bindParam(":CodCliente", $cliente->CodCliente);

      $stmt->execute();

      // Redirecionar e apresentar a mensagem de sucesso
      $this->message->setMessage("Senha alterada com sucesso!", "success", "editprofile.php");
    }
  }