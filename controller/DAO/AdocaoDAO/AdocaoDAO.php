<?php
//Iniciando a estutura DAO do adocao
require_once('../../../model/Classes/Modelagem/Adocao.php');

class AdocaoDAO implements AdocaoDAOInterface
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
    public function buildAdocao($data)
    {
        $adocao = new Adocao(); //Chamando a classe Adocao

        $adocao->CodAdocao = $data["CodAdocao"];
        $adocao->CodEspecie = $data["CodEspecie"];
        $adocao->Nome = $data["Nome"];
        $adocao->Idade = $data["Idade"];
        $adocao->Porte = $data["Porte"];
        $adocao->Castrado = $data["Castrado"];
        $adocao->Sexo = $data["Sexo"];
        $adocao->Descricao = $data["Descricao"];
        $adocao->Telefone = $data["Telefone"];
        $adocao->Endereco = $data["Endereco"];
        $adocao->Adotado = $data["Adotado"];

        return $adocao;
    }
    public function create(Adocao $adocao)
    {
        $stmt = $this->conn->prepare("INSERT INTO adocao(CodAdocao,CodEspecie, Nome, Idade, Porte, Castrado, Sexo, Descricao, Telefone, Endereco, Adotado) 
      VALUES (:CodAdocao, :CodEspecie, :Nome, :Idade, :Porte, :Castrado, :Sexo, :Descricao, :Telefone, :Endereco, :Adotado)");

        // Liga os parâmetros da query com os atributos do objeto Cliente
        $stmt->bindParam(":CodAdocao", $adocao->CodAdocao);
        $stmt->bindParam(":CodEspecie", $adocao->CodEspecie);
        $stmt->bindParam(":Nome", $adocao->Nome);
        $stmt->bindParam(":Idade", $adocao->Idade);
        $stmt->bindParam(":Porte", $adocao->Porte);
        $stmt->bindParam(":Castrado", $adocao->Castrado);
        $stmt->bindParam(":Sexo", $adocao->Sexo);
        $stmt->bindParam(":Descricao", $adocao->Descricao);
        $stmt->bindParam(":Telefone", $adocao->Telefone);
        $stmt->bindParam(":Endereco", $adocao->Endereco);
        $stmt->bindParam(":Adotado", $adocao->Adotado);

        $stmt->execute();

        // TODO $this->message->setMessage("Visita agendada com sucesso!", "success", "popup", "../../../view/pages/perfil/meusadocaos.php");
    }
    public function update(Adocao $adocao)
    {
        // qnd o pet for adotado
    }
    public function getAdocaoByCodCliente($CodCliente)
    {
        $adocoes = [];

        $stmt = $this->conn->prepare("SELECT * FROM cliente WHERE CodCliente = :CodCliente");
        $stmt->bindParam(":CodCliente", $CodCliente);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $adocoesArray = $stmt->fetchAll();

            foreach ($adocoesArray as $adocao) {
                $adocoes[] = $this->buildAdocao($adocao);
            }
        }

        return $adocoes;
    }
    public function getAdocaoByCodAdocao($CodAdocao)
    {

        $stmt = $this->conn->prepare("SELECT * FROM adocao WHERE CodAdocao = :CodAdocao");
        $stmt->bindParam(":CodAdocao", $CodAdocao);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $adocao = $stmt->fetch();

            $Adocao = $this->buildAdocao($adocao);
        }

        return $Adocao;
    }
    public function getAllAdocao()
    {
        $adocoes = [];

        $stmt = $this->conn->prepare("SELECT * FROM adocao WHERE Adotado = 0");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $adocoesArray = $stmt->fetchAll();

            foreach ($adocoesArray as $adocao) {
                $adocoes[] = $this->buildAdocao($adocao);
            }
        }

        return $adocoes;
    }
    public function getEspecieByCod($CodEspecie)
    {
        $stmt = $this->conn->prepare("SELECT Descricao FROM especie WHERE CodEspecie = :CodEspecie");
        $stmt->bindParam(":CodEspecie", $CodEspecie);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $especie = $stmt->fetch();
            return $especie;
        }
    }
    public function getImagemAdocaoByCod($CodAdocao)
    {
        $imagemAdocao = [];
        $stmt = $this->conn->prepare("SELECT Imagem FROM imagem_adocao WHERE CodAdocao = :CodAdocao");
        $stmt->bindParam(":CodAdocao", $CodAdocao);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $imagemArray = $stmt->fetchAll();

            foreach ($imagemArray as $imagens) {
                $imagemAdocao[] = $imagens[0];
            }
            return $imagemAdocao;
        }
    }
    public function getDetalheAdocaoByCod($CodAdocao)
    {
        $detalheAdocao = [];
        $stmt = $this->conn->prepare("SELECT Detalhe FROM detalhes_adocao WHERE CodAdocao = :CodAdocao");
        $stmt->bindParam(":CodAdocao", $CodAdocao);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $detalheArray = $stmt->fetchAll();

            foreach ($detalheArray as $detalhe) {
                $detalheAdocao[] = $detalhe[0];
            }
            return $detalheAdocao;
        }
    }
}