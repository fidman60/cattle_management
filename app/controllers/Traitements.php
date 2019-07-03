<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 12/03/2019
 * Time: 00:46
 */

class Traitements extends Controller {

    public function ajouterAction(){
        $bovinManager = new BovinManager();
        $veterinaireManager = new VeterinaireManager();
        $medicamentManager = new MedicamentManager();
        $transporteurManager = new TransporteurManager();

        $donnes['bovins'] = $bovinManager->getListBovinPourTraitement();
        $donnes['veterinaires'] = $veterinaireManager->getList();
        $donnes['medicaments'] = $medicamentManager->getList();
        $donnes['transporteurs'] = $transporteurManager->getList();

        $this->_view->render("pages/nouveau_traitement",$donnes);
    }

    public function ajouter_postAction(){
        if (isset($_POST['idTypeTraitement']) && isset($_POST['dateTraitement']) && isset($_POST['prixTraitement'])
        && isset($_POST['doseMl']) && isset($_POST['idBovin']) && isset($_POST['idVeterinaire']) && isset($_POST['idMedicament'])
        && isset($_POST['idTransporteur'])){

            $donnes = [
                "date_traitement" => $_POST['dateTraitement'],
                "dose_ml" => $_POST['doseMl'] ? $_POST['doseMl'] : null,
                "id_bovin" => (int)$_POST['idBovin'],
                "id_veterinaire" => (int)$_POST['idVeterinaire'],
                "id_medicament" => $_POST['idMedicament'] ? (int)$_POST['idMedicament'] : null,
                "id_transporteur" => $_POST['idTransporteur'] ? (int)$_POST['idTransporteur'] : null,
                "prix_traitement" => (float)$_POST['prixTraitement'],
                "prix_transporteur" => $_POST['prixTransporteur'] ? (float)$_POST['prixTransporteur'] : null,
                "id_type_traitement" => (int)$_POST['idTypeTraitement'],
            ];
            $traitement = new Traitement($donnes);
            $traitementManager = new TraitementManager();
            $eventManager = new EvenementManager();

            try{
                $pdo = DB::getInstance()->getPDO();
                $pdo->beginTransaction();

                if($traitement->getIdMedicament() && $traitement->getDoseMl()){
                    $medicamentManager = new MedicamentManager();
                    $medicament = $medicamentManager->get($traitement->getIdMedicament());
                    $medicament->setQuantiteReste($medicament->getQuantiteReste() - $traitement->getDoseMl());
                    $medicamentManager->updateMedicament($medicament);
                }


                $traitementManager->insertTraitement($traitement);

                $event = new Evenement([
                    "date_event" => $traitement->getDateTraitement(),
                    "id_bovin" => $traitement->getIdBovin(),
                    "id_event" => EVENT_TRAITEMENT
                ]);
                $eventManager->insertEvent($event);
                $pdo->commit();
                Session::set("success","Le traitement a été bien enregistrer");
            } catch (Exception $e){
                Session::set("error","Désolé, le traitement n'a pas été enregistrer");
                $pdo->rollBack();

            }
        } else {
            Session::set("error","Désolé, il manque des données à inserer merci de réssayer une autre fois");
        }

        header("Location: ". (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : SROOT . "traitements/ajouter"));
    }

    public function get_listeAction(){
        $traitementManager = new TraitementManager();
        $donnes['traitementsDetails'] = $traitementManager->getListDetails();
        $this->_view->render("pages/liste_traitements",$donnes);
    }

}