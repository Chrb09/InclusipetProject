<?php

require_once("globals.php");
require_once("db.php");
require_once("Cliente.php");
require_once("Mensagem.php");
require_once("../controller/ClienteDAO.php");

$message = new Mensagem($BASE_URL);
$ClienteDAO = new ClienteDAO($conn, $BASE_URL);

$type = filter_input(INPUT_POST, "type"); // pega o tipo do formulário

if($type === "register") { // Verificação do tipo de formulário
    $Nome = filter_input(INPUT_POST, "Nome");
    $DataNasc = filter_input(INPUT_POST, "DataNasc");
    $Telefone = filter_input(INPUT_POST, "Telefone");
    $CEP = filter_input(INPUT_POST, "CEP");
    $CPF = filter_input(INPUT_POST, "CPF");
    $Email = filter_input(INPUT_POST, "Email");
    $Senha = filter_input(INPUT_POST, "Senha");
    
    // Verificação de dados mínimos 
    if ($Nome && $DataNasc && $Telefone && $CEP && $CPF && $Email && $Senha) {
        // Verificar se o e-mail já está cadastrado no sistema
        if ($ClienteDAO->findByEmail($Email) === false) {
          $cliente = new Cliente();
  
          // Criação do token e da senha
          $userToken = $user->generateToken();
          $finalPassword = $user->generatePassword($Senha);
  
            $cliente->Nome = $Nome;
            $cliente->DataNasc = $DataNasc;
            $cliente->Telefone = $Telefone;
            $cliente->CEP = $CEP;
            $cliente->CPF = $CPF;
            $cliente->Email = $Email;
            $cliente->Senha = $finalPassword;
            $cliente->token = $userToken;
            
            $auth = true;
            $clienteDAO->create($cliente, $auth);
        } 
        else {  
          // Enviar uma msg de erro, usuário já existe
          $message->setMessage("Usuário já cadastrado, tente outro e-mail.", "error", "back");
        }
    } 
    else { // Enviar uma msg de erro, de dados faltantes
      $message->setMessage("Por favor, preencha todos os campos.", "error", "back");
    }
}

else if($type === "login") {
    $Email = filter_input(INPUT_POST, "Email");
    $Senha = filter_input(INPUT_POST, "Senha");
  
    // Tenta autenticar usuário
    if($ClienteDAO->authenticateCliente($Email, $Senha)) {
      $message->setMessage("Seja bem-vindo!", "success", "editprofile.php");
  
    // Redireciona o usuário, caso não conseguir autenticar
    } else {
      $message->setMessage("Usuário e/ou senha incorretos.", "error", "back");
  
    }
  
  } else {
  
    $message->setMessage("Informações inválidas!", "error", "index.php");

}                                                                                                                        
