<?php $this->start('body'); ?>
    <div class="page-wrapper chiller-theme toggled">
        <?php include_once ROOT . DS . "includes" . DS . "nav.php" ?>
        <main class="page-content">
            <div class="container-fluid">
                <div class="container">

                    <div class="col-lg-12 col-md-12">
                        <ul id="tab" class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#General" class="text-success"><i class="fa fa-indent"></i> Général</a></li>
                            <li><a data-toggle="tab" href="#Fils" class="text-success"><i class="fal fa-cow"></i> Fils</a></li>
                            <li><a data-toggle="tab" href="#Poids" class="text-success"><i class="fa fa-home"></i> Poids</a></li>
                            <li><a data-toggle="tab" href="#Evenements" class="text-success"><i class="fas fa-calendar-week"></i> Evénements</a></li>
                            <li><a data-toggle="tab" href="#Nourriture" class="text-success"><i class="fas fa-cookie-bite"></i> Nourriture consomée</a></li>
                            <li><a data-toggle="tab" href="#Veterinaire" class="text-success"><i class="fas fa-syringe"></i> Vétérinaire</a></li>
                            <li><a data-toggle="tab" href="#LaitProduit" class="text-success"><i class="fas fa-folder-plus"></i> Lait Produit</a></li>
                            <li><a data-toggle="tab" href="#statistiquesBovin" class="text-success"><i class="far fa-chart-bar"></i> Statistiques de bovin</a></li>
                        </ul>

                        <?php
                        $bovin = isset($donnes['bovin']) && $donnes['bovin'] !== null ? $donnes['bovin'] : new Bovin([]);
                        $fils = isset($donnes['fils']) && is_array($donnes['fils']) ? $donnes['fils'] : [];
                        $poids = isset($donnes['poids']) && is_array($donnes['poids']) ? $donnes['poids'] : [];
                        $events = isset($donnes['events']) && is_array($donnes['events']) ? $donnes['events'] : [];
                        $listNourriture = isset($donnes['nourriture']) && is_array($donnes['nourriture']) ? $donnes['nourriture'] : [];
                        $traitements = isset($donnes['traitements']) && is_array($donnes['traitements']) ? $donnes['traitements'] : [];
                        $listLaitProduit = isset($donnes['lait_produit']) && is_array($donnes['lait_produit']) ? $donnes['lait_produit'] : [];
                        $statistiques = $donnes['statistiques'];
                        $lastPoids = $donnes['lastPoids'];
                        ?>
                        <div class="tab-content">
                            <div id="General" class="tab-pane fade show active">

                                <div class="table-responsive panel">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="text-success"><i class="fas fa-cow"></i> ID</td>
                                                <td><?= $bovin->getId()  ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success"><i class="fas fa-weight"></i> Poids initiale</td>
                                                <td><?= $bovin->getPoidsInitiale() ?>kg</td>
                                            </tr>
                                            <tr>
                                                <td class="text-success"><i class="far fa-calendar-alt"></i> Date naissance</td>
                                                <td><?= getFormattedDate($bovin->getDateNaissance()) ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success"><i class="fas fa-stopwatch"></i> Quarantaine</td>
                                                <td><?= $bovin->getQuarantaine() ? "Oui" : "Non" ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success"><i class="fas fa-mars"></i> Sexe</td>
                                                <td><?= getSexeBovin($bovin->getIdSexe()) ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success"><i class="far fa-genderless"></i> Type</td>
                                                <td><?= getTypeBovin($bovin->getIdTypeBovin()) ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success"><i class="fas fa-exclamation"></i> Etat actuelle</td>
                                                <td><?= getEtatBovin($bovin->getIdEtat()) ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success"><i class="fas fa-exclamation"></i> Etat grossesse</td>
                                                <td><?= $bovin->getIdEtatGrossesse() ? getEtatGrossesse($bovin->getIdEtatGrossesse()) : "/" ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success"><i class="fal fa-cow"></i> Mère</td>
                                                <td><a href="<?= SROOT ?>bovins/details/<?= $bovin->getIdBovinMere() ?>"><?= $bovin->getIdBovinMere() ? $bovin->getIdBovinMere():"/" ?></a></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success"><i class="fas fa-cow"></i> Père</td>
                                                <td><a href="<?= SROOT ?>bovins/details/<?= $bovin->getIdBovinPere() ?>"><?= $bovin->getIdBovinPere() ? $bovin->getIdBovinPere():"/" ?></a></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success"><i class="fas fa-comment"></i></i> Description</td>
                                                <td><?= $bovin->getDescription() ? $bovin->getDescription():"/" ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div id="Poids" class="tab-pane fade">
                                <div class="table-responsive panel">
                                    <table class="table">
                                        <tbody>
                                        <?php
                                        foreach ($poids as $poid){
                                        ?>
                                            <tr>
                                                <td class="text-success"><i class="fas fa-calendar-day"></i> <?= getFormattedDate($poid->getDatePoids()) ?></td>
                                                <td><a href="#"><?= $poid->getPoids() ?>kg</a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div id="Evenements" class="tab-pane fade">
                                <div class="table-responsive panel">
                                    <table class="table">
                                        <tbody>
                                            <?php
                                            foreach ($events as $event){
                                            ?>
                                                <tr>
                                                    <td class="text-success"><i class="fas fa-calendar-day"></i> <?= getFormattedDate($event->getDateEvent()) ?></td>
                                                    <td><?= getEventBovin($event->getIdEvent()) ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div id="Fils" class="tab-pane fade">
                                <div class="table-responsive panel">
                                    <table class="table">
                                        <tbody>
                                        <?php
                                        foreach ($fils as $filsBovin) {
                                        ?>
                                            <tr>
                                                <td class="text-success"><i class="fas fa-cow"></i> <?= $filsBovin->getId() ?></td>
                                                <td><a href="<?= SROOT ?>bovins/details/<?= $filsBovin->getId() ?>">Voir les details</a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div id="Nourriture" class="tab-pane fade">
                                <div class="table-responsive panel">
                                    <table class="table">
                                        <tbody>

                                            <tr>
                                                <td class="text-success">Nourriture</td>
                                                <td class="text-success">Date debut</td>
                                                <td class="text-success">Période</td>
                                                <td class="text-success">Quantité</td>
                                                <td class="text-success">Prix</td>
                                            </tr>
                                            <?php
                                            foreach ($listNourriture as $nourritureRow){
                                                $nourriture = $nourritureRow['nourriture'] ? $nourritureRow['nourriture'] : new Nourriture([]);
                                                $nourritureStock = $nourritureRow['nourritureStock'] ? $nourritureRow['nourritureStock'] : new NourritureStock([]);
                                            ?>
                                            <tr>
                                                <td><?= getLabelNourriture($nourritureStock->getIdTypeNourriture()) ?></td>
                                                <td><?= getFormattedDate($nourriture->getDateDebut()) ?></td>
                                                <td><?= $nourriture->getNbrJours() ?> Jours</td>
                                                <td><?= $nourriture->getQuantite() ?> KG</td>
                                                <td><?= $nourriture->getPrix() ?> DH</td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div id="Veterinaire" class="tab-pane fade">
                                <div class="table-responsive panel">
                                    <table class="table">
                                        <tbody>

                                            <tr>
                                                <td class="text-success">Date</td>
                                                <td class="text-success">Médicament</td>
                                                <td class="text-success">Dose/ml</td>
                                                <td class="text-success">Prix traitement</td>
                                                <td class="text-success">Prix transporteur</td>
                                                <td class="text-success">Vétérinaire</td>
                                                <td class="text-success">Transporteur</td>
                                                <td class="text-success">Type</td>
                                                <td class="text-success">Description</td>
                                            </tr>

                                            <?php
                                            foreach ($traitements as $traitement){
                                                $traitementObj = $traitement['traitement'] ? $traitement['traitement'] : new Traitement([]);
                                                $transporteur = $traitement['transporteur'] ? $traitement['transporteur'] : new Transporteur([]);
                                                $veterinaire = $traitement['veterinaire'] ? $traitement['veterinaire'] : new Veterinaire([]);
                                                $medicament = $traitement['medicament'] ? $traitement['medicament'] : new Medicament([]);
                                            ?>
                                                <tr>
                                                    <td><?= getFormattedDate($traitementObj->getDateTraitement()) ?></td>
                                                    <td><?= $medicament->getNom() ?></td>
                                                    <td><?= $traitementObj->getDoseMl() ?> ML</td>
                                                    <td><?= $traitementObj->getPrixTraitement() ?>dh</td>
                                                    <td><?= $traitementObj->getPrixTransporteur() ?>dh</td>
                                                    <td><a href="#"><?= $veterinaire->getNom() . " " . $veterinaire->getPrenom() ?></a></td>
                                                    <td><a href="#"><?= $transporteur->getNom() . " " . $transporteur->getPrenom() ?></a></td>
                                                    <td><?= getTypeTraitement($traitementObj->getIdTypeTraitement()) ?></td>
                                                    <td><?= $traitementObj->getDescription() ? $traitementObj->getDescription() : "/" ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- pour la vache -->
                            <div id="LaitProduit" class="tab-pane fade">
                                <div class="table-responsive panel">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="text-success">ID</td>
                                                <td class="text-success">Quantité/L</td>
                                                <td class="text-success">Date</td>
                                            </tr>
                                            <?php
                                            foreach ($listLaitProduit as $laitProduit){
                                            ?>
                                                <tr>
                                                    <td><?= $laitProduit->getId() ?></td>
                                                    <td><?= $laitProduit->getQuantiteLait() ?>L</td>
                                                    <td><?= getFormattedDate($laitProduit->getDateProduction()) ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- statistiques -->
                            <div id="statistiquesBovin" class="tab-pane fade">
                                <div class="table-responsive panel">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="text-success">Total quantitée du lait produit</td>
                                                <td><?= $bovin->getIdTypeBovin() == VACHE ? $statistiques['totalQuantiteLaitProduitBovin'].' L' : "/" ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Total quantitée des bovins produit</td>
                                                <td><?= $bovin->getIdTypeBovin() == VACHE ? $statistiques['totalQuantieBovinsProduitBovin'] : "/" ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Total prix achat et transport</td>
                                                <td><?= $bovin->getIdAchat() ? $statistiques['totalPrixAchatBovin']." DH" : '/'?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Total prix des traitements et transport</td>
                                                <td><?= $statistiques['totalPrixTraitementsBovin'] ?> DH</td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Total prix de nourriture consomé</td>
                                                <td><?= $statistiques['totalPrixNourritureBovin'] ?> DH</td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Dernier poids</td>
                                                <td><?= $lastPoids->getPoids() ?> KG</td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Prix de vente conseillé</td>
                                                <td><?= $bovin->getIdEtat() == MORT || $bovin->getIdEtat() == VENDUE ? "/" : (calculerPrixBovin($statistiques['totalPrixNourritureBovin'],$statistiques['totalPrixTraitementsBovin'],$statistiques['totalPrixAchatBovin'],$lastPoids->getPoids())) . " DH" ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>


                </div>

            </div>
        </main>
    </div>
<?php $this->end(); ?>