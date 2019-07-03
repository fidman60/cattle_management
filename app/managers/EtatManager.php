<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/03/2019
 * Time: 00:03
 */

class EtatManager extends DB{

    public function getEtat($id){
        $id = (int)$id;
        if ($this->etatExists($id)){
            $sql = "select * from états where id=?";
            return new Etat($this->query($sql,array($id))->first());
        }
        return false;
    }

    public function etatExists($id){
        $id = (int)$id;
        $sql = "SELECT COUNT(*) as nbr FROM `états` WHERE id = ?";
        return (bool)$this->query($sql,array($id))->first()['nbr'];
    }

}