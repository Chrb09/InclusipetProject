<?php
// Configura o cabeçalho para JSON
require_once('../../../model/Arquivo/inicializacao/globals.php');
require_once('../../../model/Arquivo/inicializacao/db.php');
require_once('../../../model/Classes/Modelagem/Message.php');
require_once('../../../controller/DAO/FuncionarioDAO/FuncionarioDAO.php');

$funcionarioDao = new FuncionarioDAO($conn, $BASE_URL);
$funcionarioData = $funcionarioDao->verifyToken(true);

if ($funcionarioData->admin != '1') {
    $message->setMessage("É necessario ser administrador para acessar essa página!", "error", "popup", "../../../view/pages/Funcionario/perfil.php");
    exit();
}

$tabela = $_GET['tabela'];
$primaryKey = $_GET['primaryKey'];
$value = $_GET['value'];

try {
    if (!$primaryKey) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Chave primária não fornecida.']);
        exit;
    }


    $sql = "DELETE FROM $tabela WHERE $primaryKey = :primaryKey";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":primaryKey", $value);

    if ($stmt->execute()) {
        echo json_encode(['sucesso' => true, 'mensagem' => 'Registro deletado com sucesso!']);
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao deletar registro.']);
    }

} catch (Exception $e) {
    // Retorna erro
    echo json_encode(['sucesso' => false, 'erro' => $e->getMessage()]);
}