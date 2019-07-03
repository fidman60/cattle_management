<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 08/03/2019
 * Time: 00:03
 */

class LaitVente extends Entity {
    private $id;
    private $quantiteLait;
    private $dateVente;
    private $prixVente;
    private $idClient;
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
    public function getDateVente()
    {
        return $this->dateVente;
    }

    /**
     * @param mixed $dateVente
     */
    public function setDateVente($dateVente)
    {
        $this->dateVente = $dateVente;
    }

    /**
     * @return mixed
     */
    public function getPrixVente()
    {
        return $this->prixVente;
    }

    /**
     * @param mixed $prixVente
     */
    public function setPrixVente($prixVente)
    {
        $this->prixVente = $prixVente;
    }

    /**
     * @return mixed
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * @param mixed $idClient
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
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