<?php
// Configura o cabeçalho para JSON
require_once('../../../model/Arquivo/inicializacao/globals.php');
require_once('../../../model/Arquivo/inicializacao/db.php');
require_once('../../../model/Classes/Modelagem/Message.php');
header('Content-Type: application/json');

$tabela = $_GET['tabela'];

$input = file_get_contents('php://input');
$dados = json_decode($input, true);

try {
    if (!isset($dados['primaryKey'])) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Chave primária não fornecida.']);
        exit;
    }

    $primaryKey = $dados['primaryKey'] ?? null; // Verifica se 'primaryKey' existe no array

    $primaryKeyValue = $dados["primaryKeyValue "];

    $sql = "DELETE FROM $tabela WHERE $primaryKey = :primaryKey";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":primaryKey", $primaryKeyValue);

    if ($stmt->execute()) {
        echo json_encode(['sucesso' => true, 'mensagem' => 'Registro deletado com sucesso!']);
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao deletar registro.']);
    }

} catch (Exception $e) {
    // Retorna erro
    echo json_encode(['sucesso' => false, 'erro' => $e->getMessage()]);
}