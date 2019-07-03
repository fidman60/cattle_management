<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07/03/2019
 * Time: 17:06
 */

class Medicament extends Entity {
    private $id;
    private $nom;
    private $quantite;
    private $quantiteReste;
    private $prixUnitaire;

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
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
    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }

    /**
     * @param mixed $prixUnitaire
     */
    public function setPrixUnitaire($prixUnitaire)
    {
        $this->prixUnitaire = $prixUnitaire;
    }


}