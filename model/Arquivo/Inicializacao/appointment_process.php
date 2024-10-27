<?php
// Arquivo de agendamento de consulta

require_once('globals.php');
require_once('db.php');

require_once('../../Classes/Modelagem/Message.php');
require_once('../../Classes/Modelagem/Agendamento.php');
require_once('../../../controller/DAO/AgendamentoDAO/AgendamentoDAO.php');

$message = new Message($BASE_URL);
$agendamentoDao = new AgendamentoDAO($conn, $BASE_URL);

// Resgata o tipo do formulário
$type = filter_input(INPUT_POST, "type");

// ===== COMEÇO DO AGENDAMENTO =====

if ($type === 'register_appointment') {
    $nome = filter_input(INPUT_POST, "sign-up-name");
}
// ===== FIM DO AGENDAMENTO =====