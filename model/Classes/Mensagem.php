<?php

class Mensagem {
  private $url;

  public function __construct($url) {
    $this -> url = $url;
  }

  public function setMensagem($msg, $type, $redirect = "index.php") { // TODO redicionar para a index.php corretamente

    $_SESSION["msg"] = $msg;
    $_SESSION["type"] = $type;

    if($redirect != "back") {
      header("Location: $this -> url" . $redirect);
    } else {
      header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

  }

  public function getMensagem() {

    if(!empty($_SESSION["msg"])) {
      return [
        "msg" => $_SESSION["msg"],
        "type" => $_SESSION["type"]
      ];
    } else {
      return false;
    }

  }

  public function clearMensagem() {
    $_SESSION["msg"] = "";
    $_SESSION["type"] = "";
  }

}
