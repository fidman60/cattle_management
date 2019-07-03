<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 13/03/2019
 * Time: 11:21
 */

class MarcheManager extends DB {

    public function get($id){
        $id = (int)$id;
        if ($this->exists($id)){
            $sql = "select * from marchés where id=?";
            return new Marche($this->query($sql,[$id])->first());
        }
        return false;
    }

    public function exists($id){
        $id = (int)$id;
        $sql = "SELECT COUNT(*) nbr FROM marchés WHERE id = ?";
        return (bool)$this->query($sql,array($id))->first()['nbr'];
    }

    public function getList(){
        $marches = [];
        $sql = "select * from marchés";
        $marchesArr = $this->query($sql)->results();
        foreach ($marchesArr as $marcheArr){
            $marches[] = new Marche($marcheArr);
        }
        return $marches;
    }

    public function insertMarche(Marche $marche){
        if ($marche === null) return false;
        $rep = $this->insert('marchés',array(
            "nom" => $marche->getNom(),
            "adresse" => $marche->getAdresse(),
            "ville" => $marche->getVille(),
        ));
        return $rep;
    }

}