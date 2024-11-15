<?php
class Adocao
{
    public $CodAdocao;
    public $CodEspecie;
    public $CodCliente;
    public $Nome;
    public $Idade;
    public $Porte;
    public $Castrado;
    public $Sexo;
    public $Descricao;
    public $Detalhes = [];
    public $Imagens = [];
    public $Telefone;
    public $Endereco;
    public $Adotado;
    public $Aprovado;
    public $MotivoRecusar;

    public function imageGenerateName()
    {
        return bin2hex(random_bytes(60)) . ".jpg";
    }

}
interface AdocaoDAOInterface
{
    public function buildAdocao($data);
    public function create(Adocao $adocao, $user);
    public function update(Adocao $adocao);
    public function getAdocaoByCodCliente($CodCliente);
    public function getAdocaoByCodAdocao($CodAdocao);
    public function getAllAdocao();
    public function getAllEspecie();
    public function getEspecieByCod($CodEspecie);
    public function getImagemAdocaoByCod($CodAdocao);
    public function getDetalheAdocaoByCod($CodAdocao);
    public function updateAprovado($CodAdocao);
    public function getNextId();
    public function updateAdotado($CodAdocao, $Adotado);
    public function recusarAdocao($CodAdocao);

}

?>