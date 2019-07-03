<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/03/2019
 * Time: 13:02
 */

class PoidsBovinManager extends DB {

    public function insertPoidsBovin(PoidsBovin $poidsBovin){
        
        $rep = $this->insert('poids_bovin',array(
            "poids" => $poidsBovin->getPoids(),
            "date_poids" => $poidsBovin->getDatePoids(),
            "id_bovin" => $poidsBovin->getIdBovin()
        ));

        return $rep;
    }

    public function getPoidsBovin($idBovin){
        $poidsBovin = [];
        $sql = "select * from poids_bovin where id_bovin = ?";
        $poidsBovinArr = $this->query($sql,array($idBovin))->results();
        if (count($poidsBovinArr) > 0){
            foreach ($poidsBovinArr as $poidBovinArr){
                $poidsBovin[] = new PoidsBovin($poidBovinArr);
            }
        }
        return $poidsBovin;
    }

    public function getLastPoidsBovin($idBovin){
        $sql = "select * from poids_bovin where id_bovin = ? order by date_poids desc limit 0,1";
        return new PoidsBovin($this->query($sql,array($idBovin))->first());
    }

}