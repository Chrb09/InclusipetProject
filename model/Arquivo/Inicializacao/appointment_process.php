<?php
// Arquivo de agendamento de consulta

require_once('globals.php');
require_once('db.php');

require_once('../../Classes/Modelagem/Message.php');
require_once('../../Classes/Modelagem/Agendamento.php');
require_once('../../../controller/DAO/AgendamentoDAO/AgendamentoDAO.php');
require_once('../../../controller/DAO/ClienteDAO/ClienteDAO.php');

$message = new Message($BASE_URL);
$clienteDao = new ClienteDAO($conn, $BASE_URL);
$agendamentoDao = new AgendamentoDAO($conn, $BASE_URL);

$clienteData = $clienteDao->verifyToken();

// Resgata o tipo do formulário
$type = filter_input(INPUT_POST, "type");

// ===== COMEÇO DO AGENDAMENTO =====

if ($type === 'create_appointment') {

    $unidade = filter_input(INPUT_POST, "unidade");
    $servico = filter_input(INPUT_POST, "servico");
    $especialidade = filter_input(INPUT_POST, "especialidade");
    $funcionario = filter_input(INPUT_POST, "funcionario");
    $data = filter_input(INPUT_POST, "data");
    $horario = filter_input(INPUT_POST, "horario");
    $pet = filter_input(INPUT_POST, "pet");

    // Verificação de dados mínimos 
    if (!$unidade || !$servico || !$especialidade || !$funcionario || !$data || !$horario || !$pet) {

        // Enviar uma msg de erro, de dados faltantes
        $message->setMessage("Preencha todos os campos.", "error", "popup", "../../../view/pages/Perfil/agendamento.php");
    } else {
        $agendamento = new Agendamento();

        $agendamento->CodUnidade = $unidade;
        $agendamento->CodServico = $servico;
        $agendamento->CodCliente = $clienteData->codcliente;
        // $agendamento->especialidade = $especialidade;
        $agendamento->CodFuncionario = $funcionario;
        $agendamento->Data = $data;
        $agendamento->Hora = $horario;
        $agendamento->CodAnimal = $pet;
        $agendamento->Cancelado = '0';

        $agendamentoDao->create($agendamento, 0);
    }
} else if ($type === 'cancelar') {
    $codagendamento = filter_input(INPUT_POST, "id");
    $agendamentoDao->cancel($codagendamento);

    //Envio do relatorio
} else if ($type === 'enviarrelatorio') {
    // Coleta de informações 
    $codagendamento = filter_input(INPUT_POST, "id");
    $info = filter_input(INPUT_POST, "info");


} else {
    $message->setMessage("Informações inválidas!", "error", "toast", "../../../view/pages/index/index.php");
}
// ===== FIM DO AGENDAMENTO =====