<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/03/2019
 * Time: 17:26
 */

class AchatManager extends DB {

    public function get($id){
        $id = (int)$id;
        if ($this->exists($id)){
            $sql = "select * from achats where id=?";
            return new Achat($this->query($sql,[$id])->first());
        }
        return false;
    }

    public function exists($id){
        $id = (int)$id;
        $sql = "SELECT COUNT(*) nbr FROM achats WHERE id = ?";
        return (bool)$this->query($sql,array($id))->first()['nbr'];
    }

    public function getList(){
        $achats = [];
        $sql = "select * from achats";
        $achatsArr = $this->query($sql)->results();
        foreach ($achatsArr as $achatArr){
            $achats[] = new Achat($achatArr);
        }
        return $achats;
    }

    public function getListDetails(){
        $achats = [];
        $sql = "select * from achats";
        $achatsArr = $this->query($sql)->results();
        $transporteurManager = new TransporteurManager();
        $vendeurManager = new VendeurManager();
        $marcheManager = new MarcheManager();
        foreach ($achatsArr as $achatArr){
            $line = [];
            $line['achat'] = new Achat($achatArr);
            $line['totalBovins'] = $this->getTotalBovinsAchat($line['achat']->getId());
            $line['transporteur'] = $transporteurManager->get($line['achat']->getIdTransporteur());
            $line['vendeur'] = $vendeurManager->get($line['achat']->getIdVendeur());
            $line['marche'] = $marcheManager->get($line['achat']->getIdMarche());
            $achats[] = $line;
        }
        return $achats;
    }

    public function insertAchat(Achat $achat){
        if ($achat === null) return false;
        return $this->insert('achats',array(
            "date_achat" => $achat->getDateAchat(),
            "prix_achat" => $achat->getPrixAchat(),
            "prix_transporteur" => $achat->getPrixTransporteur(),
            "id_vendeur" => $achat->getIdVendeur(),
            "id_transporteur" => $achat->getIdTransporteur(),
            "id_marche" => $achat->getIdMarche()

        ));
    }

    public function getTotalBovinsAchat($idAchat){
        $idAchat = (int)$idAchat;
        $sql = "SELECT COUNT(*) nbr FROM bovins WHERE id_achat = ?";
        return (int)$this->query($sql,array($idAchat))->first()['nbr'];
    }

}