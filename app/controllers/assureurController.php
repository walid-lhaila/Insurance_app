<?php

require_once("../models/assurance.php");
require_once("../services/assuranceService.php");

$assuranceService = new AssuranceService();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'addAssurance') {
        $assuranceId = uniqid(mt_rand(), true);
        $name = $_POST['name'];
        $address = $_POST['address'];

        $assurance = new Assurance($assuranceId, $name, $address);

        $assuranceService->insert($assurance);

        header("Location: ../views/assureurDashbord.php");
        exit;

    } else if ($_POST["action"] == "editAssurance") {
        $assuranceId = $_POST['assuranceId'];
        $name = $_POST['name'];
        $address = $_POST['address'];

        $assurance = new Assurance($assuranceId, $name, $address);

        $assuranceService->edit($assurance);

        header("Location: ../views/assuranceDashbord.php");
        exit;

    } else if ($_POST['action'] == "deleteAssurance") {
        $assuranceId = $_POST["delete_assurance_ID"];

        $assuranceService->delete($assuranceId);

        header("Location: ../views/assuranceDashbord.php");
        exit;
    }
}

$assurances = $assuranceService->display();
?>