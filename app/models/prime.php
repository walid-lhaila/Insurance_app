<?php 

    class Premium {
        private $cnx;
        private $id;
        private $montant;
        private $date;
        private $clientId;

        public function  __construct(){
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
        public function setMontant($montant){
            $this->montant = $montant;
        }
        public function getMontant(){
            return $this->montant;
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
        public function get($clientId){
            return $this->clientId;
        }
        
    }


?>