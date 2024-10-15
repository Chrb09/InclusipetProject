<?php

class Message
{

  private $url;

  public function __construct($url)
  {
    $this->url = $url;
  }

  // Define uma mensagem, o tipo de mensagem da sessão e permite redirecionar o usuário.
  public function setMessage($msg, $type, $format, $redirect = "index.php")
  {

    $_SESSION["msg"] = $msg;
    $_SESSION["type"] = $type;
    $_SESSION["format"] = $format;

    if ($redirect != "back" && $redirect != "none") {
      header("Location: $this->url" . $redirect);
    } elseif ($redirect != "none") {
      header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

  }

  // Pega a mensagem armazenada na sessão
  public function getMessage()
  {
    if (!empty($_SESSION["msg"])) {
      return [
        "msg" => $_SESSION["msg"],
        "type" => $_SESSION["type"],
        "format" => $_SESSION["format"]
      ];
    } else {
      return false;
    }
  }

  // Limpa a mensagem e o tipo da sessão
  public function clearMessage()
  {
    $_SESSION["msg"] = "";
    $_SESSION["type"] = "";
    $_SESSION["format"] = "";
  }

}

?>