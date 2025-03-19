<?php
class LigneCom {
    public $id;
    public $articleId;
    public $qte;
    public $montant;
    public $commandeId;

    public function __construct($id, $articleId, $qte, $montant, $commandeId){
        $this->id = $id;
        $this->articleId = $articleId;
        $this->qte = $qte;
        $this->montant = $montant;
        $this->commandeId = $commandeId;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getArticleId(){
        return $this->articleId;
    }

    public function setArticleId($articleId){
        $this->articleId = $articleId;
    }

    public function getQte(){
        return $this->qte;
    }

    public function setQte($qte){
        $this->qte = $qte;
    }

    public function getMontant(){
        return $this->montant;
    }

    public function setMontant($montant){
        $this->montant = $montant;
    }

    public function getCommandeId(){
        return $this->commandeId;
    }

    public function setCommandeId($commandeId){
        $this->commandeId = $commandeId;
    }
    
}