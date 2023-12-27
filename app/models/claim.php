<?php 

    class Claim {
    private $cnx;
    private $id;
    private $description;
    private $date;
    private $clientId;

    public function __construct(){
        global $cnx;
        $this->cnx = $cnx;
        $this->cnx->select_db("assurance");
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDate($date){
        $this->date = $date;
    }
    public function getDate(){
        return $this->date;
    }
    public function setClientId($clientId){
        $this->clientId = $clientId;
    }
    public function getClientId(){
        return $this->clientId;
    }
    }
?>