<?php 

class Article {
    private $articleId;
    private $name;
    private $description;
    private $clientId;
    private $assuranceId;

    public function __construct($articleId, $name, $description, $clientId, $assuranceId){
        $this->articleId = $articleId;
        $this->name = $name;
        $this->description = $description;
        $this->clientId = $clientId;
        $this->assuranceId = $assuranceId;
    }

    public function getArticleId(){
        return $this->articleId;
    }
    public function setArticleId($articleId){
        $this->articleId = $articleId;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }   
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function getClientId(){
        return $this->clientId;
    }
    public function setClientId($clientId){
        $this->clientId = $clientId;
    }
    public function getAssuranceId(){
        return $this->assuranceId;
    }
    public function setAssuranceId($assurance){
        $this->assuranceId = $assurance;
    }
}

?>