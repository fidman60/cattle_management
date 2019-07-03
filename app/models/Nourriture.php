<?php

class Nourriture extends Entity {

    private $id;
    private $quantite;
    private $nbrJours;
    private $prix;
    private $dateDebut;
    private $idBovin;
    private $idNourritureStock;

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
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param mixed $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    /**
     * @return mixed
     */
    public function getNbrJours()
    {
        return $this->nbrJours;
    }

    /**
     * @param mixed $nbrJours
     */
    public function setNbrJours($nbrJours)
    {
        $this->nbrJours = $nbrJours;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prixCalucle
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param mixed $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
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

    /**
     * @return mixed
     */
    public function getIdNourritureStock()
    {
        return $this->idNourritureStock;
    }

    /**
     * @param mixed $idNourritureStock
     */
    public function setIdNourritureStock($idNourritureStock)
    {
        $this->idNourritureStock = $idNourritureStock;
    }

}