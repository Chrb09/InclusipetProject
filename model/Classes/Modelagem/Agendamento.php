<?php

class Agendamento
{
    public $CodAgendamento;
    public $CodFuncionario;
    public $CodAnimal;
    public $CodCliente;
    public $CodUnidade;
    public $Data;
    public $Hora;
    public $Info;
    public $Resultado;
    public $CodServico;
    public $Cancelado;
}

interface AgendamentoDAOInterface
{
    public function buildAgendamento($data);
    public function create(Agendamento $agendamento);
    public function cancel($CodAgendamento);
    public function getAgendamentoByCodCliente($CodCliente);
    public function getAgendamentoByInfoDateType($CodPet, $data, $tipo);
    public function getAgendamentoByInfoDate($CodPet, $data);

    public function getAgendamentoCount();
    public function getAllUnidade();
    public function getAllServico();
    public function getAllEspecialidade();
    public function getUnidadeByCod($CodUnidade);
    public function getServicoByCod($CodServico);
    public function getEspecialidadeByCod($CodEspecialidade);
}