<?php

  require_once("../model/Classes/Cliente.php");
  require_once("../model/Mensagem.php");

  class ClienteDAO implements ClienteDAOInterface {

    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url) {
      $this->conn = $conn;
      $this->url = $url;
      $this->message = new Mensagem($url);
    }

    public function buildCliente($data) {

      $cliente = new Cliente();
      $cliente->codcliente = $data["CodCliente"];
      $cliente->nome = $data["Nome"];
      $cliente->datanasc = $data["DataNasc"];
      $cliente->telefone = $data["Telefone"];
      $cliente->cep = $data["CEP"];
      $cliente->cpf = $data["CPF"];
      $cliente->email = $data["Email"];
      $cliente->senha = $data["Senha"];
      $cliente->imagem = $data["Imagem"];
      $cliente->token = $data["Token"];

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

    // TODO
    public function update(Cliente $cliente, $redirect = true) {

      $stmt = $this->conn->prepare("UPDATE users SET
        name = :name,
        lastname = :lastname,
        email = :email,
        image = :image,
        bio = :bio,
        token = :token
        WHERE id = :id
      ");

      $stmt->bindParam(":name", $user->name);
      $stmt->bindParam(":lastname", $user->lastname);
      $stmt->bindParam(":email", $user->email);
      $stmt->bindParam(":image", $user->image);
      $stmt->bindParam(":bio", $user->bio);
      $stmt->bindParam(":token", $user->token);
      $stmt->bindParam(":id", $user->id);

      $stmt->execute();

      if($redirect) {

        // Redireciona para o perfil do usuario
        $this->message->setMessage("Dados atualizados com sucesso!", "success", "editprofile.php");

      }

    }

    public function verifyToken($protected = false) {

      if(!empty($_SESSION["token"])) {

        // Pega o token da session
        $token = $_SESSION["token"];

        $user = $this->findByToken($token);

        if($user) {
          return $user;
        } else if($protected) {

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
      $_SESSION["token"] = $token;

      if($redirect) {

        // Redireciona para o perfil do usuario
        $this->message->setMessage("Seja bem-vindo!", "success", "editprofile.php");

      }

    }

    public function authenticateUser($email, $password) {

      $user = $this->findByEmail($email);

      if($user) {

        // Checar se as senhas batem
        if(password_verify($password, $user->password)) {

          // Gerar um token e inserir na session
          $token = $user->generateToken();

          $this->setTokenToSession($token, false);

          // Atualizar token no usuário
          $user->token = $token;

          $this->update($user, false);

          return true;

        } else {
          return false;
        }

      } else {

        return false;

      }

    }

    public function findByEmail($email) {

      if($email != "") {

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");

        $stmt->bindParam(":email", $email);

        $stmt->execute();

        if($stmt->rowCount() > 0) {

          $data = $stmt->fetch();
          $user = $this->buildUser($data);
          
          return $user;

        } else {
          return false;
        }

      } else {
        return false;
      }

    }

    public function findById($id) {

      if($id != "") {

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        if($stmt->rowCount() > 0) {

          $data = $stmt->fetch();
          $user = $this->buildUser($data);
          
          return $user;

        } else {
          return false;
        }

      } else {
        return false;
      }
    }

    public function findByToken($token) {

      if($token != "") {

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE token = :token");

        $stmt->bindParam(":token", $token);

        $stmt->execute();

        if($stmt->rowCount() > 0) {

          $data = $stmt->fetch();
          $user = $this->buildUser($data);
          
          return $user;

        } else {
          return false;
        }

      } else {
        return false;
      }

    }

    public function destroyToken() {

      // Remove o token da session
      $_SESSION["token"] = "";

      // Redirecionar e apresentar a mensagem de sucesso
      $this->message->setMessage("Você fez o logout com sucesso!", "success", "index.php");

    }

    public function changePassword(User $user) {

      $stmt = $this->conn->prepare("UPDATE users SET
        password = :password
        WHERE id = :id
      ");

      $stmt->bindParam(":password", $user->password);
      $stmt->bindParam(":id", $user->id);

      $stmt->execute();

      // Redirecionar e apresentar a mensagem de sucesso
      $this->message->setMessage("Senha alterada com sucesso!", "success", "editprofile.php");

    }

  }