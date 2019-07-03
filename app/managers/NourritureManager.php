<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/03/2019
 * Time: 18:07
 */

class NourritureManager extends DB {

    public function insertNourriture(Nourriture $nourriture){

        $rep = $this->insert('nourriture',array(
            "quantite" => $nourriture->getQuantite(),
            "nbr_jours" => $nourriture->getNbrJours(),
            "prix" => $nourriture->getPrix(),
            "date_debut" => $nourriture->getDateDebut(),
            "id_bovin" => $nourriture->getIdBovin(),
            "id_nourriture_stock" => $nourriture->getIdNourritureStock(),
        ));

        return $rep;
    }

    public function getListNourritureBovin($idBovin){
        $sql = "SELECT * FROM nourriture WHERE id_bovin = ?";
        $listNourriture = [];
        $listNourritureArr = $this->query($sql,array($idBovin))->results();
        $nourritureStockManager = new NourritureStockManager();
        foreach ($listNourritureArr as $nourritureArr){
            $line = [];
            $line['nourriture'] = new Nourriture($nourritureArr);
            $line['nourritureStock'] = $nourritureStockManager->get($line['nourriture']->getIdNourritureStock());
            $listNourriture[] = $line;
        }
        return $listNourriture;
    }

}