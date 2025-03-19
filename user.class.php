<?php
class User {
    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $login;
    public $password;
    public $idprofil;

    public function __construct($id, $nom, $prenom, $email, $login, $password, $idprofil){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->login = $login;
        $this->password = $password;
        $this->idprofil = $idprofil;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    
    public function getLogin(){
        return $this->login;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getIdprofil(){
        return $this->idprofil;
    }

    public function setIdprofil($idprofil){
        $this->idprofil = $idprofil;
    }
}