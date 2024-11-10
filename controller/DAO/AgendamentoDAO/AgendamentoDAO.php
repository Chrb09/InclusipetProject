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
        $agendamento->Data = $data["Data"];
        $agendamento->Hora = $data["Hora"];
        $agendamento->Info = $data["Info"];
        $agendamento->Resultado = $data["Resultado"];
        $agendamento->CodServico = $data["CodServico"];
        $agendamento->Cancelado = $data["Cancelado"];

        return $agendamento;
    }


    public function create(Agendamento $agendamento)
    {
        $stmt = $this->conn->prepare("INSERT INTO agendamento(CodFuncionario, CodAnimal, CodCliente, CodUnidade, Data, Hora, CodServico, Cancelado) 
      VALUES (:CodFuncionario, :CodAnimal, :CodCliente, :CodUnidade, :Data, :Hora, :CodServico, :Cancelado)");

        // Liga os parâmetros da query com os atributos do objeto Cliente
        $stmt->bindParam(":CodFuncionario", $agendamento->CodFuncionario);
        $stmt->bindParam(":CodAnimal", $agendamento->CodAnimal);
        $stmt->bindParam(":CodCliente", $agendamento->CodCliente);
        $stmt->bindParam(":CodUnidade", $agendamento->CodUnidade);
        $stmt->bindParam(":Data", $agendamento->Data);
        $stmt->bindParam(":Hora", $agendamento->Hora);
        $stmt->bindParam(":CodServico", $agendamento->CodServico);
        $stmt->bindParam(":Cancelado", $agendamento->Cancelado);

        $stmt->execute();

        $this->message->setMessage("Visita agendada com sucesso!", "success", "popup", "../../../view/pages/perfil/meusagendamentos.php");
    }
    public function getAgendamentoByCodCliente($CodCliente)
    {
        $agendamentos = [];

        $stmt = $this->conn->prepare("SELECT * FROM agendamento WHERE CodCliente = :CodCliente ORDER BY Data DESC");
        $stmt->bindParam(":CodCliente", $CodCliente);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $agendamentosArray = $stmt->fetchAll();

            foreach ($agendamentosArray as $agendamento) {
                $agendamentos[] = $this->buildAgendamento($agendamento);
            }
        }

        return $agendamentos;
    }
    public function getAgendamentoByCodAgendamento($CodAgendamento)
    {
        $stmt = $this->conn->prepare("SELECT * FROM agendamento WHERE CodAgendamento = :CodAgendamento");
        $stmt->bindParam(":CodAgendamento", $CodAgendamento);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $agendamento = $stmt->fetch();

            $Agendamento = $this->buildAgendamento($agendamento);
        }

        return $Agendamento;
    }
    public function getAllAgendamento()
    {
        $agendamentos = [];

        $stmt = $this->conn->prepare("SELECT * FROM agendamento WHERE Cancelado = 0 ORDER BY Data ASC");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $agendamentosArray = $stmt->fetchAll();

            foreach ($agendamentosArray as $agendamento) {
                $agendamentos[] = $this->buildAgendamento($agendamento);
            }
        }

        return $agendamentos;
    }
    public function getAgendamentoCount()
    {
        $stmt = $this->conn->prepare("SELECT * FROM agendamento");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $agendamentoArray = $stmt->fetchAll();

            return count($agendamentoArray);
        }

    }
    public function getAgendamentoByInfoDate($CodPet, $data)
    {
        $agendamentos = [];

        $stmt = $this->conn->prepare("SELECT * FROM agendamento WHERE Info IS NOT NULL AND CodAnimal = :CodAnimal AND Data > :Data");
        $stmt->bindParam(":CodAnimal", $CodPet);
        $stmt->bindParam(":Data", $data);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $agendamentosArray = $stmt->fetchAll();

            foreach ($agendamentosArray as $agendamento) {
                $agendamentos[] = $this->buildAgendamento($agendamento);
            }
        }

        return $agendamentos;
    }
    public function getAgendamentoByInfoDateType($CodPet, $data, $tipo)
    {
        $agendamentos = [];

        $stmt = $this->conn->prepare("SELECT * FROM agendamento WHERE Info IS NOT NULL AND CodAnimal = :CodAnimal AND Data > :Data AND CodServico = :CodServico");
        $stmt->bindParam(":CodAnimal", $CodPet);
        $stmt->bindParam(":Data", $data);
        $stmt->bindParam(":CodServico", $tipo);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $agendamentosArray = $stmt->fetchAll();

            foreach ($agendamentosArray as $agendamento) {
                $agendamentos[] = $this->buildAgendamento($agendamento);
            }
        }

        return $agendamentos;
    }

    public function cancel($CodAgendamento)
    {
        $stmt = $this->conn->prepare("UPDATE Agendamento SET Cancelado = 1 WHERE CodAgendamento = :CodAgendamento");

        $stmt->bindParam(":CodAgendamento", $CodAgendamento);

        $stmt->execute();

        // Redireciona para o perfil do usuario
        $this->message->setMessage("Agendamento cancelado!", "success", "toast", "../../../view/pages/Perfil/meusagendamentos.php");
    }

    public function getAllUnidade()
    {
        $stmt = $this->conn->prepare("SELECT * FROM Unidade");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $unidade = $stmt->fetchAll();
            return $unidade;
        }
    }

    public function getAllServico()
    {
        $stmt = $this->conn->prepare("SELECT * FROM Servico");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $servico = $stmt->fetchAll();
            return $servico;
        }
    }

    public function getAllEspecialidade()
    {
        $stmt = $this->conn->prepare("SELECT * FROM Cargo");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $cargo = $stmt->fetchAll();
            return $cargo;
        }
    }

    public function getUnidadeByCod($CodUnidade)
    {
        $stmt = $this->conn->prepare("SELECT * FROM Unidade WHERE CodUnidade = :CodUnidade");
        $stmt->bindParam(":CodUnidade", $CodUnidade);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $unidade = $stmt->fetch();
            return $unidade;
        }
    }

    public function getServicoByCod($CodServico)
    {
        $stmt = $this->conn->prepare("SELECT Descricao FROM Servico WHERE CodServico = :CodServico");
        $stmt->bindParam(":CodServico", $CodServico);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $servico = $stmt->fetch();
            return $servico[0];
        }
    }

    public function getEspecialidadeByCod($CodEspecialidade)
    {
        $stmt = $this->conn->prepare("SELECT Descricao FROM Cargo WHERE CodCargo = :CodEspecialidade");
        $stmt->bindParam(":CodEspecialidade", $CodEspecialidade);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $cargo = $stmt->fetch();
            return $cargo[0];
        }
    }
}