<?php
include "database.config.class.php";
include "resultdata.class.php";
include "constants.class.php";
include "profil.class.php";
include "util.class.php";
include "user.class.php";
include "article.class.php";
include "statut.class.php";
include "ligne_com.class.php";
include "commande.class.php";

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json');


if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $entity = $_GET["entity"];
    $method= $_GET["method"];
    $params= $_GET["params"];

    $pdo = new PDO(DatabaseConfig::getConStr(), DatabaseConfig::$USER, DatabaseConfig::$PASSWORD);

    if ($entity == "profil"){
        if ($method == "create"){
            $result = new ResultData(false, null, null);
            $profilDico = [
                "name" => $params
            ];
            $stmt = $pdo->prepare(Constants::$SQL_INSERT_PROFIL);
            $stmt->execute($profilDico);
            $result->setMessage("profil ".$params." crée");
            echo json_encode($result);
        }
        if ($method == "getall"){
            $result = new ResultData(false, null, null);
            $all = $pdo->query(Constants::$SQL_SELECT_PROFILS)->fetchAll();
            $profils = [];
            foreach($all as $p){
                $profil = new Profil($p["id"], $p["name"]);
                $profils[] = $profil;
            }
            $result->setData($profils);
            echo json_encode($profils);
        }
        if ($method == "get"){
            $result = new ResultData(false, null, null);
            $profilDico = [
                "id" => $params
            ];
            $stmt = $pdo->prepare(Constants::$SQL_SELECT_PROFIL);
            $stmt->execute($profilDico);
            $profil = null;
            if ($stmt->rowCount() == 1){
                $p = $stmt->fetch();
                $profil = new Profil($p["id"], $p["name"]);
                $result->setData($profil);
            }else{
                $result->setMessage("Profil avec id ".$params." introuvable");
            }
            echo json_encode($result);
        }
    }
    if ($entity == "user"){
        if ($method == "create"){
            $result = new ResultData(false, null, null);
            $userDico = Util::createDicoFromStringParams($params);
            $stmt= $pdo->prepare(Constants::$SQL_INSERT_USER);
            $stmt->execute($userDico);
            $result->setMessage("User ".$userDico["login"]." crée avec succes");
            echo json_encode($result);
        }
        if ($method == "getall"){
            $result = new ResultData(false, null, null);
            $all = $pdo->query(Constants::$SQL_SELECT_USERS)->fetchAll();
            $users = [];
            foreach($all as $u){
                $user = new User($u["id"], $u["nom"], $u["prenom"], $u["email"], $u["login"], $u["password"], $u["idprofil"]);
                $users[] = $user;
            }
            $result->setData($users);
            echo json_encode($result);
        }
        if ($method == "get"){
            $result = new ResultData(false,null, null);
            $data = [
                "id" => $params
            ];
            $stmt = $pdo->prepare(Constants::$SQL_SELECT_USER);
            $stmt->execute($data);
            $user = null;
            if ($stmt->rowCount() == 1){
                $u = $stmt->fetch();
                $user = new User($u["id"], $u["nom"], $u["prenom"], $u["email"], $u["login"], $u["password"], $u["idprofil"]);
                $result->setData($user);
            }else{
                $result->setMessage("User avec id ".$params." introuvable");
            }
            echo json_encode($result);
        }
    }
    if ($entity == "article"){
        if ($method == "create"){
            $result = new ResultData(false, null, null);
            $tabParams = explode(";", $params);
            $articleDico = Util::createArticleDicoFromStringParams($params);
            $stmt = $pdo->prepare(Constants::$SQL_INSERT_ARTICLE);
            $stmt->execute($articleDico);
            $result->setMessage("Article ".$articleDico["label"]." crée");
            echo json_encode($result);
        }
        if ($method == "getall"){
            $result = new ResultData(false, null, null);
            $all = $pdo->query(Constants::$SQL_SELECT_ARTICLES)->fetchAll();
            $articles = [];
            foreach($all as $a){
                $article = new Article($a["id"], $a["label"], $a["description"], $a["image"], $a["prix"]);
                $articles[] = $article;
            }
            $result->setData($articles);
            echo json_encode($result);
        }
        if ($method == "get"){
            $result = new ResultData(false,null, null);
            $data = [
                "id" => $params
            ];
            $stmt = $pdo->prepare(Constants::$SQL_SELECT_ARTICLE);
            $stmt->execute($data);
            if ($stmt->rowCount() == 1){
                $a = $stmt->fetch();
                $article = new Article($a["id"], $a["label"], $a["description"], $a["image"], $a["prix"]);
                $result->setData($article);
            }else{
                $result->setMessage("Article avec id ".$params." introuvable");
            }
            echo json_encode($result);
        }
    }
    if ($entity == "statut"){
        if ($method == "create"){
            $result = new ResultData(false, null, null);
            $statutDico = [
                "libelle" => $params
            ];
            $stmt = $pdo->prepare(Constants::$SQL_INSERT_STATUT);
            $stmt->execute($statutDico);
            $result->setMessage("statut ".$params." crée");
            echo json_encode($result);
        }
        if ($method == "getall"){
            $result = new ResultData(false, null, null);
            $all = $pdo->query(Constants::$SQL_SELECT_STATUTS)->fetchAll();
            $statuts = [];
            foreach($all as $s){
                $statut = new Statut($s["id"], $s["libelle"]);
                $statuts[] = $statut;
            }
            $result->setData($statuts);
            echo json_encode($statuts);
        }
        if ($method == "get"){
            $result = new ResultData(false,null, null);
            $data = [
                "id" => $params
            ];
            $stmt = $pdo->prepare(Constants::$SQL_SELECT_STATUT);
            $stmt->execute($data);
            if ($stmt->rowCount() == 1){
                $a = $stmt->fetch();
                $statut = new Statut($a["id"], $a["libelle"]);
                $result->setData($statut);
            }else{
                $result->setMessage("Statut avec id ".$params." introuvable");
            }
            echo json_encode($result);
        }
    }
    if ($entity == "ligne_com"){
        if ($method == "create"){
            $result = new ResultData(false, null, null);
            $tabParams = explode(";",$params);
            $ligneComDico = [
                "article_id" => $tabParams[0],
                "qte" => $tabParams[1],
                "montant" => $tabParams[2],
                "commande_id" => $tabParams[3]
            ];
            $stmt = $pdo->prepare(Constants::$SQL_INSERT_LIGNE_COM);
            $stmt->execute($ligneComDico);
            $result->setMessage("Article avec id ".$tabParams[0]." en qte ".$tabParams[1]." ajouter avec succès");
            echo json_encode($result);
        }
        if ($method == "getall"){
            $result = new ResultData(false, null, null);
            $all = $pdo->query(Constants::$SQL_SELECT_LIGNE_COMS)->fetchAll();
            $ligneComs = [];
            foreach($all as $l){
                $ligneCom = new LigneCom($l["id"], $l["article_id"], $l["qte"], $l["montant"], $l["commande_id"]);
                $ligneComs[] = $ligneCom;
            }
            $result->setData($ligneComs);
            echo json_encode($result);
        }
        if ($method == "getallbyid"){
            $result = new ResultData(false, null, null);
            $dico = [
                "commande_id" => $params
            ];
            $stmt = $pdo->prepare(Constants::$SQL_SELECT_LIGNE_COMS_BY_ID);
            $stmt->execute($dico);
            $all = $stmt->fetchAll();
            $ligneComs = [];
            foreach($all as $l){
                $ligneCom = new LigneCom($l["id"], $l["article_id"], $l["qte"], $l["montant"], $l["commande_id"]);
                $ligneComs[] = $ligneCom;
            }
            $result->setData($ligneComs);
            echo json_encode($result);
        }
        if ($method == "get"){
            $result = new ResultData(false,null, null);
            $dico = [
                "id" => $params
            ];
            $stmt = $pdo->prepare(Constants::$SQL_SELECT_LIGNE_COM);
            $stmt->execute($dico);
            if ($stmt->rowCount() == 1){
                $lc = $stmt->fetch();
                $ligneCom = new LigneCom($lc["id"], $lc["article_id"],$lc["qte"],$lc["montant"],$lc["commande_id"]);
                $result->setData($ligneCom);
            }else{
                $result->setMessage("Ligne commande avec id ".$params." introuvable");
            }
            echo json_encode($result);
        }
        if ($method == "update"){
            $result = new ResultData(false,null, null);
            $tabParams = explode(";",$params);
            $dico = [
                "id" => $tabParams[0],
                "article_id" => $tabParams[1],
                "qte" => $tabParams[2],
                "montant" => $tabParams[3],
                "commande_id" => $tabParams[4]
            ];
            $stmt = $pdo->prepare(Constants::$SQL_UPDATE_LIGNE_COM);
            $stmt->execute($dico);
            $result->setMessage("Ligne commande avec id ".$tabParams[0]." mise à jour.");
            echo json_encode($result);
        }
    }
    if ($entity == "commande"){
        if ($method == "create"){
            $result = new ResultData(false, null, null);
            $tabParams = explode(";",$params);
            $commandeDico = [
                "statut_id" => $tabParams[0],
                "user_id" => $tabParams[1],
                "livreur_id" => $tabParams[2],
                "montant" => $tabParams[3],
                "date_cmd" => $tabParams[4]
            ];
            $stmt = $pdo->prepare(Constants::$SQL_INSERT_COMMANDE);
            $stmt->execute($commandeDico);
            $result->setMessage("Commande avec id ".$tabParams[0]."  crée avec succès");
            echo json_encode($result);
        }
        if ($method == "getall"){
            $result = new ResultData(false, null, null);
            $all = $pdo->query(Constants::$SQL_SELECT_COMMANDES)->fetchAll();
            $commandes = [];
            foreach($all as $c){
                $commande = new Commande($c["id"], $c["statutid"], $c["userid"], $c["livreurid"], $c["montant"], $c["datecmd"]);
                $commandes[] = $commande;
            }
            $result->setData($commandes);
            echo json_encode($result);
        }
        if ($method == "get"){
            $result = new ResultData(false,null, null);
            $dico = [
                "id" => $params
            ];
            $stmt = $pdo->prepare(Constants::$SQL_SELECT_COMMANDE);
            $stmt->execute($dico);
            if ($stmt->rowCount() == 1){
                $c = $stmt->fetch();
                $commande = new Commande($c["id"], $c["statutid"],$c["userid"],$c["livreurid"],$c["montant"], $c["datecmd"]);
                $result->setData($commande);
            }else{
                $result->setMessage("Commande avec id ".$params." introuvable");
            }
            echo json_encode($result);
        }
        if ($method == "update"){
            $result = new ResultData(false,null, null);
            $tabParams = explode(";",$params);
            $dico = [
                "id" => $tabParams[0],
                "statut_id" => $tabParams[1],
                "user_id" => $tabParams[2],
                "livreur_id" => $tabParams[3],
                "montant" => $tabParams[4],
                "date_cmd" => $tabParams[5]
            ];
            $stmt = $pdo->prepare(Constants::$SQL_UPDATE_COMMANDE);
            $stmt->execute($dico);
            $result->setMessage("Commande avec id ".$tabParams[0]." mise à jour.");
            echo json_encode($result);
        }
    }
}
?>