<?php

require_once('../../../model/Arquivo/inicializacao/globals.php');
require_once('../../../model/Arquivo/inicializacao/db.php');
require_once('../../../model/Classes/Modelagem/Cliente.php');
require_once('../../../model/Classes/Modelagem/Funcionario.php');
require_once('../../../model/Classes/Modelagem/Message.php');
require_once('../../../controller/DAO/ClienteDAO/ClienteDAO.php');
require_once('../../../controller/DAO/FuncionarioDAO/FuncionarioDAO.php');

$message = new Message($BASE_URL);

$clienteDao = new ClienteDAO($conn, $BASE_URL);
$funcionarioDao = new FuncionarioDAO($conn, $BASE_URL);

// Resgata o tipo do formulário
$type = filter_input(INPUT_POST, "type");
$resetimage = filter_input(INPUT_POST, "resetimage");

//Atualizar usuario
if ($type === "update_client") {
    $clienteData = $clienteDao->verifyToken();

    $nome = filter_input(INPUT_POST, "sign-up-name");
    $datanasc = filter_input(INPUT_POST, "sign-up-date");
    $telefone = filter_input(INPUT_POST, "sign-up-tel");
    $cep = filter_input(INPUT_POST, "sign-up-cep");
    $cpf = filter_input(INPUT_POST, "sign-up-cpf");
    $email = filter_input(INPUT_POST, "sign-up-email");

    $cliente = new Cliente();

    $clienteData->nome = $nome;
    $clienteData->datanasc = $datanasc;
    $clienteData->telefone = $telefone;
    $clienteData->cep = $cep;
    $clienteData->cpf = $cpf;
    $clienteData->email = $email;


    if ($resetimage == "true") {
        $clienteData->imagem = "";
    } else {
        if (isset($_FILES["foto-usuario-input"]) && !empty($_FILES["foto-usuario-input"]["tmp_name"])) {

            $image = $_FILES["foto-usuario-input"];
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

                $imageName = $cliente->imageGenerateName();

                imagejpeg($imageFile, "../../../view/assets/img/ImagensPerfil/" . $imageName, 100);

                $clienteData->imagem = $imageName;
            }
        }
    }


    $clienteDao->update($clienteData);

} else if ($type === "update_password") {
    $senha = filter_input(INPUT_POST, "change-password");
    $confirmarsenha = filter_input(INPUT_POST, "change-password-confirm");

    $clienteData = $clienteDao->verifyToken();
    $id = $clienteData->codcliente;

    if ($senha != $confirmarsenha) {
        $message->setMessage("As senhas não batem", "error", "toast", "back");
    } else if (strlen($senha) < 8) {
        $message->setMessage("A senha deve ter no mínimo 8 caracteres", "error", "toast", "back");
    } else {
        $cliente = new Cliente();

        $finalSenha = $cliente->generatePassword($senha);

        $cliente->senha = $finalSenha;
        $cliente->codcliente = $id;

        $clienteDao->changePassword($cliente);
    }
} else
    //Fim do usuário

    //Começo do funcionário

    if ($type === "update_funcionario") {
        $funcionarioData = $funcionarioDao->verifyToken();

       

        $nome = filter_input(INPUT_POST, "sign-up-nome");
        $codcargo = filter_input(INPUT_POST, "sign-up-cargo");
        $cpf = filter_input(INPUT_POST, "sign-up-cpf");
        $cep = filter_input(INPUT_POST, "sign-up-cep");
        $rg = filter_input(INPUT_POST, "sign-up-rg");
        $telefone = filter_input(INPUT_POST, "sign-up-tel");
        $codunidade = filter_input(INPUT_POST, "sign-up-unidade");

        $funcionario = new Funcionario();

        $funcionarioData->codcargo = $codcargo;
        $funcionarioData->nome = $nome;
        $funcionarioData->cpf = $cpf;
        $funcionarioData->cep = $cep;
        $funcionarioData->rg = $rg;
        $funcionarioData->telefone = $telefone;
        $funcionarioData->codunidade = $codunidade;


        $funcionarioDao->update($funcionarioData);

    } else

        if ($type === "update_password_vet") {
            $senha = filter_input(INPUT_POST, "change-password");
            $confirmarsenha = filter_input(INPUT_POST, "change-password-confirm");

            $funcionarioData = $funcionarioDao->verifyToken();
            $id = $funcionarioData->codfuncionario;

            if ($senha != $confirmarsenha) {
                $message->setMessage("As senhas não batem", "error", "toast", "back");
            } else if (strlen($senha) < 8) {
                $message->setMessage("A senha deve ter no mínimo 8 caracteres", "error", "toast", "back");
            } else {
                $funcionario = new Funcionario();

                $finalSenha = $funcionario->generatePassword($senha);

                $funcionario->senha = $finalSenha;
                $funcionario->codfuncionario = $id;

                $funcionarioDao->changePassword($funcionario);
            }


        } else {
            $message->setMessage("Informações inválidas!", "error", "toast", "../../../view/pages/index/index.php");
        }