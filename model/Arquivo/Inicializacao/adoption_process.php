<?php
// Arquivo de criação da adoção

require_once('globals.php');
require_once('db.php');
require_once('../../Classes/Modelagem/Message.php');
require_once('../../Classes/Modelagem/Adocao.php');
require_once('../../../controller/DAO/AdocaoDAO/AdocaoDAO.php');
require_once('../../../controller/DAO/ClienteDAO/ClienteDAO.php');

$message = new Message($BASE_URL);
$clienteDao = new ClienteDAO($conn, $BASE_URL);
$adocaoDao = new AdocaoDAO($conn, $BASE_URL);

// Resgata o tipo do formulário
$type = filter_input(INPUT_POST, "type");
$clienteData = $clienteDao->verifyToken();

// ===== COMEÇO DO ADOÇÃO =====

if ($type === 'create_adoption') {
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
    if (!$nome || !$especie || !$idade || !$porte || !$castrado || !$sexo || !$descricao || !$telefone || !$endereco) {

        // Enviar uma msg de erro, de dados faltantes
        $message->setMessage("Preencha todos os campos.", "error", "popup", "../../../view/pages/Perfil/anuncioadocao.php");
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
        $adocao->CodAdocao = $adocaoDao->getNextId();

        $detalhesArray = explode(',', $detalhes);

        for ($i = 0; $i < count($detalhesArray); $i++) {
            $adocao->Detalhes[$i] = $detalhesArray[$i];
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

        $adocaoDao->create($adocao);
    }

}