<?php

class Bovin extends Entity {

    private $id;
    private $poidsInitiale;
    private $description;
    private $dateNaissance;
    private $quarantaine;
    private $prixAchat;
    private $idAchat;
    private $idVente;
    private $idSexe;
    private $idEtat;
    private $idBovinMere;
    private $idBovinPere;
    private $idEtatGrossesse;
    private $idTypeBovin;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPoidsInitiale()
    {
        return $this->poidsInitiale;
    }

    public function setPoidsInitiale($poidsInitiale)
    {
        $this->poidsInitiale = $poidsInitiale;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return mixed
     */
    public function getQuarantaine()
    {
        return $this->quarantaine;
    }

    /**
     * @param mixed $quarantaine
     */
    public function setQuarantaine($quarantaine)
    {
        $this->quarantaine = $quarantaine;
    }

    /**
     * @return mixed
     */
    public function getPrixAchat()
    {
        return $this->prixAchat;
    }

    /**
     * @param mixed $prixAchat
     */
    public function setPrixAchat($prixAchat)
    {
        $this->prixAchat = $prixAchat;
    }

    public function getIdAchat()
    {
        return $this->idAchat;
    }

    public function setIdAchat($idAchat)
    {
        $this->idAchat = $idAchat;
    }

    public function getIdVente()
    {
        return $this->idVente;
    }

    public function setIdVente($idVente)
    {
        $this->idVente = $idVente;
    }

    public function getIdSexe()
    {
        return $this->idSexe;
    }

    public function setIdSexe($idSexe)
    {
        $this->idSexe = $idSexe;
    }

    public function getIdEtat()
    {
        return $this->idEtat;
    }

    public function setIdEtat($idEtat)
    {
        $this->idEtat = $idEtat;
    }

    /**
     * @return mixed
     */
    public function getIdBovinMere()
    {
        return $this->idBovinMere;
    }

    /**
     * @param mixed $idBovinMere
     */
    public function setIdBovinMere($idBovinMere)
    {
        $this->idBovinMere = $idBovinMere;
    }

    /**
     * @return mixed
     */
    public function getIdBovinPere()
    {
        return $this->idBovinPere;
    }

    /**
     * @param mixed $idBovinPere
     */
    public function setIdBovinPere($idBovinPere)
    {
        $this->idBovinPere = $idBovinPere;
    }

    /**
     * @return mixed
     */
    public function getIdEtatGrossesse()
    {
        return $this->idEtatGrossesse;
    }

    /**
     * @param mixed $idEtatGrossesse
     */
    public function setIdEtatGrossesse($idEtatGrossesse)
    {
        $this->idEtatGrossesse = $idEtatGrossesse;
    }

    /**
     * @return mixed
     */
    public function getIdTypeBovin()
    {
        return $this->idTypeBovin;
    }

    /**
     * @param mixed $idTypeBovin
     */
    public function setIdTypeBovin($idTypeBovin)
    {
        $this->idTypeBovin = $idTypeBovin;
    }

}