<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/03/2019
 * Time: 01:04
 */

class VeterinaireManager extends DB {
    public function get($id){
        $id = (int)$id;
        if ($this->exists($id)){
            $sql = "select * from vétérinaires where id=?";
            return new Veterinaire($this->query($sql,[$id])->first());
        }
        return false;
    }

    public function exists($id){
        $id = (int)$id;
        $sql = "SELECT COUNT(*) nbr FROM vétérinaires WHERE id = ?";
        return (bool)$this->query($sql,array($id))->first()['nbr'];
    }

    public function getList(){
        $veterinaires = [];
        $sql = "select * from vétérinaires";
        $veterinairesArr = $this->query($sql)->results();
        foreach ($veterinairesArr as $veterinaireArr){
            $veterinaires[] = new Veterinaire($veterinaireArr);
        }
        return $veterinaires;
    }

    public function insertVeterinaire(Veterinaire $veterinaire){
        if ($veterinaire === null) return false;
        $rep = $this->insert('vétérinaires',array(
            "cin" => $veterinaire->getCin(),
            "nom" => $veterinaire->getNom(),
            "prenom" => $veterinaire->getPrenom(),
            "email" => $veterinaire->getEmail(),
            "tele" => $veterinaire->getTele(),
        ));
        return $rep;
    }
}