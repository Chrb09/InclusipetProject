<?php
// Configura o cabeçalho para JSON
require_once('../../../model/Arquivo/inicializacao/globals.php');
require_once('../../../model/Arquivo/inicializacao/db.php');
require_once('../../../model/Classes/Modelagem/Message.php');
header('Content-Type: application/json');

$operacao = $_GET['operacao'];
$tabela = $_GET['tabela'];

$input = file_get_contents('php://input');
$dados = json_decode($input, true);

if ($operacao == 'inserir') {


    try {
        $colunas = implode(', ', array_keys($dados)); // Lista de colunas
        $placeholders = ':' . implode(', :', array_keys($dados)); // Lista de placeholders, ex: ":campo1, :campo2"

        $sql = "INSERT INTO $tabela ($colunas) VALUES ($placeholders)";
        $stmt = $conn->prepare($sql);

        foreach ($dados as $campo => $valor) {
            $stmt->bindValue(":$campo", $valor);
        }

        if ($stmt->execute()) {
            echo json_encode(['sucesso' => true, 'mensagem' => 'Registro inserido com sucesso!']);
        } else {
            echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao inserir registro.']);
        }
    } catch (Exception $e) {
        // Retorna erro
        echo json_encode(['sucesso' => false, 'erro' => $e->getMessage()]);
    }
}
