<head>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- <script src="../../assets/js/perfil.js"></script> -->
</head>

<?php

  class Message
  {
    private $url;

    public function __construct($url) {
      $this -> url = $url;
    }

    public function setMessage($msg, $type, $redirect = "index.php") // TODO redicionar para a index.php corretamente
    { 
      $_SESSION["msg"] = $msg;
      $_SESSION["type"] = $type;

      if($redirect != "back") {
        header("Location: $this -> url" . $redirect);
      } 

      else {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
      }
    }

    public function getMessage() 
    {
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

    public function clearMessage() {
      $_SESSION["msg"] = "";
      $_SESSION["type"] = "";
    }
    
  }
