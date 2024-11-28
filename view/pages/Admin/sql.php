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
} else if ($operacao == 'editar') {
    // Atualização
    try {
        if (!isset($dados['primaryKey'])) {
            echo json_encode(['sucesso' => false, 'mensagem' => 'Chave primária não fornecida.']);
            exit;
        }

        $primaryKey = $dados['primaryKey'] ?? null; // Verifica se 'primaryKey' existe no array

        if (!$primaryKey || !isset($dados[$primaryKey])) {
            echo json_encode([
                'sucesso' => false,
                'mensagem' => 'Chave primária inválida ou não encontrada nos dados.'
            ]);
            exit;
        }
        $primaryKeyValue = $dados[$primaryKey];
        unset($dados['primaryKey']); // Remove a chave primária para não ser incluída na lista de colunas
        unset($dados[$primaryKey]);

        // Cria a string para o SET do SQL dinamicamente
        $setClause = implode(', ', array_map(fn($campo) => "$campo = :$campo", array_keys($dados)));

        $sql = "UPDATE $tabela SET $setClause WHERE $primaryKey = :primaryKey";
        $stmt = $conn->prepare($sql);

        // Bind dos campos para o SET
        foreach ($dados as $campo => $valor) {
            $stmt->bindValue(":$campo", $valor);
        }
        // Bind da primary key
        $stmt->bindValue(":primaryKey", $primaryKeyValue);

        if ($stmt->execute()) {
            echo json_encode(['sucesso' => true, 'mensagem' => 'Registro atualizado com sucesso!']);
        } else {
            echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao atualizar registro.']);
        }
    } catch (Exception $e) {
        // Retorna erro
        echo json_encode(['sucesso' => false, 'erro' => $e->getMessage()]);
    }
}

