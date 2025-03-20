<?php
include "database.config.class.php";
include "resultdata.class.php";
include "queries.class.php";
include "note.class.php";
include "util.class.php";
include "categorie.class.php";

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json');


if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $entity = $_GET["entity"];
    $method= $_GET["method"];
    $params= $_GET["params"];

    $pdo = new PDO(DatabaseConfig::getConStr(), DatabaseConfig::$USER, DatabaseConfig::$PASSWORD);

    if ($entity == "categorie"){
        if ($method == "create"){
            $result = new ResultData(false, null, null);
            $tab = explode(";",$params);
            if (count($tab) > 1){
                $categorieDico = Util::createCategorieDicoFromTabParams($tab);
                $stmt = $pdo->prepare(Query::$SQL_INSERT_CATEGORIE);
                $stmt->execute($categorieDico);
                $result->setMessage("Categorie ".$tab[0]." crée");
                http_response_code(201);
            }else{
                $result->setError("Nombre de parametre insuffisant ".$params);
                http_response_code(400);
            }
            echo json_encode($result);
        }
        if ($method == "getall"){
            $result = new ResultData(false, null, null);
            $all = $pdo->query(Query::$SQL_SELECT_CATEGORIES)->fetchAll();
            $categories = [];
            foreach($all as $c){
                $categorie = new Categorie($c["id"], $c["libelle"],$c["couleur"]);
                $categories[] = $categorie;
            }
            $result->setData($categories);
            http_response_code(200);
            echo json_encode($categories);
        }
        if ($method == "get"){
            $result = new ResultData(false, null, null);
            $categorieDico = [
                "id" => $params
            ];
            $stmt = $pdo->prepare(Query::$SQL_SELECT_CATEGORIE);
            $stmt->execute($categorieDico);
            $categorie = null;
            if ($stmt->rowCount() == 1){
                $c = $stmt->fetch();
                $categorie = new Categorie($c["id"], $c["libelle"],$c["couleur"]);
                $result->setData($categorie);
                http_response_code(200);
            }else{
                $result->setMessage("Categorie avec id ".$params." introuvable");
                http_response_code(404);
            }
            echo json_encode($result);
        }
        if ($method == "update"){
            $result = new ResultData(false, null, null);
            $tabParams =  explode(";",$params);
            if (count($tabParams) > 2){
                $categorieDico = Util::updateCategorieDicoFromTabParams($tabParams);
                $stmt = $pdo->prepare(Query::$SQL_UPDATE_CATEGORIE);
                $stmt->execute($categorieDico);
                $result->setMessage("Categorie ".$tabParams[1]." mis a jour avec succès !");
                http_response_code(200);
            }else{
                $result->setError(true);
                $result->setMessage("Paramétres incomplets");
                http_response_code(400);
            }
            echo json_encode($result);
        }
        if ($method == "delete"){
            $result = new ResultData(false, null, null);
            $categorieDico = [
                "id" => $params
            ];
            $stmt = $pdo->prepare(Query::$SQL_DELETE_CATEGORIE);
            $stmt->execute($categorieDico);
            $result->setMessage("Categorie avec id ".$params." supprimée avec succes");
            http_response_code(200);
            echo json_encode($result);
        }
    }
    if ($entity == "note"){
        if ($method == "create"){
            $result = new ResultData(false, null, null);
            $tabNote = explode(";",$params);
            if (count($tabNote)>2){
                $noteDico = Util::createNoteDicoFromTabParams($tabNote);
                $stmt= $pdo->prepare(Query::$SQL_INSERT_NOTE);
                $stmt->execute($noteDico);
                $result->setMessage("Note ".$noteDico["titre"]." crée avec succes");
                http_response_code(201);
            }else{
                $result->setError("Paramétres de la requete incorrecte !");
                http_response_code(400);
            }
            echo json_encode($result);
        }
        if ($method == "getall"){
            $result = new ResultData(false, null, null);
            $all = $pdo->query(Query::$SQL_SELECT_NOTES)->fetchAll();
            $notes = [];
            foreach($all as $n){
                $note = new Note($n["id"], $n["titre"], $n["contenu"], $n["id_categorie"]);
                $notes[] = $note;
            }
            $result->setData($notes);
            http_response_code(200);
            echo json_encode($result);
        }
        if ($method == "get"){
            $result = new ResultData(false,null, null);
            $data = [
                "id" => $params
            ];
            $stmt = $pdo->prepare(QUERY::$SQL_SELECT_NOTE);
            $stmt->execute($data);
            $note = null;
            if ($stmt->rowCount() > 0){
                $n = $stmt->fetch();
                $note = new Note($n["id"], $n["titre"], $n["contenu"], $n["id_categorie"]);
                $result->setData($note);
                http_response_code(200);
            }else{
                $result->setMessage("User avec id ".$params." introuvable");
                http_response_code(404);
            }
            echo json_encode($result);
        }
        if ($method == "update"){
            $result = new ResultData(false, null, null);
            $tabParams =  explode(";",$params);
            if (count($tabParams) > 3){
                $noteDico = Util::updateNoteDicoFromTabParams($tabParams);
                $stmt = $pdo->prepare(Query::$SQL_UPDATE_NOTE);
                $stmt->execute($noteDico);
                $result->setMessage("Note ".$tabParams[1]." mis a jour avec succès !");
                http_response_code(200);
            }else{
                $result->setError(true);
                $result->setMessage("Paramétres incomplets");
                http_response_code(400);
            }
            echo json_encode($result);          
        }
        if ($method == "delete"){
            $result = new ResultData(false, null, null);
            $noteDico = [
                "id" => $params
            ];
            $stmt = $pdo->prepare(Query::$SQL_DELETE_NOTE);
            $stmt->execute($noteDico);
            $result->setMessage("Note avec id ".$params." supprimée avec succes");
            http_response_code(200);
            echo json_encode($result);
        }
    }
}
?>