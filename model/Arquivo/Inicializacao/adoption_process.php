<?php
// Arquivo de criação da adoção

require_once('globals.php');
require_once('db.php');

require_once('../../Classes/Modelagem/Message.php');
require_once('../../Classes/Modelagem/Adocao.php');
require_once('../../../controller/DAO/AdocaoDAO/AdocaoDAO.php');

$message = new Message($BASE_URL);
$adocaoDao = new AdocaoDAO($conn, $BASE_URL);

// Resgata o tipo do formulário
$type = filter_input(INPUT_POST, "type");

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
     if (!$unidade || !$servico || !$especialidade || !$funcionario || !$data || !$horario || !$pet) {

        // Enviar uma msg de erro, de dados faltantes
        $message->setMessage("Preencha todos os campos.", "error", "popup", "../../../view/pages/Perfil/gerenciaradocao.php");
     } else {
        $adocao = new Adocao();

        $adocao->CodEspecie = $especie;
        $adocao->Nome = $nome;
        $adocao->Idade = $idade;
        $adocao->Porte = $porte;
        $adocao->Castrado = $castrado;
        $adocao->Sexo = $sexo;
        $adocao->Descricao = $descricao;
        //$adocao->Detalhes = $detalhes; // TODO
        $adocao->Telefone = $telefone;
        $adocao->Endereco = $endereco;

        $adocaoDao->create($adocao);
    }

    // TODO
}