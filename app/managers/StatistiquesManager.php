<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 12/03/2019
 * Time: 23:27
 */

class StatistiquesManager extends DB {

    public function countAll(){
        $sql = "select count(*) nbr from bovins";
        return (int)$this->query($sql)->first()['nbr'];
    }

    public function countVeaux(){
        $sql = "select count(*) nbr from bovins where id_type_bovin = ".VEAU;
        return (int)$this->query($sql)->first()['nbr'];
    }

    public function countVaches(){
        $sql = "select count(*) nbr from bovins where id_type_bovin = ".VACHE;
        return (int)$this->query($sql)->first()['nbr'];
    }

    public function countToureaux(){
        $sql = "select count(*) nbr from bovins where id_type_bovin = ".TOUREAU;
        return (int)$this->query($sql)->first()['nbr'];
    }

    public function stockLait(){
        $sql = "select sum(quantite_reste) total from nourriture_stock where id_type_nourriture=".NOURRITURE_LAIT;
        return round($this->query($sql)->first()['total'],2);
    }

    public function stockHerbe(){
        $sql = "select sum(quantite_reste) total from nourriture_stock where id_type_nourriture=".NOURRITURE_HERBE;
        return round($this->query($sql)->first()['total'],2);
    }

    public function countBovinsMalade(){
        $sql = "select count(*) nbr from bovins where id_etat=".MALADE;
        return (int)$this->query($sql)->first()['nbr'];
    }

    public function countBovinsMort(){
        $sql = "select count(*) nbr from bovins where id_etat=".MORT;
        return (int)$this->query($sql)->first()['nbr'];
    }

    public function countBovinsBon(){
        $sql = "select count(*) nbr from bovins where id_etat=".BON;
        return (int)$this->query($sql)->first()['nbr'];
    }

    public function countBovinsVendues(){
        $sql = "select count(*) nbr from bovins where id_vente is not null";
        return (int)$this->query($sql)->first()['nbr'];
    }

    public function countBovinsAchetees(){
        $sql = "select count(*) nbr from bovins where id_achat is not null";
        return (int)$this->query($sql)->first()['nbr'];
    }

    public function countBovinsProduit(){
        $sql = "select count(*) nbr from bovins where id_achat is null";
        return (int)$this->query($sql)->first()['nbr'];
    }

    public function countVachesSaillie(){
        $sql = "select count(*) nbr from bovins where id_etat_grossesse = ".ETAT_GROSSESSE_SAILLIE;
        return (int)$this->query($sql)->first()['nbr'];
    }

    public function countVachesAvancee(){
        $sql = "select count(*) nbr from bovins where id_etat_grossesse = ".ETAT_GROSSESSE_AVANCEE;
        return (int)$this->query($sql)->first()['nbr'];
    }

    public function countBovinsQuarantaine(){
        $sql = "select count(*) nbr from bovins where quarantaine = 1";
        return (int)$this->query($sql)->first()['nbr'];
    }

    public function totalQuantiteLaitProduitBovin($idBovin){
        $idBovin = (int)$idBovin;
        $sql = "select sum(quantite_lait) total from lait_produit where id_bovin = ?";
        return round($this->query($sql,[$idBovin])->first()['total'],2);
    }

    public function totalQuantieBovinsProduitBovin($idBovin){
        $idBovin = (int)$idBovin;
        $sql = "select count(*) nbr from bovins where id_bovin_mere = ? or id_bovin_pere = ?";
        return (int)$this->query($sql,[$idBovin,$idBovin])->first()['nbr'];
    }

    public function totalPrixTraitementsBovin($idBovin){
        $idBovin = (int)$idBovin;
        $sql = "select sum(coalesce(prix_traitement,0) + coalesce(prix_transporteur,0)) total from traitements where id_bovin = ?";
        return round($this->query($sql,[$idBovin])->first()['total'],2);
    }

    public function totalPrixNourritureBovin($idBovin){
        $idBovin = (int)$idBovin;
        $sql = "select sum(coalesce(prix,0)) total from nourriture where id_bovin = ?";
        return round($this->query($sql,[$idBovin])->first()['total'],2);
    }

    public function totalPrixAchatBovin($idBovin){
        $idBovin = (int)$idBovin;
        $sql = "select sum(prix_transporteur+(
                  SELECT COALESCE(prix_achat,0) 
                  FROM bovins 
                  WHERE id = ?)) total 
                FROM achats 
                WHERE id = (
                  SELECT id_achat 
                  FROM bovins 
                  WHERE id = ?);";
        return round($this->query($sql,[$idBovin,$idBovin])->first()['total'],2);
    }

}