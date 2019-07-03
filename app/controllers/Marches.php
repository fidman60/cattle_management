<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 13/03/2019
 * Time: 11:40
 */

class Marches extends Controller {

    public function indexAction(){
        $marcheManager = new MarcheManager();
        $donnes['marches'] = $marcheManager->getList();
        $this->_view->render("pages/liste_marches",$donnes);
    }

    public function ajouterAction(){
        $this->_view->render("pages/nouveau_marche");
    }

    public function ajouter_postAction(){
        if (isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['ville'])){
            $donnes = [
                "nom" => $_POST['nom'],
                "adresse" => $_POST['adresse'],
                "ville" => $_POST['ville']
            ];

            $marche = new Marche($donnes);
            $marcheManager = new MarcheManager();

            if ($marcheManager->insertMarche($marche)){
                Session::set("success","Le marché a été bien enregistré vous pouvez maintement ajouter des achats a cet marché");
            } else {
                Session::set("error","Désolé, Le marché n'est pas enregistré ");
            }
        } else {
            Session::set("error","Désolé, il manque des données à inserer merci de réssayer une autre fois");
        }

        header("Location: ". (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : SROOT . "marches/ajouter"));
    }

}