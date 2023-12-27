<?php 
require_once ("../models/database.php");
require_once ("../models/client.php");
require_once ("IClientService.php");


class clientService extends Database implements IClientService {
    function insert(Client $client){
        $pdo = $this->connect();

        try{
            $pdo->beginTransaction();

            $name = $client->getName();
            $cin = $client->getCin();
            $number = $client->getNumber();

            $sql = "INSERT INTO client (name, cin, number) VALUES (:name, :cin, :number)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':cin', $cin);
            $stmt->bindParam(':number', $number);

            $stmt->execute();
            $pdo->commit();
        } catch (PDOException $e) {
            $pdo->rollBack();
            die("Error: " . $e->getMessage());
        }
    }
    function edit(Client $client){
        $pdo = $this->connect();

        try {
            $pdo->beginTransaction();

            $clientId = $client->getClientId();
            $name = $client->getName();
            $cin = $client->getCin();
            $number = $client->getNumber();

        $sql = "UPDATE 'client' SET 'name' = :name, "
        }
    }
    function delete($clientId){

    }
    function display(){

    }
}



?>