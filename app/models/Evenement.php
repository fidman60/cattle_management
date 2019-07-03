<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07/03/2019
 * Time: 18:00
 */

class Evenement extends Entity {
    private $idBovin;
    private $idEvent;
    private $dateEvent;

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
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    /**
     * @param mixed $idEvent
     */
    public function setIdEvent($idEvent)
    {
        $this->idEvent = $idEvent;
    }

    /**
     * @return mixed
     */
    public function getDateEvent()
    {
        return $this->dateEvent;
    }

    /**
     * @param mixed $dateEvent
     */
    public function setDateEvent($dateEvent)
    {
        $this->dateEvent = $dateEvent;
    }
}