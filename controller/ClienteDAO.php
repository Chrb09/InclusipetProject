<?php

  require_once('../model/Classes/Cliente.php');
  require_once("../model/Classes/Message.php");

  class ClienteDAO implements ClienteDAOInterface {

    private $conn;
    private $url;
    private $message;
    
    public function __construct(PDO $conn, $url) {
      $this->conn = $conn;
      $this->url = $url;
      $this->message = new Message($url);
    }

    public function buildcliente($data) {

      $cliente = new Cliente();

      $cliente->codcliente = $data["codcliente"];
      $cliente->nome = $data["nome"];
      $cliente->datanasc = $data["datanasc"];
      $cliente->telefone = $data["telefone"];
      $cliente->cep = $data["cep"];
      $cliente->cpf = $data["cpf"];
      $cliente->email = $data["email"];
      $cliente->senha = $data["senha"];
      $cliente->token = $data["token"];
      $cliente->imagem = $data["imagem"];

      return $cliente;
      
    }

    public function create(Cliente $cliente, $authcliente = false) {

      $stmt = $this->conn->prepare("INSERT INTO Cliente(Nome, DataNasc, Telefone, CEP, CPF, Email, Senha, Token) 
      VALUES (:Nome, :DataNasc, :Telefone, :CEP, :CPF, :Email, :Senha, :Token)");

      // Liga os parâmetros da query com os atributos do objeto Cliente
      $stmt->bindParam(":Nome", $cliente->Nome);
      $stmt->bindParam(":DataNasc", $cliente->DataNasc);
      $stmt->bindParam(":Telefone", $cliente->Telefone);
      $stmt->bindParam(":CEP", $cliente->CEP);
      $stmt->bindParam(":CPF", $cliente->CPF);
      $stmt->bindParam(":Email", $cliente->Email);
      $stmt->bindParam(":Senha", $cliente->Senha);
      $stmt->bindParam(":Token", $cliente->Token);

      $stmt->execute();

      // Autentica o usuário, caso auth seja true
      if($authcliente) {
        $this->setTokenToSession($cliente->Token);
      }

    }

    public function update(Cliente $cliente, $redirect = true) {

    }

    public function verifyToken($protected = false) {

    }

    public function setTokenToSession($token, $redirect = true) {

      // Salva token na session
      $_SESSION["Token"] = $token;

      if($redirect) {

        // Redireciona para o perfil do usuario
        $this->message->setMessage("Conta criada com sucesso!.", "sucess", "popup", "../view/pages/Perfil/perfil.php");

      }
    }

    public function authenticatecliente($email, $senha) {

    }

    public function findByEmail($email) {

       // Verifica se foi enviado um email
      if($email == "") {

        return false;

      } else {

        $stmt = $this->conn->prepare("SELECT * FROM Cliente WHERE Email = :Email");
        $stmt->bindParam(":Email", $email);
        $stmt->execute();

        // Verifica se foi encontrado pelo menos um registro com o email fornecido
        if($stmt->rowCount() <= 0) {

          return false;

        } else {

          // Obtém o primeiro registro retornado da consulta
          $data = $stmt->fetch(); 
          $cliente = $this->buildcliente($data);
          return $cliente;

        }
      }
    }

    public function findById($codcliente) {

    }

    public function findByToken($token) {

    }

    public function destroyToken() {

    }

    public function changePassword(Cliente $cliente) {
      
    }
    
  }