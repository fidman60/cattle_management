<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/03/2019
 * Time: 17:16
 */

class NourritureStockManager extends DB {

    public function getStockToUse($id_type_nourriture,$quantite){
        $id_type_nourriture = (int)$id_type_nourriture;
        $quantite = (float)$quantite;

        if ($this->stockToUseExists($id_type_nourriture,$quantite)){
            $sql = "SELECT *
                    FROM nourriture_stock
                    WHERE quantite_reste IN (
                        SELECT MAX(quantite_reste)
                        FROM nourriture_stock
                        WHERE id_type_nourriture = ?) AND quantite_reste - ? >= 0 AND id_type_nourriture = ?;";
            return new NourritureStock($this->query($sql,array($id_type_nourriture,$quantite,$id_type_nourriture))->first());
        }
        return false;
    }

    public function stockToUseExists($id_type_nourriture,$quantite){
        $quantite = (float)$quantite;
        $id_type_nourriture = (int)$id_type_nourriture;
        $sql = "SELECT count(*) nbr
                FROM nourriture_stock
                WHERE quantite_reste IN (
                    SELECT MAX(quantite_reste)
                    FROM nourriture_stock
                    WHERE id_type_nourriture = ?) AND quantite_reste - ? >= 0 AND id_type_nourriture = ?;";
        return (bool)$this->query($sql,array($id_type_nourriture,$quantite,$id_type_nourriture))->first()['nbr'];
    }

    public function updateStock(NourritureStock $nourritureStock){
        if (!$nourritureStock) return false;
        $rep = $this->update('nourriture_stock',$nourritureStock->getId(),array(
            "quantite_initiale" => $nourritureStock->getQuantiteInitiale(),
            "quantite_reste" => $nourritureStock->getQuantiteReste(),
            "date_achat" => $nourritureStock->getDateAchat(),
            "id_type_nourriture" => $nourritureStock->getIdTypeNourriture(),
        ));
        return $rep;
    }

    public function get($id){
        $id = (int)$id;
        if ($this->exists($id)){
            $sql = "select * from nourriture_stock where id=?";
            return new NourritureStock($this->query($sql,[$id])->first());
        }
        return false;
    }

    public function exists($id){
        $id = (int)$id;
        $sql = "SELECT COUNT(*) nbr FROM nourriture_stock WHERE id = ?";
        return (bool)$this->query($sql,array($id))->first()['nbr'];
    }

    public function insertNourritureStock(NourritureStock $nourritureStock){
        if ($nourritureStock === null) return false;
        return $this->insert('nourriture_stock',array(
            "quantite_initiale" => $nourritureStock->getQuantiteInitiale(),
            "quantite_reste" => $nourritureStock->getQuantiteReste(),
            "date_achat" => $nourritureStock->getDateAchat(),
            "prix" => $nourritureStock->getPrix(),
            "id_type_nourriture" => $nourritureStock->getIdTypeNourriture(),
        ));
    }

    public function getList(){
        $stockNourriture = [];
        $sql = "select * from nourriture_stock";
        $stockNourritureArr = $this->query($sql)->results();
        foreach ($stockNourritureArr as $stockNourritureArrRow){
            $stockNourriture[] = new NourritureStock($stockNourritureArrRow);
        }
        return $stockNourriture;
    }

}