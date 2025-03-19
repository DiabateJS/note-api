<?php
class Util {
    public static function createUserFromStringParams($params){
        $tabParams = explode(";",$params);
        $nom = $tabParams[0];
        $prenom = $tabParams[1];
        $email = $tabParams[2];
        $login = $tabParams[3];
        $password = $tabParams[4];
        $idprofil = $tabParams[5];
        $user = new User(null, $nom, $prenom, $email, $login, $password, $idprofil);
        return $user;
    }

    public static function createDicoFromStringParams($params){
        $tabParams = explode(";",$params);
        $nom = $tabParams[0];
        $prenom = $tabParams[1];
        $email = $tabParams[2];
        $login = $tabParams[3];
        $password = $tabParams[4];
        $idprofil = $tabParams[5];

        $data = [
            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $email,
            "login" => $login,
            "password" => $password,
            "idprofil" => $idprofil
        ];
        return $data;
    }

    public static function createArticleDicoFromStringParams($params){
        $tabParams = explode(";",$params);
        $articleDico = [
            "label" => $tabParams[0],
            "description" => $tabParams[1],
            "image" => $tabParams[2],
            "prix" => $tabParams[3]
        ];
        return $articleDico;
    }

    public static function userEntityToDico($user){
        $data = [
            "nom" => $user->getId(),
            "prenom" => $user->getPrenom(),
            "email" => $user->getEmail(),
            "login" => $user->getLogin(),
            "password" => $user->getPassword(),
            "idprofil" => $user->getIdprofil()
        ];
        return $data;
    } 
}