<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/03/2019
 * Time: 00:49
 */

class TraitementManager extends DB {

    public function getTraitmentsBovin($idBovin){
        $idBovin = (int)$idBovin;
        $sql = "SELECT * FROM traitements WHERE id_bovin = ?";
        $listTraitements = [];
        $listTraitementsArr = $this->query($sql,array($idBovin))->results();

        $transporteurManager = new TransporteurManager();
        $veterinaireManager = new VeterinaireManager();
        $medicamentManager = new MedicamentManager();

        foreach ($listTraitementsArr as $traitementArr){
            $line = [];
            $line['traitement'] = new Traitement($traitementArr);
            $line['transporteur'] = $transporteurManager->get($line['traitement']->getIdTransporteur());
            $line['veterinaire'] = $veterinaireManager->get($line['traitement']->getIdVeterinaire());
            $line['medicament'] = $medicamentManager->get($line['traitement']->getIdMedicament());
            $listTraitements[] = $line;
        }
        return $listTraitements;
    }

    public function getListDetails(){
        $traitements = [];
        $sql = "select * from traitements";
        $traitementsArr = $this->query($sql)->results();
        $medicamentManager = new MedicamentManager();
        $bovinManager = new BovinManager();
        foreach ($traitementsArr as $traitementArr){
            $line = [];
            $line['traitement'] = new Traitement($traitementArr);
            $line['medicament'] = $medicamentManager->get($line['traitement']->getIdMedicament());
            $line['bovin'] = $bovinManager->getBovin($line['traitement']->getIdBovin());
            $traitements[] = $line;
        }
        return $traitements;
    }

    public function insertTraitement(Traitement $traitement){
        if ($traitement === null) return false;
        return $this->insert('traitements',array(
            "date_traitement" => $traitement->getDateTraitement(),
            "dose_ml" => $traitement->getDoseMl(),
            "description" => $traitement->getDescription(),
            "id_bovin" => $traitement->getIdBovin(),
            "id_veterinaire" => $traitement->getIdVeterinaire(),
            "id_medicament" => $traitement->getIdMedicament(),
            "id_transporteur"=> $traitement->getIdTransporteur(),
            "prix_traitement"=> $traitement->getPrixTraitement(),
            "prix_transporteur"=> $traitement->getPrixTransporteur(),
            "id_type_traitement"=> $traitement->getIdTypeTraitement(),
        ));
    }

}