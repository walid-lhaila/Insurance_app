<?php 
require_once("../models/database.php");
require_once("../models/article.php");
require_once("IarticleService.php");

class ArticleService extends Database implements IArticlService {
    
    function insert(Article $article){
        $pdo = $this->connect();

        try {
            $pdo->beginTransaction();

            $sql = "INSERT INTO article (name, description, clientId, assuranceId) VALUES (:name, :description, :clientId, : assuranceId)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindparam(':clientId', $clientId);
            $stmt->bindParam(': assuranceId', $assuranceId);

            $stmt->execute();
            $pdo->commit();
        }

    }
    function edit(Article $article){

    }
    function delete($articleId){

    }
    function display(){

    }
}


?>