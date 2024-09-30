<?php

include_once 'Conexao.php';

    // ===== Atributos =====
class ImagemAdocao
{
    private $CodAdocao; // FK
    private $Imagem;
    private $conn;

    // ===== Getters & Setters =====

    // CodAdocao
    public function getCodAdocao() {
        return $this->CodAdocao;
    }

    public function setCodAdocao($iCodAdocao) {
        $this->CodAdocao = $iCodAdocao;
    }

    // Imagem
    public function getImagem() {
        return $this->Imagem;
    }

    public function setDescricao($iImagem) {
        $this->Imagem = $iImagem;
    }


    // ===== Métodos =====
    function create() {
        // TODO
    }

    function read() {
        // TODO
    }

    public function update() {
        // TODO
    }

    public function delete() {
        // TODO
    }
}

?>