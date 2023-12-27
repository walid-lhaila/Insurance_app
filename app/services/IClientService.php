<?php 
require_once ("../models/client.php");

interface IClientService{
    function insert(Client $client);
    function edit(Client $client);
    function delete($clientId);
    function display();
}


?>