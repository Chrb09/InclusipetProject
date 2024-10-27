<?php

class Agendamento
{
    public $CodAgendamento;
    public $CodFuncionario;
    public $CodAnimal;
    public $CodCliente;
    public $CodUnidade;
    public $Servico;
    public $Data;
    public $Hora;
    public $Info;
    public $Resultado;
    public $CodServico;
}

interface AgendamentoDAOInterface
{
    public function buildAgendamento($data);
    public function create(Agendamento $agendamento);
    public function update(Agendamento $agendamento);
    public function destroy($CodAgendamento);
    public function getUnidade();
    public function getServico();
    public function getEspecialidade();
}