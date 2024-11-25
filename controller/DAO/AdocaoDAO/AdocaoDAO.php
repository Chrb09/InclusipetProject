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
        $adocao->CodCliente = $data["CodCliente"];
        $adocao->Nome = $data["Nome"];
        $adocao->Idade = $data["Idade"];
        $adocao->Porte = $data["Porte"];
        $adocao->Castrado = $data["Castrado"];
        $adocao->Sexo = $data["Sexo"];
        $adocao->Descricao = $data["Descricao"];
        $adocao->Telefone = $data["Telefone"];
        $adocao->Endereco = $data["Endereco"];
        $adocao->Adotado = $data["Adotado"];
        $adocao->Aprovado = $data["Aprovado"];
        $adocao->MotivoRecusar = $data["MotivoRecusar"];

        return $adocao;
    }
    public function create(Adocao $adocao, $user)
    {

        $stmt = $this->conn->prepare("INSERT INTO adocao(CodAdocao,CodEspecie,CodCliente, Nome, Idade, Porte, Castrado, Sexo, Descricao, Telefone, Endereco, Adotado, Aprovado, MotivoRecusar) 
      VALUES (:CodAdocao, :CodEspecie,:CodCliente,  :Nome, :Idade, :Porte, :Castrado, :Sexo, :Descricao, :Telefone, :Endereco, :Adotado, :Aprovado, :MotivoRecusar)");

        // Liga os parâmetros da query com os atributos do objeto Cliente
        $stmt->bindParam(":CodAdocao", $adocao->CodAdocao);
        $stmt->bindParam(":CodEspecie", $adocao->CodEspecie);
        $stmt->bindParam(":CodCliente", $adocao->CodCliente);
        $stmt->bindParam(":Nome", $adocao->Nome);
        $stmt->bindParam(":Idade", $adocao->Idade);
        $stmt->bindParam(":Porte", $adocao->Porte);
        $stmt->bindParam(":Castrado", $adocao->Castrado);
        $stmt->bindParam(":Sexo", $adocao->Sexo);
        $stmt->bindParam(":Descricao", $adocao->Descricao);
        $stmt->bindParam(":Telefone", $adocao->Telefone);
        $stmt->bindParam(":Endereco", $adocao->Endereco);
        $stmt->bindParam(":Adotado", $adocao->Adotado);
        $stmt->bindParam(":Aprovado", $adocao->Aprovado);
        $stmt->bindParam(":MotivoRecusar", $adocao->MotivoRecusar);

        $stmt->execute();

        // Foreach dos detalhes
        foreach ($adocao->Detalhes as $detalhe) {
            if ($detalhe != '' && $detalhe != ' ') {
                $stmt = $this->conn->prepare("INSERT INTO detalhes_adocao(CodAdocao,Detalhe) 
            VALUES (:CodAdocao, :Detalhe)");
                $stmt->bindParam(":CodAdocao", $adocao->CodAdocao);
                $stmt->bindParam(":Detalhe", $detalhe);
                $stmt->execute();
            }
        }

        // Foreach das imagens
        foreach ($adocao->Imagens as $Imagem) {
            $stmt = $this->conn->prepare("INSERT INTO imagem_adocao(CodAdocao,Imagem) 
            VALUES (:CodAdocao, :Imagem)");
            $stmt->bindParam(":CodAdocao", $adocao->CodAdocao);
            $stmt->bindParam(":Imagem", $Imagem);
            $stmt->execute();
        }


        if ($user == 0) {
            $this->message->setMessage("Adoção criada, esperando aprovação", "warning", "popup", "../../../view/pages/perfil/gerenciaradocao.php");
        } else if ($user == 1) {
            $this->message->setMessage("Adoção criada, esperando aprovação", "warning", "popup", "../../../view/pages/funcionario/funcoesdotutor.php");
        }

    }
    public function update(Adocao $adocao)
    {
        $stmt = $this->conn->prepare("UPDATE adocao SET 
        CodEspecie = :CodEspecie, CodCliente = :CodCliente, Nome = :Nome, Idade = :Idade, Porte = :Porte,
        Castrado = :Castrado, Sexo = :Sexo, Descricao = :Descricao, Telefone =:Telefone, Endereco =:Endereco , Adotado =:Adotado , Aprovado =:Aprovado , MotivoRecusar =:MotivoRecusar  WHERE CodAdocao = :CodAdocao");


        $stmt->bindParam(":CodEspecie", $adocao->CodEspecie);
        $stmt->bindParam(":CodCliente", $adocao->CodCliente);
        $stmt->bindParam(":Nome", $adocao->Nome);
        $stmt->bindParam(":Idade", $adocao->Idade);
        $stmt->bindParam(":Porte", $adocao->Porte);
        $stmt->bindParam(":Castrado", $adocao->Castrado);
        $stmt->bindParam(":Sexo", $adocao->Sexo);
        $stmt->bindParam(":Descricao", $adocao->Descricao);
        $stmt->bindParam(":Telefone", $adocao->Telefone);
        $stmt->bindParam(":Endereco", $adocao->Endereco);
        $stmt->bindParam(":Adotado", $adocao->Adotado);
        $stmt->bindParam(":Aprovado", $adocao->Aprovado);
        $stmt->bindParam(":MotivoRecusar", $adocao->MotivoRecusar);
        $stmt->bindParam(":CodAdocao", $adocao->CodAdocao);

        $stmt->execute();

        $stmt = $this->conn->prepare("DELETE FROM detalhes_adocao WHERE CodAdocao = :CodAdocao");
        $stmt->bindParam(":CodAdocao", $adocao->CodAdocao);
        $stmt->execute();

        $stmt = $this->conn->prepare("DELETE FROM imagem_adocao WHERE CodAdocao = :CodAdocao");
        $stmt->bindParam(":CodAdocao", $adocao->CodAdocao);
        $stmt->execute();

        foreach ($adocao->Detalhes as $detalhe) {
            if ($detalhe != '' && $detalhe != ' ') {
                $stmt = $this->conn->prepare("INSERT INTO detalhes_adocao(CodAdocao,Detalhe) 
                VALUES (:CodAdocao, :Detalhe)");
                $stmt->bindParam(":CodAdocao", $adocao->CodAdocao);
                $stmt->bindParam(":Detalhe", $detalhe);
                $stmt->execute();
            }

        }

        // Foreach das imagens
        foreach ($adocao->Imagens as $Imagem) {
            $stmt = $this->conn->prepare("INSERT INTO imagem_adocao(CodAdocao,Imagem) 
            VALUES (:CodAdocao, :Imagem)");
            $stmt->bindParam(":CodAdocao", $adocao->CodAdocao);
            $stmt->bindParam(":Imagem", $Imagem);
            $stmt->execute();
        }


        // Redireciona para o perfil do usuario
        $this->message->setMessage("Adoção editada, esperando aprovação", "warning", "popup", "../../../view/pages/Perfil/gerenciaradocao.php");
        // qnd o pet for adotado
    }
    public function getAdocaoByCodCliente($CodCliente)
    {
        $adocoes = [];

        $stmt = $this->conn->prepare("SELECT * FROM adocao WHERE CodCliente = :CodCliente");
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

        $stmt = $this->conn->prepare("SELECT * FROM adocao WHERE Adotado = 0 AND Aprovado = 1");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $adocoesArray = $stmt->fetchAll();

            foreach ($adocoesArray as $adocao) {
                $adocoes[] = $this->buildAdocao($adocao);
            }
        }

        return $adocoes;
    }
    public function getAllEspecie()
    {
        $especies = [];

        $stmt = $this->conn->prepare("SELECT * FROM especie");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $especiesArray = $stmt->fetchAll();

            return $especiesArray;
        }

    }
    public function getEspecieByCod($CodEspecie)
    {
        $stmt = $this->conn->prepare("SELECT Descricao FROM especie WHERE CodEspecie = :CodEspecie");
        $stmt->bindParam(":CodEspecie", $CodEspecie);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $especie = $stmt->fetch();
            return $especie[0];
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
    public function updateAprovado($CodAdocao, $Aprovado, $MotivoRecusar)
    {
        $stmt = $this->conn->prepare("UPDATE adocao SET Aprovado = :Aprovado, MotivoRecusar = :MotivoRecusar WHERE CodAdocao = :CodAdocao");

        $stmt->bindParam(":Aprovado", $Aprovado);
        $stmt->bindParam(":MotivoRecusar", $MotivoRecusar);
        $stmt->bindParam(":CodAdocao", $CodAdocao);

        $stmt->execute();

        // Redireciona para o perfil do usuario
        if ($Aprovado == '0' && $MotivoRecusar != '') {
            $this->message->setMessage("Pet recusado com sucesso!", "success", "toast", "../../../view/pages/Funcionario/aprovaradocao.php");
        } else if ($Aprovado == '1') {
            $this->message->setMessage("Pet aprovado!", "success", "toast", "../../../view/pages/Funcionario/aprovaradocao.php");
        } else {
            $this->message->setMessage("Pet pendente", "warning", "toast", "../../../view/pages/Funcionario/aprovaradocao.php");
        }
    }
    public function updateAdotado($CodAdocao, $Adotado)
    {
        $stmt = $this->conn->prepare("UPDATE adocao SET Adotado = :Adotado WHERE CodAdocao = :CodAdocao");

        $stmt->bindParam(":Adotado", $Adotado);
        $stmt->bindParam(":CodAdocao", $CodAdocao);

        $stmt->execute();

        // Redireciona para o perfil do usuario
        if ($Adotado == '0') {
            $this->message->setMessage("Pet não adotado!", "warning", "toast", "../../../view/pages/Perfil/gerenciaradocao.php");
        } else {
            $this->message->setMessage("Pet adotado!", "success", "toast", "../../../view/pages/Perfil/gerenciaradocao.php");
        }

    }

    public function getNextId()
    {
        $nextId = $this->conn->query("SHOW TABLE STATUS LIKE 'adocao'")->fetch(PDO::FETCH_ASSOC)['Auto_increment'];

        return $nextId;
    }

    public function getAllNewAdocao()
    {
        $adocoes = [];

        $stmt = $this->conn->prepare("SELECT * FROM adocao WHERE Aprovado = 0 AND LENGTH(MotivoRecusar) = 0");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $adocoesArray = $stmt->fetchAll();

            foreach ($adocoesArray as $adocao) {
                $adocoes[] = $this->buildAdocao($adocao);
            }
        }

        return $adocoes;
    }
    public function getAllAdocaoByAprovado()
    {
        $adocoes = [];

        $stmt = $this->conn->prepare("SELECT * FROM adocao WHERE Aprovado = 1");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $adocoesArray = $stmt->fetchAll();

            foreach ($adocoesArray as $adocao) {
                $adocoes[] = $this->buildAdocao($adocao);
            }
        }

        return $adocoes;
    }

    public function getAllAdocaoByRecusado()
    {
        $adocoes = [];

        $stmt = $this->conn->prepare("SELECT * FROM adocao WHERE Aprovado = 0 AND LENGTH(MotivoRecusar) > 0");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $adocoesArray = $stmt->fetchAll();

            foreach ($adocoesArray as $adocao) {
                $adocoes[] = $this->buildAdocao($adocao);
            }
        }

        return $adocoes;
    }
    public function getAllAdocaoFunc()
    {
        $adocoes = [];

        $stmt = $this->conn->prepare("SELECT * FROM adocao ORDER BY Aprovado ASC, MotivoRecusar ASC");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $adocoesArray = $stmt->fetchAll();

            foreach ($adocoesArray as $adocao) {
                $adocoes[] = $this->buildAdocao($adocao);
            }
        }

        return $adocoes;
    }
}