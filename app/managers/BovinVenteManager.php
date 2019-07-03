<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/03/2019
 * Time: 19:38
 */

class BovinVenteManager extends DB {

    public function insertVente(BovinVente $bovinVente){
        if ($bovinVente === null) return false;
        return $this->insert('bovins_ventes',array(
            "date_vente" => $bovinVente->getDateVente(),
            "prix_vente" => $bovinVente->getPrixVente(),
            "id_client" => $bovinVente->getIdClient(),
        ));
    }

    public function getList(){
        $ventes = [];
        $sql = "select * from bovins_ventes";
        $ventesArr = $this->query($sql)->results();
        foreach ($ventesArr as $venteArr){
            $ventes[] = new BovinVente($venteArr);
        }
        return $ventes;
    }

    public function getListDetails(){
        $ventes = [];
        $sql = "select * from bovins_ventes";
        $ventesArr = $this->query($sql)->results();
        $clientManager = new ClientManager();
        foreach ($ventesArr as $venteArr){
            $line = [];
            $line['vente'] = new BovinVente($venteArr);
            $line['totalBovins'] = $this->getTotalBovinsVentes($line['vente']->getId());
            $line['client'] = $clientManager->get($line['vente']->getIdClient());
            $ventes[] = $line;
        }
        return $ventes;
    }

    public function get($id){
        $id = (int)$id;
        if ($this->exists($id)){
            $sql = "select * from bovins_ventes where id=?";
            return new BovinVente($this->query($sql,[$id])->first());
        }
        return false;
    }

    public function exists($id){
        $id = (int)$id;
        $sql = "SELECT COUNT(*) nbr FROM bovins_ventes WHERE id = ?";
        return (bool)$this->query($sql,array($id))->first()['nbr'];
    }

    public function getTotalBovinsVentes($idVente){
        $idVente = (int)$idVente;
        $sql = "SELECT COUNT(*) nbr FROM bovins WHERE id_vente = ?";
        return (int)$this->query($sql,array($idVente))->first()['nbr'];
    }

}