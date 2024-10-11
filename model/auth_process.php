<?php

  // TODO arrumar o nome dos arquivos
  require_once("globals.php");
  require_once("db.php");
  require_once("Classes/Cliente.php");
  require_once("Classes/Menssage.php");
  require_once("../controller/ClienteDAO.php");

  $message = new Mensagem($BASE_URL);

  // ===== Começo do CLIENTE =====
  $clienteDao = new ClienteDAO($conn, $BASE_URL); 

  // Resgata o tipo do formulário
  $type = filter_input(INPUT_POST, "type"); 

  // Verificação do tipo de formulário
  if($type === "register_client") { // TODO
    $nome = filter_input(INPUT_POST, "nome");
    $datanasc = filter_input(INPUT_POST, "datanasc");
    $telefone = filter_input(INPUT_POST, "telefone");
    $cep = filter_input(INPUT_POST, "cep");
    $cpf = filter_input(INPUT_POST, "cpf");
    $email = filter_input(INPUT_POST, "email");
    $senha = filter_input(INPUT_POST, "senha");

    // Verificação de dados mínimos 
    if($nome && $datanasc && $telefone && $cep && $pf && $email && $senha) 
    {
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
      } 
      else {

      // Enviar uma mensagem de erro, de dados faltantes
      $message->setMessage("Por favor, preencha todos os campos.", "error", "back");
      } 
    } 
    else if($type === "login_client") {

    $email = filter_input(INPUT_POST, "email");
    $senha = filter_input(INPUT_POST, "senha");

    // Tenta autenticar usuário
    if($clienteDao->authenticateCliente($email, $senha)) {
      $message->setMessage("Seja bem-vindo!", "success", "editprofile.php");

    // Redireciona o usuário, caso não conseguir autenticar
    } else {
      $message->setMessage("Usuário e/ou senha incorretos.", "error", "back");
    }
  } else {
    $message->setMessage("Informações inválidas!", "error", "index.php");
  }                                                                                                                        
