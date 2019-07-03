<?php

class Bovins extends Controller {

    public function detailsAction($id=0){
        if ($id > 0){
            $bovinManager = new BovinManager();
            $bovinDetails = $bovinManager->getBovinDetails($id);
            $statistiquesManager = new StatistiquesManager();

            if ($bovinDetails) {
                $donnes = $bovinDetails;
                $statistiques = [];
                $statistiques['totalQuantiteLaitProduitBovin'] = $statistiquesManager->totalQuantiteLaitProduitBovin($id);
                $statistiques['totalQuantieBovinsProduitBovin'] = $statistiquesManager->totalQuantieBovinsProduitBovin($id);
                $statistiques['totalPrixTraitementsBovin'] = $statistiquesManager->totalPrixTraitementsBovin($id);
                $statistiques['totalPrixNourritureBovin'] = $statistiquesManager->totalPrixNourritureBovin($id);
                $statistiques['totalPrixAchatBovin'] = $statistiquesManager->totalPrixAchatBovin($id);
                $donnes['statistiques'] = $statistiques;
                $this->_view->render('/pages/details_bovin',$donnes);
            } else {
                header('Location: '.SROOT.'ooh/page_not_found');
            }
        } else {
            header('Location: '.SROOT.'ooh/page_not_found');
        }
    }

    public function nouvelle_naissanceAction(){
        $bovinManager = new BovinManager();
        $donnes['vaches'] = $bovinManager->getBovinsByType(VACHE);
        $donnes['toureaux'] = $bovinManager->getBovinsByType(TOUREAU);
        $this->_view->render('/pages/naissance_bovin',$donnes);
    }

    public function nouvelle_naissance_postAction(){

        if (isset($_POST["dateNaissance"]) && isset($_POST["poidsInitiale"]) && isset($_POST["description"])
            && isset($_POST["idSexe"]) && isset($_POST["idBovinMere"]) && isset($_POST["idBovinPere"]) && isset($_POST["idEtat"])){

            $bovinManager = new BovinManager();
            $eventManager = new EvenementManager();

            $donnes = [
                "date_naissance" => $_POST["dateNaissance"],
                "poids_initiale" => $_POST["poidsInitiale"],
                "description" => $_POST["description"],
                "id_sexe" => $_POST["idSexe"],
                "id_bovin_mere" => $_POST["idBovinMere"],
                "id_bovin_pere" => $_POST["idBovinPere"],
                "id_etat" => $_POST["idEtat"],
                "id_type_bovin" => VEAU,
                "quarantaine" => false
            ];

            $bovin = new Bovin($donnes);

            try {
                $pdo = DB::getInstance()->getPDO();
                $pdo->beginTransaction();

                $bovinManager->insertBovin($bovin);

                // ajouter le poids
                $donnes = array(
                    "poids" => $bovin->getPoidsInitiale(),
                    "date_poids" => $bovin->getDateNaissance(),
                    "id_bovin" => DB::lastInsertId(),
                );
                $poids = new PoidsBovin($donnes);
                $poidsBovinManager = new PoidsBovinManager();
                $poidsBovinManager->insertPoidsBovin($poids);

                // ajouter l'event
                $event = new Evenement(array(
                    "id_bovin" => DB::lastInsertId(),
                    "id_event" => EVENT_NAISSANCE,
                    "date_event" => $bovin->getDateNaissance()
                ));
                $eventManager->insertEvent($event);

                $pdo->commit();
                Session::set("success","Le veau a été bien ajouté !");
            } catch (Exception $e){
                Session::set("error","Désolé, le veau n'a pas été ajouté");
                $pdo->rollBack();
            }
        } else {
            Session::set("error","Désolé, il manque des données à inserer merci de réssayer une autre fois");
        }
        header("Location: ". (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : SROOT . "bovins/nouvelle_naissance"));
    }

    public function achat_bovinAction(){
        $bovinManager = new BovinManager();
        $achatManager = new AchatManager();
        $donnes['achats'] = $achatManager->getList();
        $donnes['vaches'] = $bovinManager->getBovinsByType(VACHE);
        $donnes['toureaux'] = $bovinManager->getBovinsByType(TOUREAU);
        $this->_view->render('/pages/achat_bovin',$donnes);
    }

    public function achat_bovin_postAction(){
        if (isset($_POST["dateNaissance"]) && isset($_POST["poidsInitiale"]) && isset($_POST["description"]) && isset($_POST["idAchat"])
            && isset($_POST["idSexe"]) && isset($_POST["idBovinMere"]) && isset($_POST["idBovinPere"]) && isset($_POST["idTypeBovin"])
        && isset($_POST['prixAchat'])){

            $bovinManager = new BovinManager();
            $eventManager = new EvenementManager();
            $achatManager = new AchatManager();

            $donnes = [
                "date_naissance" => $_POST["dateNaissance"],
                "poids_initiale" => (float)$_POST["poidsInitiale"],
                "description" => $_POST["description"],
                "prix_achat" => $_POST["prixAchat"],
                "id_sexe" => (int)$_POST["idSexe"],
                "id_achat" => $_POST["idAchat"] ? (int)$_POST["idAchat"] : null,
                "id_bovin_mere" => (int)$_POST["idBovinMere"] > 0 ? (int)$_POST["idBovinMere"] : null,
                "id_bovin_pere" => (int)$_POST["idBovinPere"] > 0 ? (int)$_POST["idBovinPere"] : null,
                "id_etat" => BON,
                "id_type_bovin" => (int)$_POST["idTypeBovin"],
                "quarantaine" => true,

            ];

            $bovin = new Bovin($donnes);

            if ($achatManager->exists($bovin->getIdAchat())){
                $achat = $achatManager->get($bovin->getIdAchat());
                try {
                    $pdo = DB::getInstance()->getPDO();
                    $pdo->beginTransaction();

                    // ajouter le bovin
                    $bovinManager->insertBovin($bovin);

                    // ajouter le poids
                    $donnes = array(
                        "poids" => $bovin->getPoidsInitiale(),
                        "date_poids" => $achat->getDateAchat(),
                        "id_bovin" => DB::lastInsertId(),
                    );
                    $poids = new PoidsBovin($donnes);
                    $poidsBovinManager = new PoidsBovinManager();
                    $poidsBovinManager->insertPoidsBovin($poids);

                    // ajouter l'event
                    $event = new Evenement(array(
                        "id_bovin" => DB::lastInsertId(),
                        "id_event" => EVENT_ACHETE,
                        "date_event" => $achat->getDateAchat()
                    ));
                    $eventManager->insertEvent($event);

                    $pdo->commit();
                    Session::set("success","Le bovin a été bien inseré !");
                } catch (Exception $e){
                    Session::set("error","Désolé, le bovin n'a pas été inseré");
                    $pdo->rollBack();
                }
            } else{
                Session::set("error","Désolé, l'achat n'existe pas ");
            }
        } else {
            Session::set("error","Désolé, il manque des données à inserer merci de réssayer une autre fois");
        }
        header("Location: ". (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : SROOT . "achats/get_liste"));
    }

    public function vente_bovinAction(){
        $bovinManager = new BovinManager();
        $venteManager = new BovinVenteManager();
        $donnes['ventes'] = $venteManager->getList();
        $donnes['bovins'] = $bovinManager->getBovinsToSell();
        $this->_view->render('/pages/vente_bovin',$donnes);
    }

    public function vente_bovin_postAction(){
        if (isset($_POST['idVente']) && isset($_POST['idBovin']) && (int)$_POST['idBovin'] > 0 && (int)$_POST['idVente']>0){
            $idVente = (int)$_POST['idVente'];
            $idBovin = (int)$_POST['idBovin'];
            $bovinManager = new BovinManager();
            $venteManager = new BovinVenteManager();
            $eventManager = new EvenementManager();

            $bovin = $bovinManager->getBovin($idBovin);
            $vente = $venteManager->get($idVente);

            if ($bovin && $vente){
                try{
                    $pdo = DB::getInstance()->getPDO();
                    $pdo->beginTransaction();

                    $bovin->setIdEtat(VENDUE);
                    $bovin->setIdVente($idVente);
                    $bovinManager->updateBovin($bovin);
                    $event = new Evenement([
                        "date_event" => $vente->getDateVente(),
                        "id_bovin" => $idBovin,
                        "id_event" => EVENT_VENDUE
                    ]);
                    $eventManager->insertEvent($event);
                    $pdo->commit();
                    Session::set("success","Le bovin a été bien ajouté à la vente");
                } catch (Exception $e){
                    Session::set("error","Désolé, le bovin n'a pas été ajouté à la vente");
                    $pdo->rollBack();
                }
            } else {
                Session::set("error","Désolé, les données envoyées sont incorrectes");
            }
        } else {
            Session::set("error","Désolé, il manque des données à inserer merci de réssayer une autre fois");
        }
        header("Location: ". (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : SROOT . "ventes/get_liste"));
    }

    public function getAction($type="",$action="",$page=0){
        $action = $action != null ? $action : "all";
        $type = $type != null && strlen($type) > 0 ? $type : "all";
        $page = $page && (int)$page > 0 ? $page : 1;
        $actions = ["all","malade","mort","vendue","bon","quarantaine","achete","saillie","avancee"];
        $types = ["veau","vache","toureau","all"];

        if (in_array($action,$actions) && in_array($type,$types)){
            $bovinManager = new BovinManager();
            $TNManager = new TypeNourritureManager();
            $statistiquesManager = new StatistiquesManager();


            $donnes["bovins_data"] = $bovinManager->getBovins($type,$action,$page);
            $donnes['types_nourriture'] = $TNManager->getAll();
            $donnes['type'] = $type;
            $donnes['action'] = $action;
            $donnes['page'] = $page;
            $donnes['countBovins'] = $bovinManager->countBovins($type,$action);
            $donnes['stockLait'] = $statistiquesManager->stockLait();
            $donnes['stockHerbe'] = $statistiquesManager->stockHerbe();

            $this->_view->render('/pages/index',$donnes);
        } else {
            echo "i must redirect to 404 not found page";
        }

    }

    public function ajouterAction($action=""){
        $action = $action != null && count($action) > 0 ? $action : null;

        if ($action !== null){
            switch ($action){
                case "poids":
                    if (isset($_POST['poids']) && isset($_POST['datePoids']) && isset($_POST['idBovin'])){
                        $donnes = array(
                            "poids" => $_POST['poids'],
                            "date_poids" => $_POST['datePoids'],
                            "id_bovin" => $_POST['idBovin'],
                        );
                        $poids = new PoidsBovin($donnes);
                        $poidsBovinManager = new PoidsBovinManager();
                        if ($poidsBovinManager->insertPoidsBovin($poids))
                            Session::set("success","Le poid saisie pour le bovin id:".$poids->getIdBovin()." a été bien ajouté !");
                        else
                            Session::set("error","Désolé, le poids saisie n'a pas été ajouter, svp réssayer une autre fois");
                    } else {
                        Session::set("error","Désolé, il manque des données à inserer merci de réssayer une autre fois");
                    }
                    break;
                case "event":
                    if (isset($_POST['dateEvent']) && isset($_POST['idBovin']) && isset($_POST['idEvent'])){
                        $donnes = array(
                            "date_event" => $_POST['dateEvent'],
                            "id_bovin" => $_POST['idBovin'],
                            "id_event" => $_POST['idEvent'],
                        );
                        $event = new Evenement($donnes);
                        $eventManager = new EvenementManager();
                        $bovinManager = new BovinManager();

                        try {
                            $pdo = DB::getInstance()->getPDO();
                            $pdo->beginTransaction();

                            $bovin = $bovinManager->getBovin($event->getIdBovin());
                            $incompatibleEvent = false;

                            switch ($event->getIdEvent()){
                                case EVENT_MORT:
                                    $bovin->setIdEtat(MORT);
                                    $bovinManager->updateBovin($bovin);
                                    break;
                                case EVENT_MALADE:
                                    $bovin->setIdEtat(MALADE);
                                    $bovinManager->updateBovin($bovin);
                                    break;
                                case EVENT_SAILLIE:
                                    if ($bovin->getIdTypeBovin() == VACHE){
                                        $bovin->setIdEtatGrossesse(ETAT_GROSSESSE_SAILLIE);
                                        $bovinManager->updateBovin($bovin);
                                    } else{
                                        $incompatibleEvent = true;
                                        throw new Exception("L'evenement choisit est seulement valide pour la vache");
                                    }
                                    break;
                                case EVENT_AVANCE:
                                    if ($bovin->getIdTypeBovin() == VACHE){
                                        $bovin->setIdEtatGrossesse(ETAT_GROSSESSE_AVANCEE);
                                        $bovinManager->updateBovin($bovin);
                                    } else{
                                        $incompatibleEvent = true;
                                        throw new Exception("L'evenement choisit est seulement valide pour la vache");
                                    }
                                    break;
                                case EVENT_VELAGE:
                                    if ($bovin->getIdTypeBovin() == VACHE){
                                        $bovin->setIdEtatGrossesse(null);
                                        $bovinManager->updateBovin($bovin);
                                    } else{
                                        $incompatibleEvent = true;
                                        throw new Exception("L'evenement choisit est seulement valide pour la vache");
                                    }
                                    break;
                            }

                            $eventManager->insertEvent($event);

                            $pdo->commit();

                            Session::set("success","L'événement pour le bovin id:".$event->getIdBovin()." a été bien ajouté !");

                        } catch (Exception $e) {
                            if ($incompatibleEvent)
                                Session::set("error","Incompatible événement, l'événement choisit est valide seulement pour la vache");
                            else
                                Session::set("error","Désolé, l'événement n'a pas été ajouter, svp réssayer une autre fois");
                            $pdo->rollBack();
                        }
                    } else {
                        Session::set("error","Désolé, il manque des données à inserer merci de réssayer une autre fois");
                    }
                    break;
                case "production_lait":
                    if (isset($_POST['quantiteLait']) && isset($_POST['dateProduction']) && isset($_POST['idBovin'])){
                        $donnes = array(
                            "quantite_lait" => $_POST['quantiteLait'],
                            "date_production" => $_POST['dateProduction'],
                            "id_bovin" => $_POST['idBovin'],
                        );
                        $laitProduit = new LaitProduit($donnes);
                        $laitProduitManager = new LaitProduitManager();
                        $bovinManager = new BovinManager();
                        $bovin = $bovinManager->getBovin($laitProduit->getIdBovin());

                        if($bovin && (int)$bovin->getIdTypeBovin() === VACHE){
                            if ($laitProduitManager->insertProduction($laitProduit))
                                Session::set("success","Lait produit par la vache id:".$bovin->getIdBovin()." a été bien ajouté !");
                            else
                                Session::set("error","Désolé, lait produit n'a pas été ajouter, svp réssayer une autre fois");
                        } else {
                            Session::set("error","Désolé, vous devez choisir une vache");
                        }
                    } else {
                        Session::set("error","Désolé, il manque des données à inserer merci de réssayer une autre fois");
                    }
                    break;
                case "consomation":
                    if (isset($_POST['quantite']) && isset($_POST['nbrJours'])
                        && isset($_POST['prix']) && isset($_POST['dateDebut'])
                        && isset($_POST['idBovin']) && isset($_POST['idTypeNourriture'])){

                        $idTypeNourriture = (int)$_POST['idTypeNourriture'];
                        $donnes = array(
                            "quantite" => (float)$_POST['quantite'],
                            "nbr_jours" => (int)$_POST['nbrJours'],
                            "prix" => (float)$_POST['prix'],
                            "date_debut" => $_POST['dateDebut'],
                            "id_bovin" => (int)$_POST['idBovin'],
                        );

                        $nourriture = new Nourriture($donnes);
                        $nourritureManager = new NourritureManager();
                        $nourritureStockManager = new NourritureStockManager();
                        $nourritureStock = $nourritureStockManager->getStockToUse($idTypeNourriture,$nourriture->getQuantite());

                        if ($nourritureStock){
                            $nourriture->setIdNourritureStock($nourritureStock->getId());
                            $nourritureStock->setQuantiteReste($nourritureStock->getQuantiteReste() - $nourriture->getQuantite());
                            $pdo = DB::getInstance()->getPDO();
                            try{
                                $pdo->beginTransaction();
                                $nourritureManager->insertNourriture($nourriture);
                                $nourritureStockManager->updateStock($nourritureStock);
                                $pdo->commit();
                                Session::set("success","L'insetion de la consomation du bovin id: ".$nourriture->getIdBovin()." est réussite !");
                            } catch (Exception $e){
                                $pdo->rollBack();
                                Session::set("error","Désolé, l'insetion de consomation a été echoué, SVP réssayer une autre fois");
                            }
                        } else {
                            Session::set("error","Désolé, quantité nourriture est insuffisante merci de recharger le stock");
                        }
                    } else {
                        Session::set("error","Désolé, il manque des données à inserer merci de réssayer une autre fois");
                    }
                    break;
                default:
                    Session::set("error","Désolé, L'action demandé n'a été pas reconnue.");
            }
        } else {
            Session::set("error","Désolé, vous devez saisir l'action a effectuer, merci.");
        }
        header("Location: ". (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : SROOT));
    }

    public function supprimerAction(){
        if (isset($_POST['id'])){
            $id = (int)$_POST['id'];
            $bovinManager = new BovinManager();
            if ($bovinManager->deleteBovin($id)){
                Session::set("success","Le bovin avec ID: ".$id." a été bien supprimer !");
            } else {
                Session::set("error","Désolé, le bovin n'a pas été supprimer");
            }
        } else {
            Session::set("error","Désolé, id bovin manque. réssayer une autre fois");
        }
        header("Location: ". (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : SROOT));
    }

    public function meilleurs_bovinsAction(){
        $this->_view->render('/pages/meilleurs_bovins_form');
    }

    public function meilleurs_bovins_invoiceAction($nbr=0){
        if(!$nbr) $nbr = 10;
        $nbr = (int)$nbr;
        $bovinManager = new BovinManager();
        $bovinsDetails = $bovinManager->getTopBovinsList($nbr);
        $statistiquesManager = new StatistiquesManager();
        $w = array(30, 35, 40,40, 45);
        $header = array("ID","Poids","Date naissance","Type","Prix de vente conseiller");


        require(ROOT.DS."app".DS."lib".DS."fpdf".DS."invoice.php");


        $pdf = new FPDF('P','mm','A4');
        $pdf->addPage();
        $pdf->SetTitle("Meilleurs bovins");

        $pdf->setFont('arial','B',11);
        $pdf->cell(96);
        $pdf->cell(47,5,"Nom:");
        $pdf->setFont('arial','',"10");
        $pdf->cell(47,5,strtoupper(NOM_CLIENT),0,1,"R");

        $pdf->setFont('arial','B',11);
        $pdf->cell(96);
        $pdf->cell(47,5,"Prenom:");
        $pdf->setFont('arial','',"10");
        $pdf->cell(47,5,PRENOM_CLIENT,0,1,"R");

        $pdf->setFont('arial','B',11);
        $pdf->cell(96);
        $pdf->cell(47,5,"Pays:");
        $pdf->setFont('arial','',"10");
        $pdf->cell(47,5,PAYS,0,1,"R");

        $pdf->setFont('arial','B',11);
        $pdf->cell(96);
        $pdf->cell(47,5,"Adresse:");
        $pdf->setFont('arial','',"10");
        $pdf->cell(47,5,ADRESSE,0,1,"R");

        $pdf->ln(10);

        $pdf->setFont('arial','',11);
        $pdf->cell(190,8,"Meilleurs bovins",1,1,"C");

        $pdf->ln(10);

        // Header
        for($i=0;$i<count($header);$i++)
            $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
        $pdf->Ln();
        // Data
        foreach($bovinsDetails as $bovinArr) {
            $bovin = $bovinArr['bovin'];
            $lastPoids = $bovinArr['lastPoids'];
            $totalPrixTraitementsBovin = $statistiquesManager->totalPrixTraitementsBovin($bovin->getId());
            $totalPrixNourritureBovin = $statistiquesManager->totalPrixNourritureBovin($bovin->getId());
            $totalPrixAchatBovin = $statistiquesManager->totalPrixAchatBovin($bovin->getId());

            $pdf->Cell($w[0],6,$bovin->getId(),'LRB');
            $pdf->Cell($w[1],6,$lastPoids->getPoids()." KG",'LRB');
            $pdf->Cell($w[2],6,$bovin->getDateNaissance(),'LRB',0,'R');
            $pdf->Cell($w[3],6,getTypeBovin($bovin->getIdTypeBovin()),'LRB',0,'R');
            $pdf->Cell($w[4],6,calculerPrixBovin($totalPrixNourritureBovin,$totalPrixTraitementsBovin, $totalPrixAchatBovin,$lastPoids->getPoids())." DH",'LRB',0,'R');
            $pdf->Ln();
        }
        // Closing line
        $pdf->Cell(array_sum($w),0,'','T');

        $pdf->output();
    }

}