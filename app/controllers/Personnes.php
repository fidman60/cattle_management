<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 12/03/2019
 * Time: 14:57
 */

class Personnes extends Controller {

    public function ajouterAction(){
        $this->_view->render("pages/nouveau_personne");
    }

    public function ajouter_postAction(){

        if (isset($_POST['typePersonne']) &&isset($_POST["cin"]) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['tele'])){
            $typePersonne = $_POST['typePersonne'] ? $_POST['typePersonne'] : "";
            $donnes = [
                'cin' => $_POST['cin'],
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'tele' => $_POST['tele'],
            ];

            switch ($typePersonne){
                case PERSONNE_VETERINAIRE:
                    $veterinaireManager = new VeterinaireManager();
                    $veterinaire = new Veterinaire($donnes);
                    if ($veterinaireManager->insertVeterinaire($veterinaire))
                        Session::set("success","Le vétérinaire a été bien enregistré");
                    else
                        Session::set("error","Le vétérinaire n'a pas été enregistré");
                    break;
                case PERSONNE_VENDEUR:
                    $vendeurManager = new VendeurManager();
                    $vendeur = new Vendeur($donnes);
                    if ($vendeurManager->insertVendeur($vendeur))
                        Session::set("success","Le vendeur a été bien enregistré");
                    else
                        Session::set("success","Le vendeur n'a été enregistré, svp réssayer une autre fois.");
                    break;
                case PERSONNE_CLIENT:
                    $clientManager = new ClientManager();
                    $client = new Client($donnes);
                    if ($clientManager->insertClient($client))
                        Session::set("success","Le client a été bien enregistré");
                    else
                        Session::set("success","Le client n'a été enregistré, svp réssayer une autre fois.");
                    break;
                case PERSONNE_TRANSPORTEUR:
                    $transporteurManager = new TransporteurManager();
                    $transporteur = new Transporteur($donnes);
                    if ($transporteurManager->insertTransporteur($transporteur))
                        Session::set("success","Le transporteur a été bien enregistré");
                    else
                        Session::set("success","Le transporteur n'a été enregistré, svp réssayer une autre fois.");

                    break;
                default:
                    Session::set("error","Désolé, le type personne n'est pas reconnue, merci de réssayer une aure fois");
            }
        } else {
            Session::set("error","Désolé, il manque des données à inserer merci de réssayer une autre fois");
        }

        header("Location: ". (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : SROOT . "stock/ajouter_nourriture"));
    }

    public function listeAction($typePersonne = ""){

        switch ($typePersonne){
            case "veterinaires":
                $veterenaireManager = new VeterinaireManager();
                $donnes['personnes'] = $veterenaireManager->getList();
                break;
            case "vendeurs":
                $vendeurManager = new VendeurManager();
                $donnes['personnes'] = $vendeurManager->getList();
                break;
            case "transporteurs":
                $transporteurManager = new TransporteurManager();
                $donnes['personnes'] = $transporteurManager->getList();
                break;
            case "clients":
                $clientManager = new ClientManager();
                $donnes['personnes'] = $clientManager->getList();
                break;
            default:
                header("Location: ".SROOT);
        }

        $this->_view->render("pages/liste_personnes",$donnes);
    }

}