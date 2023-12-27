<?php
require_once("../models/article.php");

interface IArticlService {
    function insert(Article $article);
    function edit(Article $article);
    function delete($articleId);
    function display();
}
?>