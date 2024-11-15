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
        $message->setMessage("Preencha todos os campos.", "error", "popup", "back");
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
} else if ($type === 'create_adoption') {
    $nome = filter_input(INPUT_POST, "nome");
    $especie = filter_input(INPUT_POST, "especie");
    $idade = filter_input(INPUT_POST, "idade");
    $porte = filter_input(INPUT_POST, "porte");
    $castrado = filter_input(INPUT_POST, "castrado");
    $sexo = filter_input(INPUT_POST, "sexo");
    $descricao = filter_input(INPUT_POST, "descricao");
    $detalhes = filter_input(INPUT_POST, "detalhes");
    $telefone = filter_input(INPUT_POST, "telefone");
    $endereco = filter_input(INPUT_POST, "endereco");

    // Verificação de dados mínimos TODO
    if (!$nome || !$especie || !$porte || !$castrado || !$sexo || !$descricao || !$telefone || !$endereco) {
        // Enviar uma msg de erro, de dados faltantes
        $message->setMessage("Preencha todos os campos.", "error", "popup", "back");
    } else {
        $adocao = new Adocao();

        $adocao->CodEspecie = $especie;
        $adocao->CodCliente = $clienteData->codcliente;
        $adocao->Nome = $nome;
        $adocao->Idade = $idade;
        $adocao->Porte = $porte;
        $adocao->Castrado = $castrado;
        $adocao->Sexo = $sexo;
        $adocao->Descricao = $descricao;
        $adocao->Telefone = $telefone;
        $adocao->Endereco = $endereco;
        $adocao->Adotado = '0';
        $adocao->Aprovado = '0';
        $adocao->MotivoRecusar = '';
        $adocao->CodAdocao = $adocaoDao->getNextId();

        $detalhesArray = explode(',', $detalhes);

        for ($i = 0; $i < count($detalhesArray); $i++) {
            $adocao->Detalhes[$i] = trim($detalhesArray[$i]);
        }

        for ($i = 0; $i < 5; $i++) {
            $id = $i + 1;
            if (isset($_FILES["foto-pet-$id"]) && !empty($_FILES["foto-pet-$id"]["tmp_name"])) {


                $image = $_FILES["foto-pet-$id"];
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

                    $imageName = $adocao->imageGenerateName();

                    if (!file_exists("../../../view/assets/img/ImagensAdocao/$adocao->CodAdocao")) {
                        mkdir("../../../view/assets/img/ImagensAdocao/$adocao->CodAdocao");
                    }
                    imagejpeg($imageFile, "../../../view/assets/img/ImagensAdocao/$adocao->CodAdocao/" . $imageName, 100);

                    $adocao->Imagens[$i] = $imageName;
                }
            }
        }

        $adocaoDao->create($adocao, 1);
    }


} else if ($type === 'create_user') {
    $nome = filter_input(INPUT_POST, "sign-up-name");
    $datanasc = filter_input(INPUT_POST, "sign-up-date");
    $telefone = filter_input(INPUT_POST, "sign-up-tel");
    $cep = filter_input(INPUT_POST, "sign-up-cep");
    $cpf = filter_input(INPUT_POST, "sign-up-cpf");
    $email = filter_input(INPUT_POST, "sign-up-email");
    $senha = filter_input(INPUT_POST, "sign-up-password");
    $confirmarsenha = filter_input(INPUT_POST, "sign-up-confirm-password");

    // Verificação de dados mínimos 
    if (!$nome || !$datanasc || !$telefone || !$cep || !$cpf || !$email || !$senha) {

        // Enviar uma msg de erro, de dados faltantes
        $message->setMessage("Preencha todos os campos.", "error", "toast", "back");

    } else if ($senha !== $confirmarsenha) {
        $message->setMessage("As senhas fornecidas não batem.", "error", "toast", "back");
    } else if (!validarCPF($cpf)) {
        $message->setMessage("CPF inválido.", "error", "toast", "back");
    } else {

        if ($clienteDao->findByEmail($email) !== false) {
            // Enviar uma msg de erro, de dados faltantes
            $message->setMessage("Email já cadastrado.", "error", "toast", "back");

        } else if ($clienteDao->findByCPF($cpf) !== false) {
            $message->setMessage("CPF já cadastrado.", "error", "toast", "back");
        } else if ($clienteDao->validateAge($datanasc) !== true) {
            $message->setMessage("Menor de 18 anos.", "error", "toast", "back");
        } else {
            $cliente = new Cliente();

            $clienteToken = $cliente->generateToken();
            $senhaFinal = $cliente->generatePassword($senha);

            $cliente->nome = $nome;
            $cliente->datanasc = $datanasc;
            $cliente->telefone = $telefone;
            $cliente->cep = $cep;
            $cliente->cpf = $cpf;
            $cliente->email = $email;
            $cliente->senha = $senhaFinal;
            $cliente->token = $clienteToken;

            $auth = false;

            $clienteDao->create($cliente, $auth);
        }
    }
}

function validarCPF($cpf)
{
    $cpf = preg_replace('/\D/', '', $cpf); // Remove caracteres não numéricos

    if (strlen($cpf) != 11 || preg_match('/^(\d)\1{10}$/', $cpf)) {
        return false; // CPF inválido
    }

    // Validação do primeiro dígito
    $soma = 0;
    for ($i = 1; $i <= 9; $i++) {
        $soma += (int) $cpf[$i - 1] * (11 - $i);
    }
    $resto = ($soma * 10) % 11;
    if ($resto >= 10)
        $resto = 0;
    if ($resto != (int) $cpf[9])
        return false;

    // Validação do segundo dígito
    $soma = 0;
    for ($i = 1; $i <= 10; $i++) {
        $soma += (int) $cpf[$i - 1] * (12 - $i);
    }
    $resto = ($soma * 10) % 11;
    if ($resto >= 10)
        $resto = 0;
    return $resto == (int) $cpf[10];
}
?>