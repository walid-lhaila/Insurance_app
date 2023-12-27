<?php 
    require_once ("../models/article.php");
    require_once ("../services/articleService.php");
   
        $articleService = new ArticleService();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ($_POST['action'] === 'addArticle'){
        $articleId = uniqid(mt_rand(), true);
        $name = $_POST['name'];
        $description = $_POST['description'];
        $clientId = $_POST['clientId'];
        $assuranceId = $_POST['assuranceId']; // Make sure 'assuranceId' is present in your form

        $article = new Article($articleId, $name, $description, $clientId, $assuranceId);

        $articleService->insert($article);

        header("Location: ../views/articleDashbord.php");
        exit();


        }else if($_POST['action'] == "editArticle"){

        $articleId = $_POST['articleId'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $clientId = $_POST['clientId'];
        $assuranceId = $_POST['assuranceId'];

        $article = new Article ($assuranceId, $name, $description, $clientId, $assuranceId);

        $articlaService->edit($article);
            header("Location: ../views/articleDashbord.php");
            exit();
        }else if ($_POST['action'] == "deleteArticle"){
            $articleId = $_POST['deleteArticleId'];
            $articleService->delete($articleId);
            header("location: ../views/articleDashbord.php");
            exit();
        }

      
    }

  $article = $articleService->display();
?>