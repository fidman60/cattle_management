<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/03/2019
 * Time: 17:04
 */

class VendeurManager extends DB {

    public function get($id){
        $id = (int)$id;
        if ($this->exists($id)){
            $sql = "select * from vendeurs where id=?";
            return new Vendeur($this->query($sql,[$id])->first());
        }
        return false;
    }

    public function exists($id){
        $id = (int)$id;
        $sql = "SELECT COUNT(*) nbr FROM vendeurs WHERE id = ?";
        return (bool)$this->query($sql,array($id))->first()['nbr'];
    }

    public function getList(){
        $vendeurs = [];
        $sql = "select * from vendeurs";
        $vendeursArr = $this->query($sql)->results();
        foreach ($vendeursArr as $vendeurArr){
            $vendeurs[] = new Vendeur($vendeurArr);
        }
        return $vendeurs;
    }

    public function insertVendeur(Vendeur $vendeur){
        if ($vendeur === null) return false;
        $rep = $this->insert('vendeurs',array(
            "cin" => $vendeur->getCin(),
            "nom" => $vendeur->getNom(),
            "prenom" => $vendeur->getPrenom(),
            "email" => $vendeur->getEmail(),
            "tele" => $vendeur->getTele(),
        ));
        return $rep;
    }

}