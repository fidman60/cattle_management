<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07/03/2019
 * Time: 17:38
 */

class TypeNourriture extends Entity {
    private $id;
    private $label;
    private $uniteMesure;

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
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getUniteMesure()
    {
        return $this->uniteMesure;
    }

    /**
     * @param mixed $uniteMesure
     */
    public function setUniteMesure($uniteMesure)
    {
        $this->uniteMesure = $uniteMesure;
    }

}