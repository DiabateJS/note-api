<?php
class Commande {
    public $id;
    public $statutid;
    public $userid;
    public $livreurid;
    public $montant;
    public $datecmd;

    public function __construct($id, $statutid, $userid, $livreurid, $montant, $datecmd){
        $this->id = $id;
        $this->statutid = $statutid;
        $this->userid = $userid;
        $this->livreurid = $livreurid;
        $this->montant = $montant;
        $this->datecmd = $datecmd;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getStatutid(){
        return $this->statutid;
    }

    public function setStatutid($statutid){
        $this->statutid = $statutid;
    }

    public function getUserid(){
        return $this->userid;
    }

    public function setUserid($userid){
        $this->userid = $userid;
    }

    public function getLivreurid(){
        return $this->livreurid;
    }

    public function setLivreurid($livreurid){
        $this->livreurid = $livreurid;
    }

    public function getMontant(){
        return $this->montant;
    }

    public function setMontant($montant){
        $this->montant = $montant;
    }

    public function getDatecmd(){
        return $this->datecmd;
    }

    public function setDatecmd($datecmd){
        $this->datecmd = $datecmd;
    }

}