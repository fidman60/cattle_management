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
                                <form style="width: 90%;margin: auto;" class="well form-horizontal" method="post" action="<?= SROOT ?>bovins/vente_bovin_post">
                                    <div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Sélectionner la vente</label>
                                            <div class="input-group">
                                                <select name="idVente" class="form-control">
                                                    <option>Sélectionner</option>
                                                    <?php
                                                    foreach ($donnes['ventes'] as $vente){
                                                    ?>
                                                        <option value="<?= $vente->getId() ?>"><?= $vente->getId() ?>: <?= getFormattedDate($vente->getDateVente()) ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Sélectionner le bovin</label>
                                            <div class="input-group">
                                                <select name="idBovin" class="form-control">
                                                    <option>Sélectionner</option>
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