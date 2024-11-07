<?php
//Iniciando a estutura DAO do adocao
require_once('../../../model/Classes/Modelagem/Adocao.php');

class AdocaoDAO implements AdocaoDAOInterface
{
    private $conn;

    public function buildAdocao($data)
    {
        $adocao = new Adocao(); //Chamando a classe Adocao

        $adocao->CodAdocao = $data["CodFuncionario"];
        $adocao->CodEspecie = $data["CodCargo"];
        $adocao->Nome = $data["Senha"];
        $adocao->Idade = $data["Nome"];
        $adocao->Porte = $data["RG"];
        $adocao->Castrado = $data["CPF"];
        $adocao->Sexo = $data["Telefone"];
        $adocao->Descricao = $data["CEP"];
        $adocao->Telefone = $data["CodUnidade"];
        $adocao->Endereco = $data["Token"];
        $adocao->Adotado = $data["Imagem"];

        return $adocao;
    }
    public function create(Adocao $adocao)
    {
    }
    public function update(Adocao $adocao)
    {
    }
    public function getAdocaoByCodCliente($CodCliente)
    {
    }
    public function getAllAdocao()
    {
    }
    public function getEspecieByCod($CodEspecie)
    {
    }
    public function getImagemAdocaoByCod($CodAdocao)
    {
    }
    public function getDetalheAdocaoByCod($CodAdocao)
    {
    }
}