<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/03/2019
 * Time: 01:09
 */

class MedicamentManager extends DB {

    public function get($id){
        $id = (int)$id;
        if ($this->exists($id)){
            $sql = "select * from médicaments where id=?";
            return new Medicament($this->query($sql,[$id])->first());
        }
        return false;
    }

    public function exists($id){
        $id = (int)$id;
        $sql = "SELECT COUNT(*) nbr FROM médicaments WHERE id = ?";
        return (bool)$this->query($sql,array($id))->first()['nbr'];
    }

    public function getList(){
        $medicaments = [];
        $sql = "select * from médicaments";
        $medicamentsArr = $this->query($sql)->results();
        foreach ($medicamentsArr as $medicamentArr){
            $medicaments[] = new Medicament($medicamentArr);
        }
        return $medicaments;
    }

    public function updateMedicament(Medicament $mediacament){
        if ($mediacament === null) return false;
        $rep = $this->update('médicaments',$mediacament->getId(),array(
            "nom" => $mediacament->getNom(),
            "quantite" => $mediacament->getQuantite(),
            "quantite_reste" => $mediacament->getQuantiteReste(),
            "prix_unitaire" => $mediacament->getPrixUnitaire(),
        ));
        return $rep;
    }

    public function insertMedicament(Medicament $mediacament){
        if ($mediacament === null) return false;
        $rep = $this->insert('médicaments',array(
            "nom" => $mediacament->getNom(),
            "quantite" => $mediacament->getQuantite(),
            "quantite_reste" => $mediacament->getQuantiteReste(),
            "prix_unitaire" => $mediacament->getPrixUnitaire(),
        ));
        return $rep;
    }

}