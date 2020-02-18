<?php

namespace App\Model;

class Client
{

    private $id;
    private $firstname;
    private $lastname;
    private $entry_date;
    private $departure_date;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFirstName()
    {
        return $this->firstname;
    }

    public function setFirstName($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getLastName()
    {
        return $this->lastname;
    }

    public function setLastName($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getEntry_date()
    {
        return $this->entry_date;
    }

    public function setEntry_date($entry_date)
    {
        $this->entry_date = $entry_date;
    }

    public function getDeparture_date()
    {
        return $this->departure_date;
    }

    public function setDeparture_date($departure_date)
    {
        $this->departure_date = $departure_date;
    }
}
