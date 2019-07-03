<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/03/2019
 * Time: 16:50
 */

class Achats extends Controller {

    public function ajouterAction(){
        $tranporteurManager = new TransporteurManager();
        $vendeurManager = new VendeurManager();
        $marcheManager = new MarcheManager();

        $donnes['transporteurs'] = $tranporteurManager->getList();
        $donnes['vendeurs'] = $vendeurManager->getList();
        $donnes['marches'] = $marcheManager->getList();

        $this->_view->render('pages/nouvel_achat',$donnes);
    }

    public function ajouter_postAction(){
        if (isset($_POST['dateAchat']) && isset($_POST['prixAchat']) && isset($_POST['idVendeur']) && isset($_POST['idTransporteur'])
        && isset($_POST['prixTransporteur']) && isset($_POST['idMarche'])){

            $achatManager = new AchatManager();
            $donnes = [
                "date_achat" => $_POST['dateAchat'],
                "prix_achat" => $_POST['prixAchat'],
                "prix_transporteur" => $_POST['prixTransporteur'],
                "id_vendeur" => (int)$_POST['idVendeur'],
                "id_transporteur" => (int)$_POST['idTransporteur'],
                "id_marche" => (int)$_POST['idMarche']
            ];

            $achat = new Achat($donnes);

            if ($achatManager->insertAchat($achat)){
                Session::set("success","L'achat a été bien enregistré vous pouvez maintement ajouter les bovins a cet achat");
            } else {
                Session::set("error","Désolé, l'achat n'a pas été enregistrer, svp réssayer une autre fois");
            }
        } else {
            Session::set("error","Désolé, il manque des données à inserer merci de réssayer une autre fois");
        }
        header("Location: ". (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : SROOT . "achats/ajouter"));
    }

    public function get_listeAction(){
        $achatManager = new AchatManager();
        $donnes['achatsDetails'] = $achatManager->getListDetails();
        $this->_view->render('pages/liste_achats',$donnes);
    }

}