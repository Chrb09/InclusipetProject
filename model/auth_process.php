<?php

  // TODO arrumar o nome dos arquivos
  require_once("globals.php");
  require_once("db.php");
  require_once("Classes/Cliente.php");
  require_once("Classes/Message.php");
  require_once("../controller/ClienteDAO.php");

  $message = new Message($BASE_URL);

  // ===== Começo do CLIENTE =====
  $clienteDao = new ClienteDAO($conn, $BASE_URL); 

  // Resgata o tipo do formulário
  $type = filter_input(INPUT_POST, "type"); 

  // Verificação do tipo de formulário (CADASTRAR)
  if($type === "register_client") { // TODO
    $nome = filter_input(INPUT_POST, "sign-up-name");
    $datanasc = filter_input(INPUT_POST, "sign-up-date");
    $telefone = filter_input(INPUT_POST, "sign-up-tel");
    $cep = filter_input(INPUT_POST, "sign-up-cep");
    $cpf = filter_input(INPUT_POST, "sign-up-cpf");
    $email = filter_input(INPUT_POST, "sign-up-email");
    $senha = filter_input(INPUT_POST, "sign-up-password");

    // Verificação de dados mínimos 
    if($nome && $datanasc && $telefone && $cep && $pf && $email && $senha) 
    {
      /*
        // Verificar se o e-mail já está cadastrado no sistema
        if($clienteDao->findByEmail($email) === false) 
        {
          // TODO dps verificar se o cpf n é idêntico a um registrado no banco
          $cliente = new Cliente();

          // Criação do token e da senha
          $clienteToken = $cliente->generateToken();
          $finalSenha = $cliente->generateSenha($senha);

          $cliente->Nome = $nome;
          $cliente->DataNasc = $datanasc;
          $cliente->Telefone = $telefone;
          $cliente->CEP = $cep;
          $cliente->CPF = $cpf;
          $cliente->Email = $email;
          $cliente->Senha = $finalSenha;
          $cliente->Token = $clienteToken;

          $auth = true;

          $clienteDao->create($cliente, $auth); 
        } 
        else {  
          // Envia uma Mensagm de erro, usuário já existe
          $message->setMessage("Usuário já cadastrado, tente outro e-mail.", "error", "back");
        }
        */
      } 
      else {
      // Enviar uma mensagem de erro, de dados faltantes
      $message->setMessage("Por favor, preencha todos os campos.", "error", "back");
      } 
    } 
    // Verificação do tipo de formulário (LOGIN)
    else if($type === "login_client") {

    $email = filter_input(INPUT_POST, "log-in-email");
    $senha = filter_input(INPUT_POST, "log-in-password");

    // Tenta autenticar usuário
    if($clienteDao->authenticateCliente($email, $senha)) {
      $message->setMessage("Seja bem-vindo!", "success", "perfil.php");

    // Redireciona o usuário, caso não conseguir autenticar
    } else {
      $message->setMessage("Usuário e/ou senha incorretos.", "error", "back");
    }
  } else {
    $message->setMessage("Informações inválidas!", "error", "index.php");
  }                                                                                                                        
