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
    $funcionario->dataAdmissao = $data["DataAdmissao"];

    return $funcionario;
  }

  //Função Create
  public function create(Funcionario $funcionario, $authfuncionario = false, $senha)
  {
    $stmt = $this->conn->prepare("INSERT INTO funcionario( CodCargo, Senha, Nome, RG, CPF, Telefone, CEP, CodUnidade, Token, Imagem, DataAdmissao) 
     VALUES ( :CodCargo, :Senha, :Nome, :RG, :CPF,:Telefone, :CEP, :CodUnidade , :Token, :Imagem, :DataAdmissao)");

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
    $stmt->bindParam(":DataAdmissao", $funcionario->dataAdmissao);

    $stmt->execute();

    $id = $this->conn->lastInsertId();

    $this->message->setMessage("Funcionario cadastrado com <br><b>Código:</b> $id <br> <b>Senha:</b> $senha", "success", "popup", "back");

  }

  public function update(Funcionario $funcionario, $redirect = true)
  {
    $stmt = $this->conn->prepare("UPDATE funcionario SET 
     CodCargo = :CodCargo, Senha = :Senha,Nome = :Nome,RG = :RG, CPF = :CPF, Telefone = :Telefone, CEP = :CEP, CodUnidade = :CodUnidade,
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
    if (!empty($_SESSION["token_func"])) {

      $token = $_SESSION["token_func"];

      $funcionario = $this->findByToken($token);

      if ($funcionario) {
        return $funcionario;
      } else if ($protected) {

        $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "popup", "../../../view/pages/funcionario/login.php");
      }
    } else if ($protected) {

      $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "popup", "../../../view/pages/funcionario/login.php");
    }

  }

  public function setTokenToSession($token, $redirect = true)
  {
    $_SESSION["token_func"] = $token;
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
    if ($codfuncionario != "") {
      $stmt = $this->conn->prepare("SELECT * FROM  funcionario WHERE CodFuncionario = :CodFuncionario");
      $stmt->bindParam(":CodFuncionario", $codfuncionario);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        $data = $stmt->fetch();
        $funcionario = $this->buildfuncionario($data);

        return $funcionario;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function findByCPF($cpf)
  {
    // Verifica se foi enviado um email
    if ($cpf == "") {
      return false;
    } else {

      $stmt = $this->conn->prepare("SELECT * FROM Funcionario WHERE CPF = :cpf");
      $stmt->bindParam(":cpf", $cpf);
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
  public function findByRG($rg)
  {
    // Verifica se foi enviado um email
    if ($rg == "") {
      return false;
    } else {

      $stmt = $this->conn->prepare("SELECT * FROM Funcionario WHERE RG = :rg");
      $stmt->bindParam(":rg", $rg);
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
  public function findByToken($token)
  {
    if ((!empty($token))) {

      $stmt = $this->conn->prepare("SELECT * FROM funcionario WHERE Token = :Token");
      $stmt->bindParam(":Token", $token);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        $data = $stmt->fetch();
        $funcionario = $this->buildfuncionario($data);
        return $funcionario;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function destroyToken()
  {
    $_SESSION["token_func"] = "";


    $this->message->setMessage("Você fez o logout com sucesso!", "success", "toast", "../../../view/pages/index/index.php");
  }

  public function changePassword(Funcionario $funcionario)
  {
    $stmt = $this->conn->prepare("UPDATE funcionario SET Senha = :Senha WHERE CodFuncionario = :CodFuncionario");

    $stmt->bindParam(":Senha", $funcionario->senha);
    $stmt->bindParam(":CodFuncionario", $funcionario->codfuncionario);

    $stmt->execute();

    $this->message->setMessage("Senha alterada com sucesso!", "success", "popup", "../../../view/pages/Perfil/perfil.php");
  }

  public function getAllCargo()
  {
    $stmt = $this->conn->prepare("SELECT * FROM Cargo");
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $cargo = $stmt->fetchAll();
      return $cargo;
    }
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

  public function getAllUnidade()
  {
    $stmt = $this->conn->prepare("SELECT * FROM Unidade");
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      $unidade = $stmt->fetchAll();
      return $unidade;
    }
  }

  public function getUnidadeByCod($codunidade)
  {
    $stmt = $this->conn->prepare("SELECT * FROM unidade WHERE CodUnidade = :CodUnidade");
    $stmt->bindParam(":CodUnidade", $codunidade);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      $unidade = $stmt->fetch();
      return $unidade;
    }
  }

  //Função Get cargobycod, encontrar o cargo pelo código
  public function getCargoByCod($codcargo)
  {
    $stmt = $this->conn->prepare("SELECT Descricao FROM Cargo WHERE CodCargo = :CodEspecialidade");
    $stmt->bindParam(":CodEspecialidade", $codcargo);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      $cargo = $stmt->fetch();
      return $cargo[0];
    }
  }

}
