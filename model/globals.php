<?php
  // Arquivo que armazena as variáveis globais

  session_start();

  // TODO não está funcionando
  $BASE_URL = "http://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["REQUEST_URI"]."?") . "/";