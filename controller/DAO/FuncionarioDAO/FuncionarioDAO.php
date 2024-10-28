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
    $stmt = $this->conn->prepare("INSERT INTO funcionario (CodCargo, Senha, Nome, RG, CPF, Telefone, CEP, CodUnidade, Token, Imagem) 
     VALUES (:CodCargo, :Senha, :Nome, :RG, :CPF, :Telefone, :CEP, :CodUnidade , :Token)");

     
    $stmt->bindParam(":CodCargo", $funcionario->codcargo);
    $stmt->bindParam(":Senha", $funcionario->senha);
    $stmt->bindParam(":Nome", $funcionario->nome);
    $stmt->bindParam(":RG", $funcionario->rg);
    $stmt->bindParam(":CPF", $funcionario->cpf);
    $stmt->bindParam(":Telefone", $funcionario->telefone);
    $stmt->bindParam(":CEP", $funcionario->cep);
    $stmt->bindParam(":CodUnidade", $funcionario->codunidade);
    $stmt->bindParam(":Token", $funcionario->token);
  


    $stmt->execute();
    if ($authfuncionario) {
      $this->setTokenToSession($funcionario->token);
    }

  }

  public function update(Funcionario $funcionario, $redirect = true)
  {
    $stmt = $this->conn->prepare("UPDATE funcionario SET 
     CodCargo = :CodCargo,Senha = :Senha,Nome = :Nome,RG = :RG, CPF = :CPF, Telefone = :Telefone, CEP = :CEP, CodUnidade = :CodUnidade,
     Token = :Token, Imagem = :Imagem WHERE CodFuncionario = :CodFuncionario");

    $stmt->bindParam(":CodCargo", $funcionario->codcargo);
    $stmt->bindParam(":Senha", $funcionario->senha);
    $stmt->bindParam(":Nome", $funcionario->nome);
    $stmt->bindParam(":RG", $funcionario->rg);
    $stmt->bindParam(":CPF", $funcionario->cpf);
    $stmt->bindParam(":Telefone", $funcionario->telefone);
    $stmt->bindParam(":CEP", $funcionario->cep);
    $stmt->bindParam(":CodUnidade", $funcionario->codunidade);
    $stmt->bindParam(":Token", $funcionario->token);
    $stmt->bindParam(":Imagem", $funcionario->imagem);
    $stmt->bindParam(":CodFuncionario", $funcionario->codfuncionario);

    $stmt->execute();

    if ($redirect) {
      //If para redirecionamento do Funcionario Page
      $this->message->setMessage("Dados cadastrados com sucesso!", "success", "popup", "../../../view/pages/Funcionario/perfil.php");

    }
  }

  public function verifyToken($protected = false)
  {
    if (!empty($_SESSION["token"])) {
      $token = $_SESSION["token"];

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
   if($codfuncionario != ""){
    $stmt = $this->conn->prepare("SELECT * FROM  funcionario WHERE CodFuncionario = :CodFuncionario");
    $stmt->bindParam(":CodFuncionario", $codfuncionario);

    $stmt->execute();

    if($stmt->rowCount() > 0){
      $data = $stmt->fetch();
      $funcionario = $this->buildfuncionario($data);

      return $funcionario;
    } else{
      return false;
    }
  }
  else{
    return false;
  }
}


  public function findByToken($token)
  {
    if ($token != "") {

      $stmt = $this->conn->prepare("SELECT * FROM funcionario WHERE Token = :Token");
      $stmt->bindParam(":Token", $token);
      $stmt->execute();

      if($stmt->rowCount() > 0){
        $data = $stmt->fetch();
        $funcionario  = $this->buildfuncionario($data);
        return $funcionario;
    } else{
      return false;
    }
  } else{
    return false;
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
