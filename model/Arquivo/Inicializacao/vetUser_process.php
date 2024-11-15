<?php

require_once('../../../model/Arquivo/inicializacao/globals.php');
require_once('../../../model/Arquivo/inicializacao/db.php');
require_once('../../../model/Classes/Modelagem/Pet.php');
require_once('../../Classes/Modelagem/Agendamento.php');
require_once('../../../controller/DAO/AgendamentoDAO/AgendamentoDAO.php');
require_once('../../Classes/Modelagem/Adocao.php');
require_once('../../../controller/DAO/AdocaoDAO/AdocaoDAO.php');
require_once('../../../model/Classes/Modelagem/Message.php');
require_once('../../../controller/DAO/PetDAO/PetDAO.php');
require_once('../../../controller/DAO/ClienteDAO/ClienteDAO.php');

$message = new Message($BASE_URL);
$clienteDao = new ClienteDAO($conn, $BASE_URL);
$petDao = new PetDAO($conn, $BASE_URL);
$adocaoDao = new AdocaoDAO($conn, $BASE_URL);
$agendamentoDao = new AgendamentoDAO($conn, $BASE_URL);


$type = filter_input(INPUT_POST, "type");
$resetimage = filter_input(INPUT_POST, "resetimage");
$codTutor = filter_input(INPUT_POST, "codTutor");

$clienteData = $clienteDao->findById($codTutor);

if ($type === "create_pet") {
    $nome = filter_input(INPUT_POST, "nome");
    $especie = filter_input(INPUT_POST, "especie");
    $raca = filter_input(INPUT_POST, "raca");
    $sexo = filter_input(INPUT_POST, "sexo");
    $datanasc = filter_input(INPUT_POST, "datanasc");
    $dataaprox = filter_input(INPUT_POST, "dataaprox");
    $peso = filter_input(INPUT_POST, "peso");
    $castrado = filter_input(INPUT_POST, "castrado");
    $imageatual = filter_input(INPUT_POST, "imagematual");

    $pet = new Pet();

    if (!$nome || !$especie || !$raca || !$sexo || !$peso || !$castrado) {
        $message->setMessage("Preencha todos os campos.", "error", "toast", "back");
    } else {
        if (!$datanasc && !$dataaprox) {
            $message->setMessage("Preencha a data de nascimento ou a data aproximada.", "error", "popup", "back");
        } else {
            $pet->CodCliente = $clienteData->codcliente;
            $pet->Nome = $nome;
            $pet->CodRaca = $raca;
            $pet->Sexo = $sexo;
            $pet->DataNasc = $datanasc;
            $pet->DataAprox = $dataaprox;
            $pet->Peso = $peso;
            $pet->Castrado = $castrado;


            if ($resetimage == "true") {
                $pet->imagem = "";
            } else {
                if (isset($_FILES["foto-pet-input"]) && !empty($_FILES["foto-pet-input"]["tmp_name"])) {

                    $image = $_FILES["foto-pet-input"];
                    $imageTypes = ["image/jpeg", "image/jpg", "image/png"];
                    $jpgArray = ["image/jpeg", "image/jpg"];

                    if (!in_array($image["type"], $imageTypes)) {
                        $message->setMessage("Tipo inválido de imagem, permitidos PNG ou JPG!", "error", "popup", "back");
                    } else {
                        if (in_array($image["type"], $jpgArray)) {
                            $imageFile = imagecreatefromjpeg($image["tmp_name"]);
                        } else {
                            $imageFile = imagecreatefrompng($image["tmp_name"]);
                        }

                        $imageName = $pet->imageGenerateName();

                        imagejpeg($imageFile, "../../../view/assets/img/ImagensPet/" . $imageName, 100);

                        $pet->Imagem = $imageName;
                    }
                } else {
                    $pet->Imagem = $imageatual;
                }
            }
            $petDao->create($pet, 1);
        }
    }
} else if ($type === 'create_appointment') {

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
        $agendamento->Cancelado = false;

        $agendamentoDao->create($agendamento, 1);
    }
}

?>