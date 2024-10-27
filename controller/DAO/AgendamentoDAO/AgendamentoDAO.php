<?php

require_once('../../../model/Classes/Modelagem/Agendamento.php');
require_once("../../../model/Classes/Modelagem/Message.php");

class AgendamentoDAO implements AgendamentoDAOInterface
{
    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url)
    {
        $this->conn = $conn;
        $this->url = $url;
        $this->message = new Message($url);
    }

    public function buildAgendamento($data)
    {
        $agendamento = new Agendamento();

        $agendamento->CodAgendamento = $data["CodAgendamento"];
        $agendamento->CodFuncionario = $data["CodFuncionario"];
        $agendamento->CodAnimal = $data["CodAnimal"];
        $agendamento->CodCliente = $data["CodCliente"];
        $agendamento->CodUnidade = $data["CodUnidade"];
        $agendamento->Servico = $data["Servico"];
        $agendamento->Data = $data["Data"];
        $agendamento->Hora = $data["Hora"];
        $agendamento->Info = $data["Info"];
        $agendamento->Resultado = $data["Resultado"];
        $agendamento->CodServico = $data["CodServico"];

        return $agendamento;
    }


    public function create(Agendamento $agendamento)
    {

    }

    public function update(Agendamento $agendamento)
    {

    }

    public function destroy($CodAgendamento)
    {

    }

    public function getUnidade()
    {
        $stmt = $this->conn->prepare("SELECT Nome FROM Unidade");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $unidade = $stmt->fetchAll();
            return $unidade;
        }
    }

    public function getServico()
    {
        $stmt = $this->conn->prepare("SELECT Descricao FROM Servico");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $servico = $stmt->fetchAll();
            return $servico;
        }
    }

    public function getEspecialidade()
    {
        $stmt = $this->conn->prepare("SELECT Descricao FROM Cargo");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $cargo = $stmt->fetchAll();
            return $cargo;
        }
    }
}