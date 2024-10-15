<?php

  class Message {
  
    private $url;

    public function __construct($url) {
      $this->url = $url;
    }

    // Define uma mensagem, o tipo de mensagem da sessão e permite redirecionar o usuário.
    public function setMessage($msg, $type, $redirect = "index.php") {

      $_SESSION["msg"] = $msg;
      $_SESSION["type"] = $type;
  
      if($redirect != "back") { header("Location: $this->url" . $redirect); }
      else { header("Location: " . $_SERVER["HTTP_REFERER"]); }

    }

    // Pega a mensagem armazenada na sessão
    public function getMessage() {
      if(!empty($_SESSION["msg"])) {
        return [ 
              "msg" => $_SESSION["msg"],
              "type" => $_SESSION["type"]
            ];
      } 
      else {
        return false;
      }
    }

    // Limpa a mensagem e o tipo da sessão
    public function clearMessage() {
      $_SESSION["msg"] = "";
      $_SESSION["type"] = "";
    }

  }

?>
  