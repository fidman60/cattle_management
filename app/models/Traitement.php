<?php

class Traitement extends Entity {
    private $id;
    private $dateTraitement;
    private $doseMl;
    private $description;
    private $idBovin;
    private $idVeterinaire;
    private $idMedicament;
    private $idTransporteur;
    private $idTypeTraitement;
    private $prixTraitement;
    private $prixTransporteur;

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
    public function getDateTraitement()
    {
        return $this->dateTraitement;
    }

    /**
     * @param mixed $dateTraitement
     */
    public function setDateTraitement($dateTraitement)
    {
        $this->dateTraitement = $dateTraitement;
    }

    /**
     * @return mixed
     */
    public function getDoseMl()
    {
        return $this->doseMl;
    }

    /**
     * @param mixed $doseMl
     */
    public function setDoseMl($doseMl)
    {
        $this->doseMl = $doseMl;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public function getIdVeterinaire()
    {
        return $this->idVeterinaire;
    }

    /**
     * @param mixed $idVeterinaire
     */
    public function setIdVeterinaire($idVeterinaire)
    {
        $this->idVeterinaire = $idVeterinaire;
    }

    /**
     * @return mixed
     */
    public function getIdMedicament()
    {
        return $this->idMedicament;
    }

    /**
     * @param mixed $idMedicament
     */
    public function setIdMedicament($idMedicament)
    {
        $this->idMedicament = $idMedicament;
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
    public function getIdTypeTraitement()
    {
        return $this->idTypeTraitement;
    }

    /**
     * @param mixed $idTypeTraitement
     */
    public function setIdTypeTraitement($idTypeTraitement)
    {
        $this->idTypeTraitement = $idTypeTraitement;
    }

    /**
     * @return mixed
     */
    public function getPrixTraitement()
    {
        return $this->prixTraitement;
    }

    /**
     * @param mixed $prixTraitement
     */
    public function setPrixTraitement($prixTraitement)
    {
        $this->prixTraitement = $prixTraitement;
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

}