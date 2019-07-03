<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07/03/2019
 * Time: 17:47
 */

class BovinVente extends Entity {
    private $id;
    private $dateVente;
    private $prixVente;
    private $idClient;

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

}