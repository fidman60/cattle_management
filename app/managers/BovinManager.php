<?php

class BovinManager extends DB {

    public function getListBovinPourTraitement(){
        $bovins = [];
        $sql = "select * from bovins where id_etat=".MALADE;
        $bovinsArr = $this->query($sql)->results();
        foreach ($bovinsArr as $bovinArr){
            $bovins[] = new Bovin($bovinArr);
        }
        return $bovins;
    }

    public function getBovins($type="",$etat="",$page=""){
        $page = $page && (int)$page > 0 ? $page : 1;
        $id_etat = null;
        $id_type = null;

        $this->countBovins($etat,$type);

        switch ($etat){
            case "malade":
                $sql = "select * from bovins where id_etat=".MALADE;
                break;
            case "mort":
                $sql = "select * from bovins where id_etat=".MORT;
                break;
            case "vendue":
                $sql = "select * from bovins where id_etat=".VENDUE;
                break;
            case "bon":
                $sql = "select * from bovins where id_etat=".BON;
                break;
            case "quarantaine":
                $sql = "select * from bovins where quarantaine=1";
                break;
            case "achete":
                $sql = "select * from bovins where id_achat is not null";
                break;
            case "saillie":
                $sql = "select * from bovins where id_etat_grossesse = ".ETAT_GROSSESSE_SAILLIE;
                break;
            case "avancee":
                $sql = "select * from bovins where id_etat_grossesse = ".ETAT_GROSSESSE_AVANCEE;
                break;
            default:
                $sql = "select * from bovins where 1 = 1";
        }

        switch ($type){
            case "veau":
                $sql.=" AND id_type_bovin=".VEAU;
                break;
            case "vache":
                $sql.=" AND id_type_bovin=".VACHE;
                break;
            case "toureau":
                $sql.=" AND id_type_bovin=".TOUREAU;
                break;
        }

        $sql.= ($page > 1 ? " limit ".(($page-1)*PER_PAGE).",".PER_PAGE : " limit 0,".PER_PAGE);

        $bovinsArr = $this->query($sql)->results();
        $bovins = [];
        if ($this->count($bovinsArr)){
            $etatManager = new EtatManager();
            foreach ($bovinsArr as $bovinArr){
                $bovin = new Bovin($bovinArr);
                $line = [];
                $line['bovin'] = $bovin;
                $line['etat'] = $etatManager->getEtat($bovin->getIdEtat());
                $line['bovinPere'] = $bovin->getIdBovinPere() !== null ? $this->getBovin($bovin->getIdBovinPere()) : null;
                $line['bovinMere'] = $bovin->getIdBovinMere() !== null ? $this->getBovin($bovin->getIdBovinMere()) : null;
                $line['type'] = getTypeBovin($bovin->getIdTypeBovin());
                $line['sexe'] = getSexeBovin($bovin->getIdSexe());
                $bovins[] = $line;
            }
        }

        return $bovins;
    }

    public function getBovin($id){
        $id = (int)$id;
        if ($this->bovinExists($id)){
            $sql = "select * from bovins where id=?";
            return new Bovin($this->query($sql,[$id])->first());
        }
        return false;
    }

    public function getBovinDetails($id){
        $id = (int)$id;
        if ($this->bovinExists($id)){
            $bovin_details = [];
            $poidsBovinManager = new PoidsBovinManager();
            $evenementManager = new EvenementManager();
            $nourritureManager = new NourritureManager();
            $traitementManager = new TraitementManager();
            $laitProduitManager = new LaitProduitManager();

            //get bovin
            $sql = "select * from bovins where id=?";
            $bovin_details['bovin'] = new Bovin($this->query($sql,array($id))->first());

            //get fils
            $bovin_details['fils'] = $this->getFils($id);

            //get poids
            $bovin_details['poids'] = $poidsBovinManager->getPoidsBovin($id);

            //get events
            $bovin_details['events'] = $evenementManager->getEventsBovin($id);

            //get nourriture consomation
            $bovin_details['nourriture'] = $nourritureManager->getListNourritureBovin($id);

            //get traitements
            $bovin_details['traitements'] = $traitementManager->getTraitmentsBovin($id);

            //get lait produit
            $bovin_details['lait_produit'] = $laitProduitManager->getLaitProduitBovin($id);

            //get last poids
            $bovin_details['lastPoids'] = $poidsBovinManager->getLastPoidsBovin($id);

            return $bovin_details;
        }
        return false;
    }

    public function getBovinsByType($idType){
        $idType = (int)$idType;
        $sql = "select * from bovins where id_type_bovin=?";
        $bovins = [];
        $bovinsArr = $this->query($sql,array($idType))->results();
        foreach ($bovinsArr as $bovinArr){
            $bovins[] = new Bovin($bovinArr);
        }
        return $bovins;
    }

    public function getFils($id){
        $sql = "SELECT * FROM bovins WHERE id_bovin_mere = ? or id_bovin_pere = ?";
        $fils = [];
        $filsArr = $this->query($sql,array($id,$id))->results();
        if (count($filsArr) > 0){
            foreach ($filsArr as $filsRow){
                $fils[] = new Bovin($filsRow);
            }
        }
        return $fils;
    }

    public function bovinExists($id){
        $id = (int)$id;
        $sql = "SELECT COUNT(*) as nbr FROM `bovins` WHERE id = ?";
        return (bool)$this->query($sql,array($id))->first()['nbr'];
    }

    public function getTopBovinsList($nbr = 0){
        if(!$nbr) $nbr = 10;

        $sql = "SELECT *
                FROM bovins bovs
                WHERE id IN (
                    SELECT id
                    FROM (
                        SELECT id,(
                            SELECT poids
                            FROM poids_bovin 
                            WHERE id_bovin = b.id 
                            ORDER BY date_poids DESC 
                            LIMIT 0,1) last_poids
                        FROM bovins b
                    ) top_bovins
                    WHERE last_poids IS NOT null
                    ORDER BY last_poids DESC
                ) AND id_vente IS NULL AND id_etat = 1 AND quarantaine = 0
                LIMIT 0,?";

        $bovinsArr = $this->query($sql,array($nbr))->results();
        $bovins = [];
        $poidsBovinManager = new PoidsBovinManager();
        foreach ($bovinsArr as $bovinRow){
            $row = [];
            $row['bovin'] = new Bovin($bovinRow);
            $row['lastPoids'] = $poidsBovinManager->getLastPoidsBovin($row['bovin']->getId());
            $bovins[] = $row;
        }

        return $bovins;
    }

    public function countBovins($type,$etat){
        switch ($etat){
            case "malade":
                $sql = "select count(*) nbr from bovins where id_etat=".MALADE;
                break;
            case "mort":
                $sql = "select count(*) nbr from bovins where id_etat=".MORT;
                break;
            case "vendue":
                $sql = "select count(*) nbr from bovins where id_etat=".VENDUE;
                break;
            case "bon":
                $sql = "select count(*) nbr from bovins where id_etat=".BON;
                break;
            case "quarantaine":
                $sql = "select count(*) nbr from bovins where quarantaine=1";
                break;
            case "achete":
                $sql = "select count(*) nbr from bovins where id_achat is not null";
                break;
            default:
                $sql = "select count(*) nbr from bovins where 1 = 1";
        }

        switch ($type){
            case "veau":
                $sql.=" AND id_type_bovin=".VEAU;
                break;
            case "vache":
                $sql.=" AND id_type_bovin=".VACHE;
                break;
            case "toureau":
                $sql.=" AND id_type_bovin=".TOUREAU;
                break;
        }

        return $this->query($sql)->first()['nbr'];
    }

    public function getBovinsToSell(){
        $ventes = [];
        $sql = "select * 
                from bovins 
                where (quarantaine is null OR quarantaine = 0) AND id_vente is null AND id_etat = ".BON;
        $ventesArr = $this->query($sql)->results();
        foreach ($ventesArr as $venteArr){
            $ventes[] = new Bovin($venteArr);
        }
        return $ventes;
    }

    public function updateBovin(Bovin $bovin){
        if ($bovin === null) return false;
        $rep = $this->update('bovins',$bovin->getId(),array(
            "poids_initiale" => $bovin->getPoidsInitiale(),
            "description" => $bovin->getDescription(),
            "date_naissance" => $bovin->getDateNaissance(),
            "quarantaine" => $bovin->getQuarantaine(),
            "prix_achat" => $bovin->getPrixAchat(),
            "id_achat" => $bovin->getIdAchat(),
            "id_vente" => $bovin->getIdVente(),
            "id_sexe"=> $bovin->getIdSexe(),
            "id_etat"=> $bovin->getIdEtat(),
            "id_bovin_mere"=> $bovin->getIdBovinMere(),
            "id_bovin_pere"=> $bovin->getIdBovinPere(),
            "id_etat_grossesse"=> $bovin->getIdEtatGrossesse(),
            "id_type_bovin"=> $bovin->getIdTypeBovin()
        ));
        return $rep;
    }

    public function insertBovin(Bovin $bovin){
        if ($bovin === null) return false;
        return $this->insert('bovins',array(
            "poids_initiale" => $bovin->getPoidsInitiale(),
            "description" => $bovin->getDescription(),
            "date_naissance" => $bovin->getDateNaissance(),
            "quarantaine" => $bovin->getQuarantaine(),
            "prix_achat" => $bovin->getPrixAchat(),
            "id_achat" => $bovin->getIdAchat(),
            "id_vente" => $bovin->getIdVente(),
            "id_sexe"=> $bovin->getIdSexe(),
            "id_etat"=> $bovin->getIdEtat(),
            "id_bovin_mere"=> $bovin->getIdBovinMere(),
            "id_bovin_pere"=> $bovin->getIdBovinPere(),
            "id_etat_grossesse"=> $bovin->getIdEtatGrossesse(),
            "id_type_bovin"=> $bovin->getIdTypeBovin()
        ));
    }

    public function deleteBovin($id){
        $id = (int)$id;
        return $this->delete('bovins',$id);
    }

}