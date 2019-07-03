<?php

class Achat extends Entity {

    private $id;
    private $dateAchat;
    private $prixAchat;
    private $prixTransporteur;
    private $idVendeur;
    private $idTransporteur;
    private $idMarche;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDateAchat()
    {
        return $this->dateAchat;
    }

    public function setDateAchat($dateAchat)
    {
        $this->dateAchat = $dateAchat;
    }

    public function getPrixAchat()
    {
        return $this->prixAchat;
    }

    public function setPrixAchat($prixAchat)
    {
        $this->prixAchat = $prixAchat;
    }

    public function getIdVendeur()
    {
        return $this->idVendeur;
    }

    public function setIdVendeur($idVendeur)
    {
        $this->idVendeur = $idVendeur;
    }

    /**
     * @return mixed
     */
    public function getPrixTransporteur()
    {
        return $this->prixTransporteur;
    }

    /**
     * @param mixed $prixTransporteur
     */
    public function setPrixTransporteur($prixTransporteur)
    {
        $this->prixTransporteur = $prixTransporteur;
    }

    /**
     * @return mixed
     */
    public function getIdTransporteur()
    {
        return $this->idTransporteur;
    }

    /**
     * @param mixed $idTransporteur
     */
    public function setIdTransporteur($idTransporteur)
    {
        $this->idTransporteur = $idTransporteur;
    }

    /**
     * @return mixed
     */
    public function getIdMarche()
    {
        return $this->idMarche;
    }

    /**
     * @param mixed $idMarche
     */
    public function setIdMarche($idMarche)
    {
        $this->idMarche = $idMarche;
    }

}