<?php

  require_once('../model/Classes/Cliente.php');
  require_once('../model/Classes/Message.php');

  class ClienteDAO implements ClienteDAOInterface 
  {
    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url) {
      $this->conn = $conn;
      $this->url = $url;
      $this->message = new Message($url);
    }

    public function buildCliente($data) {

      $cliente = new Cliente();
      $cliente->CodCliente = $data["CodCliente"];
      $cliente->Nome = $data["Nome"];
      $cliente->DataNasc = $data["DataNasc"];
      $cliente->Telefone = $data["Telefone"];
      $cliente->CEP = $data["CEP"];
      $cliente->CPF = $data["CPF"];
      $cliente->Email = $data["Email"];
      $cliente->Senha = $data["Senha"];
      $cliente->Imagem = $data["Imagem"];
      // $user->bio = $data["bio"];
      $cliente->Token = $data["Token"];

      return $cliente;
    }

    public function create(Cliente $cliente, $authCliente = false) {

      $stmt = $this->conn->prepare("INSERT INTO cliente(nome, datanasc, telefone, cep, cpf, email, senha, token) 
      VALUES (:nome, :datanasc, :telefone, :cep, :cpf, :email, :senha, :token)");
      
      // Liga os parâmetros da query com os atributos do objeto Cliente
      $stmt->bindParam(":nome", $cliente->nome);
      $stmt->bindParam(":datanasc", $cliente->datanasc);
      $stmt->bindParam(":telefone", $cliente->telefone);
      $stmt->bindParam(":cep", $cliente->cep);
      $stmt->bindParam(":cpf", $cliente->cpf);
      $stmt->bindParam(":email", $cliente->email);
      $stmt->bindParam(":senha", $cliente->senha);
      $stmt->bindParam(":token", $cliente->token);

      $stmt->execute();

      // Autentica o cliente se o parâmetro $authCliente for verdadeiro
      if($authCliente) {
        $this->setTokenToSession($cliente->token);
      }
    }

    public function update(Cliente $cliente, $redirect = true) {
      $stmt = $this->conn->prepare("UPDATE Cliente SET
        Nome = :Nome,
        Datanasc = :DataNasc,
        Telefone = :Telefone,
        CEP = :CEP,
        CPF = :CPF,
        Email = :Email,
        Senha = :Senha,
        Imagem = :Imagem,
        -- bio = :bio,
        Token = :Token
        WHERE CodCliente = :CodCliente ");

      $stmt->bindParam(":Nome", $cliente->Nome);
      $stmt->bindParam(":DataNasc", $cliente->DataNasc);
      $stmt->bindParam(":Telefone", $cliente->Telefone);
      $stmt->bindParam(":CEP", $cliente->CEP);
      $stmt->bindParam(":CPF", $cliente->CPF);
      $stmt->bindParam(":Email", $cliente->Email);
      $stmt->bindParam(":Senha", $cliente->Senha);
      $stmt->bindParam(":Imagem", $cliente->Imagem);
      // $stmt->bindParam(":bio", $user->bio);
      $stmt->bindParam(":Token", $cliente->Token);
      $stmt->bindParam(":CodCliente", $cliente->CodCliente);

      $stmt->execute();

      if($redirect) 
      {
        // Redireciona para o perfil do usuario
        $this->message->setMessage("Dados atualizados com sucesso!", "success", "editprofile.php");

      }
    }

    public function verifyToken($protected = false) {
      if(!empty($_SESSION["Token"])) {

        // Pega o token da session
        $Token = $_SESSION["Token"];

        $cliente = $this->findByToken($Token);

        if($cliente) {
          return $cliente;
        } 
        else if($protected) {

          // Redireciona usuário não autenticado
          $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "index.php");

        }

      } else if($protected) {

        // Redireciona usuário não autenticado
        $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "index.php");

      }
    }

    public function setTokenToSession($token, $redirect = true) {
      // Salvar token na session
      $_SESSION["Token"] = $Token;

      if($redirect) {

        // Redireciona para o perfil do usuario
        $this->message->setMessage("Seja bem-vindo!", "success", "perfil.php");

      }
    }

    // LOGAR
    public function authenticateCliente($Email, $Senha) {
      $cliente = $this->findByEmail($Email);

      if($cliente) {

        // Checa se as senhas batem
        if(password_verify($senha, $cliente->senha)) {

          // Gera um token e inserir na session
          $token = $cliente->generateToken();

          $this->setTokenToSession($token, false);

          // Atualiza token no usuário
          $cliente->Token = $Token;
          $this->update($cliente, false);

          return true;
        } 
        else {
          return false;
        }
      } 
      else {
        return false;
      }
    }

    public function findByEmail($Email) {
      if($Email != "") {

        $stmt = $this->conn->prepare("SELECT * FROM Cliente WHERE Email = :Email");
        $stmt->bindParam(":Email", $Email);
        $stmt->execute();

        if($stmt->rowCount() > 0) {

          $data = $stmt->fetch();
          $cliente = $this->buildCliente($data);
          
          return $cliente;
        } 
        else {
          return false;
        }
      } 
      else {
        return false;
      }
    }

    public function findByCodCliente($codcliente) {

      if($codcliente != "") {

        $stmt = $this->conn->prepare("SELECT * FROM Cliente WHERE codcliente = :codcliente");
        $stmt->bindParam(":codcliente", $codcliente);
        $stmt->execute();

        if($stmt->rowCount() > 0) {

          $data = $stmt->fetch();
          $cliente = $this->buildCliente($data);
          
          return $cliente;
        } 
        else {
          return false;
        }
      } 
      else {
        return false;
      }
    }

    public function findByToken($token) {

      if($token != "") {

        $stmt = $this->conn->prepare("SELECT * FROM Cliente WHERE token = :token");
        $stmt->bindParam(":token", $token);
        $stmt->execute();

        if($stmt->rowCount() > 0) {

          $data = $stmt->fetch();
          $cliente = $this->buildCliente($data);
          
          return $cliente;
        } 
        else {
          return false;
        }
      } 
      else {
        return false;
      }
    }

    public function destroyToken() {

      // Remove o token da session
      $_SESSION["token"] = "";

      // Redirecionar e apresentar a mensagem de sucesso
      $this->message->setMessage("Você fez o logout com sucesso!", "success", "index.php");

    }

    public function changeSenha(Cliente $cliente) {

      $stmt = $this->conn->prepare("UPDATE Cliente SET codcliente = :codcliente WHERE codcliente = :codcliente ");

      $stmt->bindParam(":codcliente", $cliente->codcliente);
      $stmt->bindParam(":codcliente", $cliente->codcliente);
      $stmt->execute();

      // Redirecionar e apresentar a mensagem de sucesso
      $this->message->setMessage("Senha alterada com sucesso!", "success", "editprofile.php");
    }
  }