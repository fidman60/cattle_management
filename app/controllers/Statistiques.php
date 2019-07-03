<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 12/03/2019
 * Time: 23:25
 */

class Statistiques extends Controller {

    public function indexAction(){
        $statistiquesManager = new StatistiquesManager();
        $donnes['countAll'] = $statistiquesManager->countAll();
        $donnes['countVeaux'] = $statistiquesManager->countVeaux();
        $donnes['countVaches'] = $statistiquesManager->countVaches();
        $donnes['countToureaux'] = $statistiquesManager->countToureaux();
        $donnes['stockLait'] = $statistiquesManager->stockLait();
        $donnes['stockHerbe'] = $statistiquesManager->stockHerbe();
        $donnes['countBovinsMalade'] = $statistiquesManager->countBovinsMalade();
        $donnes['countBovinsMort'] = $statistiquesManager->countBovinsMort();
        $donnes['countBovinsBon'] = $statistiquesManager->countBovinsBon();
        $donnes['countBovinsVendues'] = $statistiquesManager->countBovinsVendues();
        $donnes['countBovinsAchetees'] = $statistiquesManager->countBovinsAchetees();
        $donnes['countBovinsProduit'] = $statistiquesManager->countBovinsProduit();
        $donnes['countVachesSaillie'] = $statistiquesManager->countVachesSaillie();
        $donnes['countVachesAvancee'] = $statistiquesManager->countVachesAvancee();
        $donnes['countBovinsQuarantaine'] = $statistiquesManager->countBovinsQuarantaine();

        $this->_view->render("pages/statistiques",$donnes);
    }

}