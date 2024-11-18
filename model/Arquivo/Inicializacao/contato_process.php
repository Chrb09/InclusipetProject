<?php
require_once('globals.php');
require_once('db.php');
require_once('../../Classes/Modelagem/Message.php');


$message = new Message($BASE_URL);

$message->setMessage("Email enviado com sucesso!", "success", "popup", "../../../view/pages/Contato/contato.php");