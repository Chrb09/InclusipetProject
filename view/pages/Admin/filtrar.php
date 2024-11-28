<?php
require_once('../../../model/Arquivo/inicializacao/globals.php');
require_once('../../../model/Arquivo/inicializacao/db.php');
require_once('../../../model/Classes/Modelagem/Message.php');

$stmt = $conn->prepare("SELECT * FROM adocao");
$stmt->execute();

$itens = $stmt->fetchAll();
echo json_encode($itens);
exit;