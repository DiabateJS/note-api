<?php
class Categorie {
    public $id;
    public $libelle;
    public $couleur;

    public function __construct($id, $libelle, $couleur)
    {    
        $this->id = $id;
        $this->libelle = $libelle;
        $this->couleur = $couleur;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getLibelle(){
        return $this->libelle;
    }

    public function setLibelle($libelle){
        $this->libelle = $libelle;
    }

    public function getCouleur(){
        return $this->couleur;
    }

    public function setCouleur($couleur){
        $this->couleur = $couleur;
    }
}