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
                            <div class="card-header bg-info text-white"><i class="fas fa-syringe"></i> Nouveau traitement</div>
                            <div class="card-block" style="padding-top: 30px;padding-bottom: 30px">
                                <div>
                                    <form style="width: 90%;margin: auto;" class="well form-horizontal" method="post" action="<?= SROOT ?>traitements/ajouter_post">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Type traitement</label>
                                            <div class="input-group">
                                                <select name="idTypeTraitement" class="form-control">
                                                    <option value="<?= TRAITEMENT ?>">Traitement</option>
                                                    <option value="<?= ORDONNANCE ?>">Ordonnance</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Date traitement</label>
                                            <div class="input-group">
                                                <input name="dateTraitement" placeholder="Date traitement" class="form-control" required="true" type="date">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Prix traitement (DH)</label>
                                            <div class="input-group">
                                                <input name="prixTraitement" placeholder="Ex: 332.32" class="form-control" required="true" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Dose/ML (Optionel)</label>
                                            <div class="input-group">
                                                <input name="doseMl" placeholder="Ex: 12.32" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Bovin (Malade)</label>
                                            <div class="input-group">
                                                <select name="idBovin" class="form-control">
                                                    <?php
                                                    foreach ($donnes['bovins'] as $bovin){
                                                        ?>
                                                        <option value="<?= $bovin->getId() ?>"><?= $bovin->getId() ?>: <?= getTypeBovin($bovin->getIdTypeBovin()) ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Vétérinaire</label>
                                            <div class="input-group">
                                                <select name="idVeterinaire" class="form-control">
                                                    <?php
                                                    foreach ($donnes['veterinaires'] as $veterinaire){
                                                    ?>
                                                        <option value="<?= $veterinaire->getId() ?>"><?= $veterinaire->getId() ?>: <?= $veterinaire->getCin() ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Médicament (Optionel)</label>
                                            <div class="input-group">
                                                <select name="idMedicament" class="form-control">
                                                    <option value="">Séléctionner</option>
                                                    <?php
                                                    foreach ($donnes['medicaments'] as $medicament){
                                                    ?>
                                                        <option value="<?= $medicament->getId() ?>"><?= $medicament->getNom() ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Transporteur (Optionel)</label>
                                            <div class="input-group">
                                                <select name="idTransporteur" class="form-control">
                                                    <option value="">Séléctionner</option>
                                                    <?php
                                                    foreach ($donnes['transporteurs'] as $transporteur){
                                                    ?>
                                                        <option value="<?= $transporteur->getId() ?>"><?= $transporteur->getCin() ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Prix transporteur/DH (Optionel)</label>
                                            <div class="input-group">
                                                <input name="prixTransporteur" placeholder="Ex: 100" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Description (Optionel)</label>
                                            <div class="input-group">
                                                <textarea name="idDescription" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <button class="btn btn-info float-right">Ajouter</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php $this->end(); ?>