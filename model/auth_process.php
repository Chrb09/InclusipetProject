<?php 

  require_once('globals.php');
  require_once('db.php');
  require_once('Classes/Cliente.php');
  require_once('../controller/ClienteDAO.php');

  // Resgata o tipo do formulário
  $type = filter_input(INPUT_POST, "type");

  // Verificação do tipo de formulário
  if($type === 'register_client') {

    $nome = filter_input(INPUT_POST, "sign-up-name");
    $datanasc = filter_input(INPUT_POST, "sign-up-date");
    $telefone = filter_input(INPUT_POST, "sign-up-tel");
    $cep = filter_input(INPUT_POST, "sign-up-cep");
    $cpf = filter_input(INPUT_POST, "sign-up-cpf");
    $email = filter_input(INPUT_POST, "sign-up-email");
    $senha = filter_input(INPUT_POST, "sign-up-password");

  }
  else if($type === 'login_client') {
    
    $email = filter_input(INPUT_POST, "log-in-email");
    $senha = filter_input(INPUT_POST, "log-in-password");

  }
