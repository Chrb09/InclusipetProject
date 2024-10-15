<?php

require_once('globals.php');
require_once('db.php');
require_once('../../Classes/Modelagem/Message.php');
require_once('../../Classes/Modelagem/Cliente.php');
require_once('../../../controller/DAO/ClienteDAO/ClienteDAO.php');

$message = new Message($BASE_URL);
$clienteDao = new ClienteDAO($conn, $BASE_URL);

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
  if (!$nome && !$datanasc && !$telefone && !$cep && !$cpf && !$email && !$senha) {

    // Enviar uma msg de erro, de dados faltantes
    $message->setMessage("Preencha todos os campos.", "error", "toast", "back");

  } else if ($senha !== $confirmarsenha) {
    $message->setMessage("As senhas fornecidas não batem.", "error", "toast", "back");
  } else {

    if ($clienteDao->findByEmail($email) === false) {
      $cliente = new Cliente();

      $clienteToken = $cliente->generateToken();
      $senhaFinal = $cliente->generatePassword($senha);

      $cliente->Nome = $nome;
      $cliente->DataNasc = $datanasc;
      $cliente->Telefone = $telefone;
      $cliente->CEP = $cep;
      $cliente->CPF = $cpf;
      $cliente->Email = $email;
      $cliente->Senha = $senhaFinal;
      $cliente->Token = $clienteToken;

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

}

// ===== Fim do CLIENTE =====
