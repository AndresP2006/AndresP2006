<?php

class ApartamentModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function getApartamentByTower($TowerId)
    {
        $this->db->query("SELECT * FROM apartamento a WHERE a.To_id = $TowerId");

        return $this->db->registros();

    }
}

