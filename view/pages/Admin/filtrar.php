<?php
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

$tabela = $_GET['tabela'];  // Tabela a ser consultada
$pesquisar = $_GET['pesquisar'];  // Valor para pesquisa
$coluna = $_GET['coluna'];  // Coluna onde será realizada a pesquisa
$mostrar = $_GET['mostrar'];  // Ordem da classificação: 'asc' ou 'desc'

// Verifica se a variável de pesquisa está definida
if (!empty($pesquisar) && !empty($coluna)) {
    // Prepara a cláusula WHERE para pesquisar na coluna específica
    $searchQuery = "WHERE $coluna LIKE :pesquisar";
} else {
    $searchQuery = "";  // Caso não haja pesquisa, não filtra por nenhum campo
}

// Verifica a direção da ordenação (ascendente ou descendente)
$orderQuery = "ORDER BY $coluna " . ($mostrar === 'asc' ? 'ASC' : 'DESC');

// Monta a consulta final
$query = "SELECT * FROM $tabela $searchQuery $orderQuery";

// Prepara e executa a consulta
$stmt = $conn->prepare($query);

// Se houver um valor para pesquisar, aplica o binding do parâmetro
if (!empty($pesquisar)) {
    $pesquisar = "%" . $pesquisar . "%"; // Adiciona os % para busca parcial
    $stmt->bindParam(':pesquisar', $pesquisar);
}

// Executa a consulta
$stmt->execute();

// Obtém os resultados
$itens = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Retorna os resultados como JSON
echo json_encode($itens);
exit;