<?php

// TODO arrumar o nome dos arquivos
require_once("globals.php");
require_once("db.php");
require_once("Classes/Cliente.php");
require_once("Classes/Mensagem.php");
require_once("../controller/ClienteDAO.php");

$message = new Mensagem($BASE_URL);


// ===== Começo do CLIENTE =====
$ClienteDao = new ClienteDAO($conn, $BASE_URL); 

// Resgata o tipo do formulário
$type = filter_input(INPUT_POST, "type"); 

// Verificação do tipo de formulário
if($type === "register_cliente") { // TODO
  $name = filter_input(INPUT_POST, "name");
  $lastname = filter_input(INPUT_POST, "lastname");
  $email = filter_input(INPUT_POST, "email");
  $password = filter_input(INPUT_POST, "password");
  $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

  // Verificação de dados mínimos 
  if($name && $lastname && $email && $password) {

      // Verificar se o e-mail já está cadastrado no sistema
      if($ClienteDao->findByEmail($email) === false) {

        $cliente = new Cliente();

        // Criação de token e senha
        $clienteToken = $cliente->generateToken();
        $finalPassword = $cliente->generatePassword($password);

        $cliente->name = $name;
        $cliente->lastname = $lastname;
        $cliente->email = $email;
        $cliente->password = $finalPassword;
        $cliente->token = $clienteToken;

        $auth = true;

        $clienteDao->create($cliente, $auth);

      } 
      else {  
        // Envia uma msg de erro, usuário já existe
        $message->setMensagem("Usuário já cadastrado, tente outro e-mail.", "error", "back");
      }
    } 
    else {

    // Enviar uma msg de erro, de dados faltantes
    $message->setMensagem("Por favor, preencha todos os campos.", "error", "back");
    } 
  } 
  else if($type === "login_cliente") {

  $email = filter_input(INPUT_POST, "email");
  $password = filter_input(INPUT_POST, "password");

  // Tenta autenticar usuário
  if($clienteDao->authenticatecliente($email, $password)) {
    $message->setMensagem("Seja bem-vindo!", "success", "editprofile.php");

  // Redireciona o usuário, caso não conseguir autenticar
  } else {
    $message->setMensagem("Usuário e/ou senha incorretos.", "error", "back");
  }
} else {
  $message->setMensagem("Informações inválidas!", "error", "index.php");
}                                                                                                                        
