<?php

require_once('../../../model/Arquivo/inicializacao/globals.php');
require_once('../../../model/Arquivo/inicializacao/db.php');
require_once('../../../model/Classes/Modelagem/Pet.php');
require_once('../../../model/Classes/Modelagem/Message.php');
require_once('../../../controller/DAO/PetDAO/PetDAO.php');
require_once('../../../controller/DAO/ClienteDAO/ClienteDAO.php');

$message = new Message($BASE_URL);
$clienteDao = new ClienteDAO($conn, $BASE_URL);


$type = filter_input(INPUT_POST, "type");
$resetimage = filter_input(INPUT_POST, "resetimage");

$userData = $userDao->verifyToken();

//Atualizar usuario
if ($type === "create") {
    $nome = filter_input(INPUT_POST, "nome");
    $especie = filter_input(INPUT_POST, "especie");
    $raca = filter_input(INPUT_POST, "raca");
    $sexo = filter_input(INPUT_POST, "sexo");
    $datanasc = filter_input(INPUT_POST, "datanasc");
    $dataaprox = filter_input(INPUT_POST, "dataaprox");
    $peso = filter_input(INPUT_POST, "peso");
    $castrado = filter_input(INPUT_POST, "castrado");

    $pet = new Pet();

    if (!$nome) {
    } else {
        $pet->Nome() = $nome;
        $pet->CodRaca() = $raca;
        $pet->Sexo() = $sexo;
        $pet->DataNasc() = $datanasc;
        $pet->DataAprox() = $dataaprox;
        $pet->Peso() = $peso;
        $pet->Castrado() = $castrado;

        print_r($pet);

        /*
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

                            imagejpeg($imageFile, "../../../view/assets/img/ImagensPet/" . $imageName, 100);

                            $clienteData->imagem = $imageName;
                        }
                    }
                }
                    */
    }


} else {
    $message->setMessage("Informações inválidas!", "error", "toast", "../../../view/pages/index/index.php");
}