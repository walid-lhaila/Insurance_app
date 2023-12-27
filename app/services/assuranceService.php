<?php

require_once("../models/Database.php");
require_once("IAssuranceService.php");
require_once("../models/Assurance.php");

class AssuranceService extends Database implements IAssuranceService {

    public function insert(Assurance $assurance) {
        $pdo = $this->connect();

        try {
            $pdo->beginTransaction();

            $name = $assurance->getName();
            $address = $assurance->getAddress();

            // Remove $assuranceId from the INSERT statement, as it's auto-incremented
            $sql = "INSERT INTO assurance (name, address) VALUES (:name, :address)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":address", $address);

            $stmt->execute();

            $pdo->commit();

        } catch (PDOException $e) {
            $pdo->rollBack();
            die("Error: " . $e->getMessage());
        }
    }

    // ...

    public function edit(Assurance $assurance) {
        $pdo = $this->connect();

        try {
            $pdo->beginTransaction();

            $assuranceId = $assurance->getAssuranceId();
            $name = $assurance->getName();
            $address = $assurance->getAddress();

            $sql = "UPDATE `Assurance` SET `name` = :name, `address`= :address  WHERE `assuranceId` = :assuranceId";
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":assuranceId", $assuranceId, PDO::PARAM_INT);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":address", $address);

            $stmt->execute();

            $pdo->commit();

        } catch (PDOException $e) {
            $pdo->rollBack();
            die("Error: ". $e->getMessage());
        }
    }

    public function delete($assuranceId) {
        $pdo = $this->connect();

        try {
            $pdo->beginTransaction();

            $sql ="DELETE FROM Assurance WHERE assuranceId = :assuranceId";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":assuranceId", $assuranceId, PDO::PARAM_INT);

            $stmt->execute();

            $pdo->commit();

        } catch (PDOException $e) {
            $pdo->rollBack();
            die("Error: ". $e->getMessage());
        }
    }

    public function display() {
        $pdo = $this->connect();

        try {
            $pdo->beginTransaction();

            $sql = "SELECT * FROM Assurance";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $assurances = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $pdo->commit();

            return $assurances;

        } catch (PDOException $e) {
            $pdo->rollBack();
            die("Error: ". $e->getMessage());
        }
    }
}

?>