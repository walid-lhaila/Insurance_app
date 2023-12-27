<?php 
class Assurance
{
    private $assuranceId;
    private $name;
    private $address;

    public function __construct($assuranceId, $name, $address)
    {
        $this->assuranceId = $assuranceId;
        $this->name = $name;
        $this->address = $address;
    }

    // Getters and Setters

    public function getAssuranceId()
    {
        return $this->assuranceId;
    }

    public function setAssuranceId($assuranceId)
    {
        $this->assuranceId = $assuranceId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function SetAddress($address)
    {
        $this->address = $address;
    }

}


?>