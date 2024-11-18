<?php

class Pet
{
    public $CodAnimal;
    public $CodRaca;
    public $CodCliente;
    public $Nome;
    public $Sexo;
    public $DataNasc;
    public $DataAprox;
    public $Peso;
    public $Castrado;
    public $Imagem;

    public function imageGenerateName()
    {
        return bin2hex(random_bytes(60)) . ".jpg";
    }
}

interface PetDAOInterface
{
    public function buildPet($data);
    public function getPetsByCodCliente($CodCliente);

    public function getPetEspecie(Pet $pet);
    public function getPetRaca(Pet $pet);
    public function getPetCount();
    public function findByCod($CodPet);
    public function create(Pet $pet, $user);
    public function update(Pet $pet);
    public function destroy($CodPet);

}