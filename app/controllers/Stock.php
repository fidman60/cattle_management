<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 12/03/2019
 * Time: 02:47
 */

class Stock extends Controller {

    public function ajouter_nourritureAction(){
        $this->_view->render("pages/nouveau_nourriture_stock");
    }

    public function ajouter_nourriture_postAction(){
        if (isset($_POST['idTypeNourriture']) && isset($_POST['quantiteInitiale']) && isset($_POST['dateAchat']) && isset($_POST['prix'])){
            $donnes = [
                "quantite_initiale" => (float)$_POST['quantiteInitiale'],
                "quantite_reste" => (float)$_POST['quantiteInitiale'],
                "date_achat" => $_POST['dateAchat'] ? $_POST['dateAchat'] : null,
                "id_type_nourriture" => (int)$_POST['idTypeNourriture'],
                "prix" => $_POST['prix'] ? (float)$_POST['prix'] : null,
            ];

            $nourritureStock = new NourritureStock($donnes);
            $nourritureStockManager = new NourritureStockManager();

            if ($nourritureStockManager->insertNourritureStock($nourritureStock)){
                Session::set("success","Le stock de nourriture a été bien enregistré");
            } else {
                Session::set("error","Désolé, Le stock de nourriture n'a pas été enregistré");
            }
        } else {
            Session::set("error","Désolé, il manque des données à inserer merci de réssayer une autre fois");
        }

        header("Location: ". (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : SROOT . "stock/ajouter_nourriture"));
    }

    public function ajouter_medicamentAction(){
        $this->_view->render("pages/nouveau_stock_medicament");
    }

    public function ajouter_medicament_postAction(){
        if (isset($_POST['nom']) && isset($_POST['quantite']) && isset($_POST['prix'])){
            $donnes = [
                "nom" => $_POST['nom'],
                "quantite" => (float)$_POST['quantite'],
                "quantite_reste" => (float)$_POST['quantite'],
                "prix_unitaire" => (float)$_POST['prix'],
            ];

            $medicament = new Medicament($donnes);
            $medicamentManager = new MedicamentManager();

            if ($medicamentManager->insertMedicament($medicament)){
                Session::set("success","Le stock de médicament a été bien enregistrer");
            } else {
                Session::set("error","Désolé, Le stock de médicament n'a pas été enregistrer");
            }
        } else {
            Session::set("error","Désolé, il manque des données à inserer merci de réssayer une autre fois");
        }

        header("Location: ". (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : SROOT . "stock/ajouter_medicament"));
    }

    public function liste_nourritureAction(){
        $nourritureStockManager = new NourritureStockManager();
        $donnes['listeNourriture'] = $nourritureStockManager->getList();

        $this->_view->render('pages/liste_nourriture',$donnes);
    }

    public function liste_medicamentAction(){
        $medicamentManager = new MedicamentManager();
        $donnes['medicaments'] = $medicamentManager->getList();

        $this->_view->render('pages/liste_medicament',$donnes);
    }

}