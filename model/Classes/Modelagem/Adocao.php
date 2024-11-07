<?php
class Adocao
{
    public $CodAdocao;
    public $CodEspecie;
    public $Nome;
    public $Idade;
    public $Porte;
    public $Castrado;
    public $Sexo;
    public $Descricao;
    public $Telefone;
    public $Endereco;
    public $Adotado;

}
interface AdocaoDAOInterface
{
    public function buildAdocao($data);
    public function create(Adocao $adocao);
    public function update(Adocao $adocao);
    public function getAdocaoByCodCliente($CodCliente);
    public function getAllAdocao();
    public function getEspecieByCod($CodEspecie);
    public function getImagemAdocaoByCod($CodAdocao);
    public function getDetalheAdocaoByCod($CodAdocao);

}

?>