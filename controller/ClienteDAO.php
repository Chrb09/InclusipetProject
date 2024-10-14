<?php

  require_once('../model/Classes/Cliente.php');

  class ClienteDAO implements ClienteDAOInterface {

    private $conn;
    private $url;

    public function __construct(PDO $conn, $url) {
      $this->conn = $conn;
      $this->url = $url;
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
      
    }

    public function update(Cliente $cliente, $redirect = true) {

    }

    public function verifyToken($protected = false) {

    }

    public function setTokenToSession($token, $redirect = true) {

    }

    public function authenticatecliente($email, $senha) {

    }

    public function findByEmail($email) {

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