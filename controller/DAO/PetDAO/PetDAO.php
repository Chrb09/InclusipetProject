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
        $pet->imagem = $data["Imagem"];

        return $pet;
    }
    public function getPetsByCodCliente($CodCliente)
    {

    }
    public function findByCod($CodPet)
    {

    }
    public function create(Pet $pet)
    {

    }
    public function update(Pet $pet)
    {

    }
    public function destroy($CodPet)
    {

    }
}