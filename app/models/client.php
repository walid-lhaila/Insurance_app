<?php 
    class Client {
        private $clientId;
        private $name;
        private $cin;
        private $number;

        public function  __construct($clientId, $name, $cin, $number){
          $this->clientId = $clientId;
          $this->name = $name;
          $this->cin = $cin;
          $this->number = $number;
        }


        public function getClientId(){
            return $this->clientId;
        }
        public function setClientId($clientId){
            $this->clientId = $clientId;
        }
        public function getName(){
            return $this->name;
        }
        public function setName($name){
            $this->name = $name;
        }
        public function getCin() {
            return $this->cin;
        }
        public function setCin($cin){
            $this->cin = $cin;
        }
        public function getNumber() {
            return $this->number;
        }
        public function setNumber($number){
            $this->number = $number;
        }
        
        
        
    }

?>