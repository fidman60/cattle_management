<?php $this->start('body'); ?>
    <div class="page-wrapper chiller-theme toggled">
        <?php include_once ROOT . DS . "includes" . DS . "nav.php" ?>
        <main class="page-content">
            <div class="container-fluid">
                <div class="container">
                    <div class="row text-center" style="margin-bottom: 30px">
                        <div class="col-sm-10 text-left">
                            <span class="invisible">Logo</span>
                            <form method="get" id="filtre-recherche">
                                <span>Filtrer par: </span>
                                <select onchange="location = this.value;" style="padding-right: 20px;" class="form-control">
                                    <option value="<?= SROOT ?>" <?= $donnes['action'] == "all" ? "selected" : "" ?> >Tous</option>
                                    <option value="<?= SROOT ?>bovins/get/<?= $donnes['type'] ?>/bon" <?= $donnes['action'] == "bon" ? "selected" : "" ?>>Bon</option>
                                    <option value="<?= SROOT ?>bovins/get/<?= $donnes['type'] ?>/malade" <?= $donnes['action'] == "malade" ? "selected" : "" ?>>Malade</option>
                                    <option value="<?= SROOT ?>bovins/get/<?= $donnes['type'] ?>/mort" <?= $donnes['action'] == "mort" ? "selected" : "" ?>>Meurt</option>
                                    <option value="<?= SROOT ?>bovins/get/<?= $donnes['type'] ?>/achete" <?= $donnes['action'] == "achete" ? "selected" : "" ?>>Acheté</option>
                                    <option value="<?= SROOT ?>bovins/get/<?= $donnes['type'] ?>/vendue" <?= $donnes['action'] == "vendue" ? "selected" : "" ?>>Vendue</option>
                                    <option value="<?= SROOT ?>bovins/get/<?= $donnes['type'] ?>/quarantaine" <?= $donnes['action'] == "quarantaine" ? "selected" : "" ?>>Quarantaine</option>
                                    <option value="<?= SROOT ?>bovins/get/<?= $donnes['type'] ?>/saillie" <?= $donnes['action'] == "saillie" ? "selected" : "" ?>>Saillie</option>
                                    <option value="<?= SROOT ?>bovins/get/<?= $donnes['type'] ?>/avancee" <?= $donnes['action'] == "avancee" ? "selected" : "" ?>>Avancée</option>
                                </select>
                                <a href="#" class="btn btn-primary">Filtrer</a>
                            </form>
                        </div>
                        <div style="font-size: 12px;" class="col-sm-1">
                            <img title="Stock resté du lait" style="width: 50px;height: 50px;" src="<?= SROOT ?>public/images/milk.png">
                            <span style="font-size:11px;font-weight: bold"><?= $donnes['stockLait'] ?> L</span>
                        </div>
                        <div style="font-size: 12px;" class="col-sm-1">
                            <img title="Stock resté du l'herb" style="width: 50px;height: 50px;" src="<?= SROOT ?>public/images/herb.png">
                            <span style="font-size:11px;font-weight: bold"><?= $donnes['stockHerbe'] ?> Kg</span>
                        </div>
                    </div>
                    <?php include_once ROOT . DS . "includes" . DS . "error_section.php" ?>
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Gestion des <b>Bovins</b></h2>
                                </div>
                                <div class="col-sm-6">
                                    <a href="<?= SROOT ?>bovins/nouvelle_naissance" class="btn btn-success"><i class="fas fa-plus-circle"></i> <span>Nouvelle naissance</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Bovin</th>
                                    <th>Date naissance</th>
                                    <th>Etat</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($donnes['bovins_data'] as $line){
                                $bovin = $line['bovin'] ? $line['bovin'] : new Bovin([]);
                                $etat = $line['etat'] ? $line['etat'] : new Etat([]);
                                $type = $line['type'] ? $line['type'] : new TypeBovin([]);
                            ?>
                                <tr>
                                    <td><?= $bovin->getId() ?></td>
                                    <td><?= $type ?></td>
                                    <td><?= (new DateTime($bovin->getDateNaissance()))->format('D, m M Y') ?></td>
                                    <td><?= $etat->getLabel() ?></td>
                                    <td style="width: 220px">
                                        <a href="<?= SROOT ?>bovins/details/<?= $bovin->getId() ?>" class="edit"><i class="far fa-eye" title="Voir details"></i></a>
                                        <a href="#poidsModel<?= $i ?>" class="edit" data-toggle="modal"><i class="fas fa-weight" data-toggle="tooltip" title="Ajouter un poids"></i></a>
                                        <a href="#eventModel<?= $i ?>" class="edit" data-toggle="modal"><i class="far fa-calendar" data-toggle="tooltip" title="Ajouter un événement"></i></a>
                                        <a href="#productionModel<?= $i ?>" class="edit" data-toggle="modal"><i class="fas fa-folder-plus" data-toggle="tooltip" title="Nouvelle production du lait"></i></a>
                                        <a href="#consomationModel<?= $i ?>" class="edit" data-toggle="modal"><i class="fas fa-cookie-bite" data-toggle="tooltip" title="Nouvelle consomation"></i></a>
                                        <a href="#supprimerBovinModal<?= $i ?>" class="delete" data-toggle="modal"><i class="fas fa-trash-alt fa-xs" data-toggle="tooltip" title="Supprimer"></i></a>
                                    </td>
                                </tr>
                                <!-- Poids Modal HTML -->
                                <div id="poidsModel<?= $i ?>" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post" action="<?= SROOT ?>bovins/ajouter/poids">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Bovin <?= $bovin->getId() ?>: Ajouter un poids </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Poids</label>
                                                        <input type="text" class="form-control" name="poids" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Date appris</label>
                                                        <input type="date" class="form-control" name="datePoids" required>
                                                    </div>
                                                    <input type="hidden" name="idBovin" value="<?= $bovin->getId() ?>" />
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                                    <input type="submit" class="btn btn-info" value="Ajouter">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Event Modal HTML -->
                                <div id="eventModel<?= $i ?>" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post" action="<?= SROOT ?>bovins/ajouter/event">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Bovin <?= $bovin->getId() ?>: Ajouter un événement</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Evénement</label>
                                                        <select class="form-control" name="idEvent">
                                                            <option value="<?= EVENT_SAILLIE ?>">Saillie</option>
                                                            <option value="<?= EVENT_AVANCE ?>">Avancé</option>
                                                            <option value="<?= EVENT_VELAGE ?>">Vêlage</option>
                                                            <option value="<?= EVENT_SEVRER ?>">Sevrer</option>
                                                            <option value="<?= EVENT_MALADE ?>">Malade</option>
                                                            <option value="<?= EVENT_MORT ?>">Mort</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Date appris</label>
                                                        <input type="date" name="dateEvent" class="form-control" required>
                                                    </div>
                                                    <input type="hidden" name="idBovin" value="<?= $bovin->getId() ?>" >
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                                    <input type="submit" class="btn btn-info" value="Ajouter">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Event Modal HTML -->
                                <div id="productionModel<?= $i ?>" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post" action="<?= SROOT ?>bovins/ajouter/production_lait">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Bovin <?= $bovin->getId() ?>: Nouvelle production du lait</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Date</label>
                                                        <input type="date" name="dateProduction" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Quantité/L</label>
                                                        <input type="text" class="form-control" name="quantiteLait" required>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="idBovin" value="<?= $bovin->getId() ?>">
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                                    <input type="submit" class="btn btn-info" value="Ajouter">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Consomation Modal HTML -->
                                <div id="consomationModel<?= $i ?>" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post" action="<?= SROOT ?>bovins/ajouter/consomation">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Bovin <?= $bovin->getId() ?>: Nouvelle consomation</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Nourriture</label>
                                                        <select class="form-control" name="idTypeNourriture">
                                                            <?php
                                                            foreach ($donnes['types_nourriture'] as $type_nourriture){
                                                            ?>
                                                                <option value="<?= $type_nourriture->getId() ?>"><?= $type_nourriture->getLabel() ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Date début</label>
                                                        <input type="date" class="form-control" name="dateDebut" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Période/jour</label>
                                                        <input type="text" class="form-control" name="nbrJours" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Quantité (KG)</label>
                                                        <input type="text" class="form-control" name="quantite" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Prix (DH)</label>
                                                        <input type="text" class="form-control" name="prix" required />
                                                    </div>
                                                    <input type="hidden" name="idBovin" value="<?= $bovin->getId() ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                                    <input type="submit" class="btn btn-info" value="Ajouter">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Supprimer Modal HTML -->
                                <div id="supprimerBovinModal<?= $i ?>" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post" action="<?= SROOT ?>bovins/supprimer">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Bovin <?= $bovin->getId() ?>: Supprimer </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Tu es sure de vouloire supprimer le bovin: <?= $bovin->getId() ?> ?</p>
                                                </div>
                                                <input type="hidden" name="id" value="<?= $bovin->getId() ?>">
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                                    <input type="submit" class="btn btn-danger" value="Supprimer">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php $i++;} ?>
                            </tbody>
                        </table>
                        <div class="clearfix">
                            <?php
                            $type = $donnes['type'];
                            $action = $donnes['action'];
                            $page = (int)$donnes['page'];
                            if($page == 1)
                                $disabled_prev = "disabled";
                            else
                                $disabled_prev = "";
                            $nbrPages = (int)ceil($donnes['countBovins'] / PER_PAGE);
                            if($page == $nbrPages)
                                $disabled_next = "disabled";
                            else
                                $disabled_next = "";
                            $active = "";
                            ?>
                            <ul class="pagination">
                                <li class="page-item <?= $disabled_prev ?>"><a href="<?= SROOT ?>bovins/get/<?= $type."/".$action."/".($page - 1) ?>">Previous</a></li>
                                <?php
                                for ($i=1;$i<=$nbrPages;$i++){
                                    if ($i == $page) $active = "active";
                                ?>
                                    <li class="page-item <?= $active ?>"><a href="<?= SROOT ?>bovins/get/<?= $type."/".$action."/".$i ?>" class="page-link"><?= $i ?></a></li>
                                <?php
                                    $active = "";
                                }
                                ?>
                                <li class="page-item <?= $disabled_next ?>"><a href="<?= SROOT ?>bovins/get/<?= $type."/".$action."/".($page + 1) ?>">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php $this->end(); ?>