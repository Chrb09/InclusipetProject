<?php

require_once("../../../view/components/headers/header.php");

if($clienteDao) {
  $clienteDao->destroyToken();
}
if($funcionarioDao) {
  $funcionarioDao->destroyToken();
}
