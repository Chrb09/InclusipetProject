<?php

class Agendamento
{
  public $CodAgendamento;
  public $CodFuncionario;
  public $CodAnimal;
  public $CodCliente;
  public $Data;
  public $Hora;
  public $Info;
  public $Resultado;
  public $CodServico;
  public $Cancelado;


  public function fileGenerateName()
  {
    return bin2hex(random_bytes(60));
  }

}

interface AgendamentoDAOInterface
{
  public function buildAgendamento($data);
  public function create(Agendamento $agendamento, $user);
  public function update(Agendamento $agendamento);
  public function cancel($CodAgendamento);
  public function getAgendamentoByCodCliente($CodCliente);
  public function getAgendamentoByCodAgendamento($CodAgendamento);
  public function getAllAgendamento();
  public function getAgendamentosByDate($data);
  public function getAgendamentoByInfoDateType($CodPet, $data, $tipo);
  public function getAgendamentoByInfoDate($CodPet, $data);
  public function getAllAgendamentoByNoInfo($CodFuncionario);
  public function getAllAgendamentoByInfo($CodFuncionario);
  public function getAllAgendamentoByFuncionario($CodFuncionario);
  public function getAllNextAgendamento($CodFuncionario);
  public function getAgendamentoCount();
  public function getAllUnidade();
  public function getAllServico();
  public function getAllEspecialidade();
  public function getUnidadeByCod($CodUnidade);
  public function getServicoByCod($CodServico);
  public function getEspecialidadeByCod($CodEspecialidade);
}