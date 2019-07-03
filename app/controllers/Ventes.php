<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/03/2019
 * Time: 19:23
 */

class Ventes extends Controller {

    public function ajouterAction(){
        $clientManager = new ClientManager();

        $donnes['clients'] = $clientManager->getList();

        $this->_view->render('pages/nouvelle_vente',$donnes);
    }

    public function ajouter_postAction(){
        if (isset($_POST['dateVente']) && isset($_POST['prixVente']) && isset($_POST['idClient'])){

            $bovinVenteManager = new BovinVenteManager();
            $donnes = [
                "date_vente" => $_POST['dateVente'],
                "prix_vente" => $_POST['prixVente'],
                "id_client" => (int)$_POST['idClient'],
            ];

            $vente = new BovinVente($donnes);

            if ($bovinVenteManager->insertVente($vente)){
                Session::set("success","La vente a été bien enregistrer, vous pouvez maintement ajouter les bovins a cette vente");
            } else {
                Session::set("error","Désolé, la vente n'a pas été enregistrer, svp réssayer une autre fois");
            }
        } else {
            Session::set("error","Désolé, il manque des données à inserer merci de réssayer une autre fois");
        }
        header("Location: ". (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : SROOT . "ventes/ajouter"));
    }

    public function get_listeAction(){
        $venteManager = new BovinVenteManager();
        $donnes['ventesDetails'] = $venteManager->getListDetails();
        $this->_view->render('pages/liste_ventes',$donnes);
    }

}