<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07/03/2019
 * Time: 17:24
 */

class PoidsBovin extends Entity {
    private $id;
    private $poids;
    private $datePoids;
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
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * @param mixed $poids
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;
    }

    /**
     * @return mixed
     */
    public function getDatePoids()
    {
        return $this->datePoids;
    }

    /**
     * @param mixed $datePoids
     */
    public function setDatePoids($datePoids)
    {
        $this->datePoids = $datePoids;
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