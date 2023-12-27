<?php 
require_once("../models/client.php");
require_once("../services/clientService.php");

$clientService = new ClientService();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['action'] == 'addClient'){
        $clientId = uniqid(mt_rand(), true);
        $name = $_POST['name'];
        $cin = $_POST['cin'];
        $number = $_POST['number'];

        $client = new Client($clientId, $name, $cin, $number);
        $clientService->insert($client);

        header("location: ../views/clientDashbord.php");
        exit();

    }elseif ($_POST['action'] == "editClient"){
        $clientId = $_POST['clientId'];
        $name = $_POST['name'];
        $cin = $_POST['cin'];
        $number = $_POST['number'];
        $client = new Client($clientId, $name, $cin, $number);

        $clientService->edit($client);

        header("location: ../views/clientDashbord.php");
        exit();
    }elseif ($_POST['action'] == "deleteClient"){
        $clientId = $_POST['deleteClientId'];
        $clientService->delete($clientId);

        header("location: ../views/clientDashbord.php");
        exit();
    }
}

$client = $clientService->display();


?>