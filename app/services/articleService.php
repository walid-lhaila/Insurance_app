<?php 
require_once("../models/database.php");
require_once("../models/article.php");
require_once("IarticleService.php");

class ArticleService extends Database implements IArticlService {
    
    function insert(Article $article){
        $pdo = $this->connect();
    
        try {
            $pdo->beginTransaction();
    
            $name = $article->getName();
            $description = $article->getDescription();
            $clientId = $article->getClientId();
            $assuranceId = $article->getAssuranceId();
    
            $sql = "INSERT INTO article (name, description, clientId, assuranceId) VALUES (:name, :description, :clientId, :assuranceId)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':clientId', $clientId);
            $stmt->bindParam(':assuranceId', $assuranceId);
    
            $stmt->execute();
            $pdo->commit();
        } catch (PDOException $e) {
            $pdo->rollBack();
            die("Error: " . $e->getMessage());
        }
    }
    function edit(Article $article){
        $pdo = $this->connect();
    
        try {
            $pdo->beginTransaction();
    
            $articleId = $article->getArticleId();
            $name = $article->getName();
            $description = $article->getDescription();
            $clientId = $article->getClientId();
            $assuranceId = $article->getAssuranceId();
    
            $sql = "UPDATE article SET name = :name, description = :description, clientId = :clientId, assuranceId = :assuranceId WHERE articleId = :articleId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':articleId', $articleId, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':clientId', $clientId);
            $stmt->bindParam(':assuranceId', $assuranceId);
    
            $stmt->execute();
    
            $pdo->commit();
        } catch (PDOException $e){
            $pdo->rollback();
            die("Error: " . $e->getMessage());
        }
    }
    function delete($articleId){
        $pdo = $this->connect();

        try {
            $pdo->beginTransaction();

            $sql = "DELETE FROM article WHERE articleId = $articleId";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":articleId",$articleId, PDO::PARAM_INT);
            $stmt->execute();

            $pdo->commit();
        }catch (PDOException $e){
            $pdo->rollback();
            die("Error: " . $e->getMessage());
        }
        

    }
    function display(){
        $pdo = $this->connect();
         try {
            $pdo->beginTransaction();
        $sql = "SELECT * FROM article";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $article = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pdo->commit();

        return $article;
    } catch (PDOException $e){
        $pdo->rollBack();
        die("Error: " . $e->getMessage());
    }
}
}


?>