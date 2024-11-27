<?php
require_once('../../../model/Arquivo/inicializacao/globals.php');
require_once('../../../model/Arquivo/inicializacao/db.php');
require_once('PetDAO.php');

if (isset($_GET['especie_id'])) {
    $especieId = (int) $_GET['especie_id'];
    $petDao = new PetDAO($conn, $BASE_URL);
    $racas = $petDao->getRacasByEspecie($especieId);
    echo json_encode($racas);
    exit;
}

echo json_encode([]);
