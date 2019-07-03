<?php $this->start('body'); ?>
    <div class="page-wrapper chiller-theme toggled">
        <?php include_once ROOT . DS . "includes" . DS . "nav.php" ?>
        <main class="page-content">
            <div class="container-fluid">
                <div class="container">
                    <div>
                        <div style="margin: auto" class="w-75">
                            <?php include_once ROOT . DS . "includes" . DS . "error_section.php"; ?>
                        </div>
                        <div id="form_naissance" class="card w-75 ">
                            <div class="card-header bg-info text-white"><i class="fas fa-cow"></i> Nouveau bovin</div>
                            <div class="card-block" style="padding-top: 30px;padding-bottom: 30px">
                                <form style="width: 90%;margin: auto;" class="well form-horizontal" method="post" action="<?= SROOT ?>bovins/achat_bovin_post">
                                    <div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Achat</label>
                                            <div class="input-group">
                                                <select name="idAchat" class="form-control">
                                                    <option>Sélectionner</option>
                                                    <?php
                                                    foreach ($donnes['achats'] as $achat){
                                                    ?>
                                                        <option value="<?= $achat->getId() ?>"><?= $achat->getId() ?>: <?= getFormattedDate($achat->getDateAchat()) ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Prix achat (DH)</label>
                                            <div class="input-group">
                                                <input name="prixAchat" placeholder="Ex: 2324.43" class="form-control" required="true" value="" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Date naissance</label>
                                            <div class="input-group">
                                                <input name="dateNaissance" placeholder="Date naissance" class="form-control" required="true" value="" type="date">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Poids initial</label>
                                            <div class="input-group">
                                                <input name="poidsInitiale" placeholder="Poids initial" class="form-control" required="true" value="" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Sexe</label>
                                            <div class="input-group">
                                                <select name="idSexe" class="form-control">
                                                    <option value="<?= BOVIN_FEMELLE ?>">Femelle</option>
                                                    <option value="<?= BOVIN_MALE ?>">Male</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Type bovin</label>
                                            <div class="input-group">
                                                <select name="idTypeBovin" class="form-control">
                                                    <option value="<?= VEAU ?>">Veau</option>
                                                    <option value="<?= VACHE ?>">Vache</option>
                                                    <option value="<?= TOUREAU ?>">Toureau</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Etat</label>
                                            <div class="input-group">
                                                <select name="idEtat" class="form-control">
                                                    <option value="<?= BON ?>">Bon</option>
                                                    <option value="<?= MALADE ?>">Malade</option>
                                                    <option value="<?= MORT ?>">meurt</option>
                                                    <option value="<?= VENDUE ?>">vendue</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Mère (Optionel)</label>
                                            <div class="input-group">
                                                <select name="idBovinMere" class="form-control">
                                                    <option selected value="">Non</option>
                                                    <?php
                                                    $vaches = isset($donnes['vaches']) && is_array($donnes['vaches']) ? $donnes['vaches'] : [];
                                                    foreach ($vaches as $vache){
                                                        ?>
                                                        <option value="<?= $vache->getId() ?>" ><?= $vache->getId() ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Père (Optionel)</label>
                                            <div class="input-group">
                                                <select name="idBovinPere" class="form-control">
                                                    <option value="">Non</option>
                                                    <?php
                                                    $toureaux = isset($donnes['toureaux']) && is_array($donnes['toureaux']) ? $donnes['toureaux'] : [];
                                                    foreach ($toureaux as $toureau){
                                                        ?>
                                                        <option value="<?= $toureau->getId() ?>" ><?= $toureau->getId() ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Description (Optionel)</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                                                <textarea class="form-control" name="description"></textarea>
                                            </div>
                                        </div>
                                        <button class="btn btn-info float-right">Ajouter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php $this->end(); ?>