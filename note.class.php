<?php
class Note {
    public $id;
    public $titre;
    public $contenu;
    public $idCategorie;

    public function __construct($id, $titre, $contenu, $idCategorie)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->idCategorie = $idCategorie;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getTitre(){
        return $this->titre;
    }
    public function setTitre($titre){
        $this->titre = $titre;
    }
    
    public function getContenu(){
        return $this->contenu;
    }
    public function setContenu($contenu){
        $this->contenu = $contenu;
    }

    public function getIdCategorie(){
        return $this->idCategorie;
    }
    public function setIdCategorie($idCategorie){
        $this->idCategorie = $idCategorie;
    }
}