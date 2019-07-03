<?php

function dashesToCamelCase($string){
    return str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
}

function getTypeBovin($id){
    switch ($id){
        case VEAU:
            return "Veau";
            break;
        case VACHE:
            return "Vache";
            break;
        case TOUREAU:
            return "Toureau";
            break;
        default:
            return false;
    }
}

function getSexeBovin($id){
    switch ($id){
        case BOVIN_FEMELLE:
            return "Femelle";
            break;
        case BOVIN_MALE:
            return "MALE";
            break;
        default:
            return false;
    }
}

function getEtatBovin($id){
    switch ($id){
        case BON:
            return "Bon santé";
            break;
        case MALADE:
            return "Malade";
            break;
        case MORT:
            return "Mort";
            break;
        case VENDUE:
            return "Vendue";
            break;
        default:
            return false;
    }
}

function getEtatGrossesse($id){
    switch ($id){
        case ETAT_GROSSESSE_SAILLIE:
            return "Saillie";
        case ETAT_GROSSESSE_AVANCEE:
            return "Avancée";
    }
}

function getEventBovin($id){
    switch ($id){
        case EVENT_SAILLIE:
            return "Saille";
        case EVENT_AVANCE:
            return "Avancée";
        case EVENT_VELAGE:
            return "Vêlage";
        case EVENT_SEVRER:
            return "Sevrer";
        case EVENT_ACHETE:
            return "Acheté";
        case EVENT_VENDUE:
            return "Vendue";
        case EVENT_MALADE:
            return "Malade";
        case EVENT_MORT:
            return "Mort";
        case EVENT_TRAITEMENT:
            return "Traitement";
        default:
            return false;
    }
}

function getLabelNourriture($id){
    switch ($id){
        case NOURRITURE_HERBE:
            return "Herbe";
        case NOURRITURE_LAIT:
            return "Lait";
        default:
            return false;
    }
}

function getTypeTraitement($id){
    switch ($id){
        case ORDONNANCE:
            return "Ordonnance";
        case TRAITEMENT:
            return "Traitement";
        default:
            return false;
    }
}

function getFormattedDate($date){
    try {
        return (new DateTime($date))->format('D, m M Y');
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function showTopBovinsInvoice(){

}

function calculerPrixBovin($prixNourriture,$prixTraitement,$prixAchat,$poids){
    return $prixAchat + $prixTraitement + $prixNourriture + ($poids * PRIX_PAR_KG);
}


include_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'helpers.php');