<?php

class Conexao extends PDO {
    private static $instancia; 
    private $query; // query SQL que será executada

    // Configurações do banco de dados
    private $host = "127.0.0.1";   // endereço do servidor
    private $usuario = "root";     // usuário do servidor
    private $senha = "";           // senha do servidor
    private $db = "bd_inclusipet"; // banco do mysql

    // Construtor da classe PDO, passando as informações para o banco de dados
    public function __construct() {
        parent::__construct("mysql:host=$this -> host;dbname=$this -> db", "$this -> usuario", "$this -> senha");
    }

    public static function getInstance() {
        if (!isset(self::$instancia)) { // verifica se a instância foi criada
            try {
                self::$instancia = new Conexao;   // cria uma nova instância
                echo 'Conectado com sucesso!'; 
            } catch (Exception $erro) {
                echo 'Erro ao conectar com o banco de dados';
                exit();
            }
        }
        return self::$instancia;
    }

    // Executa uma query SQL
    public function sql($query) {
        $this -> getInstance();                // chama o metodo getInstance()
        $this -> query = $query;               // armazena a query 
        $stmt = $pdo -> prepare($this->query); // prepara e executa a query 
        $stmt -> execute();                   
        $pdo = null;                           // fecha a conexão
    }
}

?>