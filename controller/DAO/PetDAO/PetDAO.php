<?php

require_once('../../../model/Classes/Modelagem/Pet.php');
require_once("../../../model/Classes/Modelagem/Message.php");

class PetDAO implements PetDAOInterface
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

    public function buildPet($data)
    {
        $pet = new Pet();

        $pet->CodAnimal = $data["CodAnimal"];
        $pet->CodRaca = $data["CodRaca"];
        $pet->CodCliente = $data["CodCliente"];
        $pet->Nome = $data["Nome"];
        $pet->Sexo = $data["Sexo"];
        $pet->DataNasc = $data["DataNasc"];
        $pet->DataAprox = $data["DataAprox"];
        $pet->Peso = $data["Peso"];
        $pet->Castrado = $data["Castrado"];
        $pet->Imagem = $data["Imagem"];

        return $pet;
    }
    public function getPetCount()
    {
        $stmt = $this->conn->prepare("SELECT * FROM animal");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $petsArray = $stmt->fetchAll();

            return count($petsArray);
        }
    }
    public function getPetsByCodCliente($CodCliente)
    {
        $pets = [];

        $stmt = $this->conn->prepare("SELECT * FROM animal WHERE CodCliente = :CodCliente");
        $stmt->bindParam(":CodCliente", $CodCliente);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $petsArray = $stmt->fetchAll();

            foreach ($petsArray as $pet) {
                $pets[] = $this->buildPet($pet);
            }
        }

        return $pets;

    }
    public function findByCod($CodPet)
    {
        $stmt = $this->conn->prepare("SELECT * FROM animal WHERE CodAnimal = :CodPet");
        $stmt->bindParam(":CodPet", $CodPet);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $petData = $stmt->fetch();
            $pet = $this->buildPet($petData);
            return $pet;
        } else {
            $this->message->setMessage("Erro!", "error", "toast", "../../../view/pages/index/index.php");
        }


    }
    public function create(Pet $pet)
    {
        $stmt = $this->conn->prepare("INSERT INTO animal(CodRaca, CodCliente, Nome, Sexo, DataNasc, DataAprox, Peso, Castrado, Imagem) 
        VALUES(:CodRaca, :CodCliente, :Nome, :Sexo, :DataNasc, :DataAprox, :Peso, :Castrado, :Imagem)");

        $stmt->bindParam(":CodRaca", $pet->CodRaca);
        $stmt->bindParam(":CodCliente", $pet->CodCliente);
        $stmt->bindParam(":Nome", $pet->Nome);
        $stmt->bindParam(":Sexo", $pet->Sexo);
        $stmt->bindParam(":DataNasc", $pet->DataNasc);
        $stmt->bindParam(":DataAprox", $pet->DataAprox);
        $stmt->bindParam(":Peso", $pet->Peso);
        $stmt->bindParam(":Castrado", $pet->Castrado);
        $stmt->bindParam(":Imagem", $pet->Imagem);

        $stmt->execute();

        $this->message->setMessage("Animal cadastrado com sucesso!", "success", "popup", "../../../view/pages/perfil/meuspets.php");
    }
    public function update(Pet $pet)
    {
        $stmt = $this->conn->prepare("UPDATE animal SET 
        CodRaca = :CodRaca, CodCliente = :CodCliente, Nome = :Nome, Sexo = :Sexo, DataNasc = :DataNasc,
        DataAprox = :DataAprox, Peso = :Peso, Castrado = :Castrado, Imagem =:Imagem WHERE CodAnimal = :CodAnimal");

        $stmt->bindParam(":CodRaca", $pet->CodRaca);
        $stmt->bindParam(":CodCliente", $pet->CodCliente);
        $stmt->bindParam(":Nome", $pet->Nome);
        $stmt->bindParam(":Sexo", $pet->Sexo);
        $stmt->bindParam(":DataNasc", $pet->DataNasc);
        $stmt->bindParam(":DataAprox", $pet->DataAprox);
        $stmt->bindParam(":Peso", $pet->Peso);
        $stmt->bindParam(":Castrado", $pet->Castrado);
        $stmt->bindParam(":Imagem", $pet->Imagem);
        $stmt->bindParam(":CodAnimal", $pet->CodAnimal);

        $stmt->execute();

        // Redireciona para o perfil do usuario
        $this->message->setMessage("Dados atualizados com sucesso!", "success", "toast", "../../../view/pages/Perfil/meuspets.php");
    }
    public function destroy($CodPet)
    {

    }

    public function getPetEspecie(Pet $pet)
    {
        $stmt = $this->conn->prepare("SELECT CodEspecie FROM raca WHERE CodRaca = :CodRaca");
        $stmt->bindParam(":CodRaca", $pet->CodRaca);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $CodEspecie = $stmt->fetch();
        }


        $stmt2 = $this->conn->prepare("SELECT Descricao FROM especie WHERE CodEspecie = :CodEspecie");
        $stmt2->bindParam(":CodEspecie", $CodEspecie[0]);
        $stmt2->execute();

        if ($stmt2->rowCount() > 0) {
            $especie = $stmt2->fetch();
            return $especie[0];
        }
    }
    public function getPetRaca(Pet $pet)
    {
        $stmt = $this->conn->prepare("SELECT Descricao FROM raca WHERE CodRaca = :CodRaca");
        $stmt->bindParam(":CodRaca", $pet->CodRaca);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $raca = $stmt->fetch();
            return $raca[0];
        }
    }


}