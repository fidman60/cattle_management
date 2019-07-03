<?php

class NourritureStock extends Entity {
    private $id;
    private $quantiteInitiale;
    private $quantiteReste;
    private $dateAchat;
    private $prix;
    private $idTypeNourriture;

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
    public function getQuantiteInitiale()
    {
        return $this->quantiteInitiale;
    }

    /**
     * @param mixed $quantiteInitiale
     */
    public function setQuantiteInitiale($quantiteInitiale)
    {
        $this->quantiteInitiale = $quantiteInitiale;
    }

    /**
     * @return mixed
     */
    public function getQuantiteReste()
    {
        return $this->quantiteReste;
    }

    /**
     * @param mixed $quantiteReste
     */
    public function setQuantiteReste($quantiteReste)
    {
        $this->quantiteReste = $quantiteReste;
    }

    /**
     * @return mixed
     */
    public function getDateAchat()
    {
        return $this->dateAchat;
    }

    /**
     * @param mixed $dateAchat
     */
    public function setDateAchat($dateAchat)
    {
        $this->dateAchat = $dateAchat;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getIdTypeNourriture()
    {
        return $this->idTypeNourriture;
    }

    /**
     * @param mixed $idTypeNourriture
     */
    public function setIdTypeNourriture($idTypeNourriture)
    {
        $this->idTypeNourriture = $idTypeNourriture;
    }


}