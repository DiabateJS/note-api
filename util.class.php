<?php
class Util {

    public static function createNoteDicoFromStringParams($params){
        $tabParams = explode(";",$params);
        $data = [];
        if (count($tabParams) > 2){
            $titre = $tabParams[0];
            $contenu = $tabParams[1];
            $idCategorie = $tabParams[2];
            $data = [
                "titre" => $titre,
                "contenu" => $contenu,
                "idCategorie" => $idCategorie
            ];
        }
        return $data;
    }

    public static function createNoteDicoFromTabParams($tabParams){
        $data = [];
        if (count($tabParams) > 2){
            $titre = $tabParams[0];
            $contenu = $tabParams[1];
            $idCategorie = $tabParams[2];
            $data = [
                "titre" => $titre,
                "contenu" => $contenu,
                "idCategorie" => $idCategorie
            ];
        }
        return $data;
    }

    public static function createCategorieDicoFromStringParams($params){
        $tabParams = explode(";",$params);
        $categorieDico = [
            "libelle" => $tabParams[0],
            "couleur" => $tabParams[1]
        ];
        return $categorieDico;
    }

    public static function createCategorieDicoFromTabParams($tab){
        $categorieDico = [];
        if (count($tab) > 1){
            $categorieDico = [
                "libelle" => $tab[0],
                "couleur" => $tab[1]
            ];
        }
        return $categorieDico;
    }

    public static function noteEntityToDico($note){
        $data = [
            "id" => $note->getId(),
            "titre" => $note->getTitre(),
            "contenu" => $note->getContenu(),
            "idCategorie" => $note->getCategorie()
        ];
        return $data;
    }
    
    public static function categorieEntityToDico($categorie){
        $data = [
            "id" => $categorie->getId(),
            "libelle" => $categorie->getLibelle(),
            "couleur" => $categorie->getCouleur()
        ];
        return $data;
    }
}