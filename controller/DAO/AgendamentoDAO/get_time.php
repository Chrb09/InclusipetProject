<?php
require_once('../../../model/Arquivo/inicializacao/globals.php');
require_once('../../../model/Arquivo/inicializacao/db.php');
require_once('AgendamentoDAO.php');
require_once('../FuncionarioDao/FuncionarioDAO.php');

if (isset($_GET['data'])) {
    $dataConsulta = $_GET['data'];
    $funcionarioId = $_GET['funcionario'];
    $agendamentoDao = new AgendamentoDAO($conn, $BASE_URL);
    $funcionarioDao = new FuncionarioDAO($conn, $BASE_URL);
    $funcionario = $funcionarioDao->findById($funcionarioId);
    $unidade = $agendamentoDao->getUnidadeByCod($funcionario->codunidade);
    $horaInicial = $unidade[5];
    $horaFinal = $unidade[6];
    $agendamentos = $agendamentoDao->getAgendamentosByDate($dataConsulta);
    $horas = [];
    $tempo = new DateTime('midnight');
    $hoje = new DateTime('now', new DateTimeZone("America/Sao_Paulo"));

    for ($i = 0; $i < 48; $i++) {
        if ($dataConsulta == $hoje->format('Y-m-d')) {
            if (strtotime($tempo->format('H:i:s')) > strtotime($hoje->format('H:i:s'))) {
                if (strtotime($tempo->format('H:i:s')) > strtotime($horaInicial) && strtotime($tempo->format('H:i')) < strtotime($horaFinal)) {
                    $duplicado = 0;
                    foreach ($agendamentos as $agendamento) {
                        if (strtotime($tempo->format('H:i')) == strtotime($agendamento->Hora)) {
                            $duplicado = 1;
                        }
                    }
                    if ($duplicado == 0) {
                        $horas[$i] = $tempo->format('H:i');
                    }
                    $tempo->modify("+30 minutes");
                } else {
                    $tempo->modify("+30 minutes");
                }
            } else {
                $tempo->modify("+30 minutes");
            }
        } else {
            if (strtotime($tempo->format('H:i:s')) > strtotime($horaInicial) && strtotime($tempo->format('H:i')) < strtotime($horaFinal)) {
                $duplicado = 0;
                foreach ($agendamentos as $agendamento) {
                    if (strtotime($tempo->format('H:i')) == strtotime($agendamento->Hora)) {
                        $duplicado = 1;
                    }
                }
                if ($duplicado == 0) {
                    $horas[$i] = $tempo->format('H:i');
                }
                $tempo->modify("+30 minutes");
            } else {
                $tempo->modify("+30 minutes");
            }
        }

    }
    $horas = array_values(array_filter($horas));
    echo json_encode($horas);
    exit;
}

echo json_encode([]);
