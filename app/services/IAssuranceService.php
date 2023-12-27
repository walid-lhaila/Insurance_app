<?php
require_once("../models/Assurance.php");

interface IAssuranceService {
    function insert(Assurance $assurance);
    function edit(Assurance $assurance);
    function delete($assuranceId);
    function display();
}
?>