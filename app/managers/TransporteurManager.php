<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/03/2019
 * Time: 00:57
 */

class TransporteurManager extends DB {

    public function get($id){
        $id = (int)$id;
        if ($this->exists($id)){
            $sql = "select * from transporteurs where id=?";
            return new Transporteur($this->query($sql,[$id])->first());
        }
        return false;
    }

    public function exists($id){
        $id = (int)$id;
        $sql = "SELECT COUNT(*) nbr FROM transporteurs WHERE id = ?";
        return (bool)$this->query($sql,array($id))->first()['nbr'];
    }

    public function getList(){
        $transporteurs = [];
        $sql = "select * from transporteurs";
        $transporteursArr = $this->query($sql)->results();
        foreach ($transporteursArr as $transporteurArr){
            $transporteurs[] = new Transporteur($transporteurArr);
        }
        return $transporteurs;
    }

    public function insertTransporteur(Transporteur $transporteur){
        if ($transporteur === null) return false;
        $rep = $this->insert('transporteurs',array(
            "cin" => $transporteur->getCin(),
            "nom" => $transporteur->getNom(),
            "prenom" => $transporteur->getPrenom(),
            "email" => $transporteur->getEmail(),
            "tele" => $transporteur->getTele(),
        ));
        return $rep;
    }

}