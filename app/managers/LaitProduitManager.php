<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/03/2019
 * Time: 16:42
 */

class LaitProduitManager extends DB {

    public function insertProduction(LaitProduit $laitProduit){

        $rep = $this->insert('lait_produit',array(
            "quantite_lait" => $laitProduit->getQuantiteLait(),
            "date_production" => $laitProduit->getDateProduction(),
            "id_bovin" => $laitProduit->getIdBovin()
        ));

        return $rep;
    }

    public function getLaitProduitBovin($idBovin){
        $listLaitProduit = [];
        $sql = "select * from lait_produit where id_bovin = ?";
        $laitProduitArr = $this->query($sql,array($idBovin))->results();
        foreach ($laitProduitArr as $laitProduitArrRow){
            $listLaitProduit[] = new LaitProduit($laitProduitArrRow);
        }
        return $listLaitProduit;
    }

}