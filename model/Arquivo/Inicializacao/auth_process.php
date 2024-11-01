<?php
// Arquivo de autenticação do usuário

require_once('globals.php');
require_once('db.php');
require_once('../../Classes/Modelagem/Message.php');
require_once('../../Classes/Modelagem/Cliente.php');
require_once('../../../controller/DAO/ClienteDAO/ClienteDAO.php');
require_once('../../Classes/Modelagem/Funcionario.php');
require_once('../../../controller/DAO/FuncionarioDAO/FuncionarioDAO.php');


$message = new Message($BASE_URL);
$clienteDao = new ClienteDAO($conn, $BASE_URL);
$funcionarioDao = new FuncionarioDAO($conn, $BASE_URL);


// Resgata o tipo do formulário
$type = filter_input(INPUT_POST, "type");

// ===== COMEÇO DO CLIENTE =====

if ($type === 'register_client') {

  $nome = filter_input(INPUT_POST, "sign-up-name");
  $datanasc = filter_input(INPUT_POST, "sign-up-date");
  $telefone = filter_input(INPUT_POST, "sign-up-tel");
  $cep = filter_input(INPUT_POST, "sign-up-cep");
  $cpf = filter_input(INPUT_POST, "sign-up-cpf");
  $email = filter_input(INPUT_POST, "sign-up-email");
  $senha = filter_input(INPUT_POST, "sign-up-password");
  $confirmarsenha = filter_input(INPUT_POST, "sign-up-confirm-password");

  // Verificação de dados mínimos 
  if (!$nome || !$datanasc || !$telefone || !$cep || !$cpf || !$email || !$senha) {

    // Enviar uma msg de erro, de dados faltantes
    $message->setMessage("Preencha todos os campos.", "error", "toast", "back");

  } else if ($senha !== $confirmarsenha) {
    $message->setMessage("As senhas fornecidas não batem.", "error", "toast", "back");
  } else {

    if ($clienteDao->findByEmail($email) === false) {
      $cliente = new Cliente();

      $clienteToken = $cliente->generateToken();
      $senhaFinal = $cliente->generatePassword($senha);

      $cliente->nome = $nome;
      $cliente->datanasc = $datanasc;
      $cliente->telefone = $telefone;
      $cliente->cep = $cep;
      $cliente->cpf = $cpf;
      $cliente->email = $email;
      $cliente->senha = $senhaFinal;
      $cliente->token = $clienteToken;

      $auth = true;

      $clienteDao->create($cliente, $auth);
    } else {

      // Enviar uma msg de erro, de dados faltantes
      $message->setMessage("Email já cadastrado.", "error", "toast", "back");
    }
  }
} else if ($type === 'login_client') {

  $email = filter_input(INPUT_POST, "log-in-email");
  $senha = filter_input(INPUT_POST, "log-in-password");

  // Tenta autenticar usuário
  if ($clienteDao->authenticatecliente($email, $senha)) {

    $message->setMessage("Seja bem-vindo!", "success", "toast", "../../../view/pages/Perfil/perfil.php");

    // Redireciona o usuário, caso não conseguir autenticar
  } else {
    $message->setMessage("Usuário e/ou senha incorretos.", "error", "toast", "back");
  }

}
// ===== FIM DO CLIENTE =====


// ===== COMEÇO DO FUNCIONÁRIO =====
//Cadastrar funcionário:
if ($type === 'register_funcionario') {
  $nome = filter_input(INPUT_POST, "sign-up-nome" );
  $codcargo = filter_input(INPUT_POST, "cargo");
  $cpf = filter_input(INPUT_POST, "sign-up-cpf");
  $cep = filter_input(INPUT_POST, "sign-up-cep");
  $rg = filter_input(INPUT_POST, "sign-up-rg");
  $telefone = filter_input(INPUT_POST, "sign-up-tel");
  $codunidade = filter_input(INPUT_POST, "sign-up-unidade");

  if (!$nome || !$cpf || !$cep || !$rg || !$telefone) {

    $message->setMessage("Preencha todos os campos.", "error", "toast", "back");
  } else {
    
    if($funcionarioDao -> findById($codfuncionario) === false) {
      $funcionario = new Funcionario();

      $funcionarioToken = $funcionario->generateToken();
      $senhaFinal = $funcionario->generatePassword($senha);

      $funcionario->codcargo = $codcargo;
      $funcionario->senha = $senhaFinal;
      $funcionario->nome = $nome;
      $funcionario->rg = $rg;
      $funcionario->cpf = $cpf;
      $funcionario->cep = $cep;
      $funcionario->telefone = $telefone;
      $funcionario->codunidade = $codunidade;
      $funcionario->token = $funcionarioToken;

      $authfuncionario = true;

      $funcionarioDao->create($funcionario, $authfuncionario);
    }else {
      // Enviar uma msg de erro, de dados faltantes
      $message->setMessage("Funcionario já cadastrado.", "error", "toast", "back");
    }
  }
}


//Login funcionário
else if ($type === 'login_funcionario') {

  $codfuncionario = filter_input(INPUT_POST, "log-in-cod");
  $senha = filter_input(INPUT_POST, "log-in-password");

  if ($funcionarioDao->authenticateFuncionario($codfuncionario, $senha)) {

    $message->setMessage("Seja bem-vindo!", "success", "toast", "../../../view/pages/Funcionario/perfil.php");

  } else {
    $message->setMessage("Usuário e/ou senha incorretos.", "error", "toast", "back");
  }

} else {

  $message->setMessage("Informações inválidas!", "error", "toast", "../../../view/pages/index/index.php");

}



