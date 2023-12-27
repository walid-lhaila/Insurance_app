<?php

require_once ('config.php');

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "
        CREATE DATABASE IF NOT EXISTS " . DB_NAME . ";
        USE " . DB_NAME . ";

        CREATE TABLE IF NOT EXISTS Client (
            clientId INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(200),
            cin VARCHAR(50),
            number VARCHAR(20)
        );

        CREATE TABLE IF NOT EXISTS Assurance (
            assuranceId INT(50) PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(200),
            address VARCHAR(255)
        );

        CREATE TABLE IF NOT EXISTS Article (
            articleId INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(255),
            description VARCHAR(300),
            clientId VARCHAR(200),
            assuranceId VARCHAR(200),
            FOREIGN KEY (clientId) REFERENCES Client(name),
            FOREIGN KEY (assuranceId) REFERENCES Assurance(name)
        );

        CREATE TABLE IF NOT EXISTS Claim (
            claimId INT PRIMARY KEY AUTO_INCREMENT,
            date DATETIME,
            description VARCHAR(300),
            articleId INT,
            FOREIGN KEY (articleId) REFERENCES Article(articleId) ON DELETE CASCADE ON UPDATE CASCADE
        );

        CREATE TABLE IF NOT EXISTS Premium (
            premiumId INT PRIMARY KEY AUTO_INCREMENT,
            date DATETIME,
            claimId INT,
            FOREIGN KEY (claimId) REFERENCES Claim(claimId) ON DELETE CASCADE ON UPDATE CASCADE
        );
    ";

    $pdo->exec($sql);

    echo "Tables created successfully.";
} catch (PDOException $e) {
    die("Error creating tables: " . $e->getMessage());
}
?>