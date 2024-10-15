<?php 

  require_once('globals.php');
  require_once('db.php');
  require_once('Classes/Message.php');
  require_once('Classes/Cliente.php');
  require_once('../controller/ClienteDAO.php');

  $message = new Message($BASE_URL);
  $clienteDao = new ClienteDAO($conn, $BASE_URL);

  // Resgata o tipo do formulário
  $type = filter_input(INPUT_POST, "type");

  // ===== COMEÇO DOo CLIENTE =====
  
  if($type === 'register_client') {

    $nome = filter_input(INPUT_POST, "sign-up-name");
    $datanasc = filter_input(INPUT_POST, "sign-up-date");
    $telefone = filter_input(INPUT_POST, "sign-up-tel");
    $cep = filter_input(INPUT_POST, "sign-up-cep");
    $cpf = filter_input(INPUT_POST, "sign-up-cpf");
    $email = filter_input(INPUT_POST, "sign-up-email");
    $senha = filter_input(INPUT_POST, "sign-up-password");

    // Verificação de dados mínimos 
    if($nome && $datanasc && $telefone && $cep && $cpf && $email && $senha) {
      // TODO fazer verificar o CPF
      if($clienteDao->findByEmail($email) === false) {
        // TODO
      }
      else {
        // TODO
      }
    }
    else {
      // Enviar uma msg de erro, de dados faltantes
      $message->setMessage("Por favor, preencha todos os campos.", "error", "back");
    }
  }
  else if($type === 'login_client') {
    
    $email = filter_input(INPUT_POST, "log-in-email");
    $senha = filter_input(INPUT_POST, "log-in-password");

  }

  // ===== Fim do CLIENTE =====
