<?php
class Article {
    public $id;
    public $label;
    public $description;
    public $image;
    public $prix;

    public function __construct($id, $label, $description, $image, $prix)
    {
        $this->id = $id;
        $this->label = $label;
        $this->description = $description;
        $this->image = $image;
        $this->prix = $prix;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getLabel(){
        return $this->label;
    }
    public function setLabel($label){
        $this->label = $label;
    }
    
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
    }

    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
    }

    public function getPrix(){
        return $this->prix;
    }
    public function setPrix($prix){
        $this->prix = $prix;
    }
}