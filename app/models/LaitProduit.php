<?php

class LaitProduit extends  Entity {
    private $id;
    private $quantiteLait;
    private $dateProduction;
    private $idBovin;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getQuantiteLait()
    {
        return $this->quantiteLait;
    }

    /**
     * @param mixed $quantiteLait
     */
    public function setQuantiteLait($quantiteLait)
    {
        $this->quantiteLait = $quantiteLait;
    }

    /**
     * @return mixed
     */
    public function getDateProduction()
    {
        return $this->dateProduction;
    }

    /**
     * @param mixed $dateProduction
     */
    public function setDateProduction($dateProduction)
    {
        $this->dateProduction = $dateProduction;
    }

    /**
     * @return mixed
     */
    public function getIdBovin()
    {
        return $this->idBovin;
    }

    /**
     * @param mixed $idBovin
     */
    public function setIdBovin($idBovin)
    {
        $this->idBovin = $idBovin;
    }

}