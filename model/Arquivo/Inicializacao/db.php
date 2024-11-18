<?php
  // Arquivo que faz a conexão com o banco de dados

  $db_name = "bd_inclusipet"; // Nome do Banco de Dados
  $db_host = "localhost";     // Host do Banco de Dados
  $db_user = "root";          // Nome do Usuário
  $db_pass = "";              // Senha do Usuário

  $conn = new PDO("mysql:dbname=". $db_name .";host=". $db_host, $db_user, $db_pass);

  // Habilita os erros PDO
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);