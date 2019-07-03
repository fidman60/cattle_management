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
                        <div id="form_naissance" class="card w-75">
                            <div class="card-header bg-info text-white"><i class="fas fa-store"></i> Nouveau marché</div>
                            <div class="card-block" style="padding-top: 30px;padding-bottom: 30px">
                                <div>
                                    <form style="width: 90%;margin: auto;" class="well form-horizontal" method="post" action="<?= SROOT ?>marches/ajouter_post">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Nom marché</label>
                                            <div class="input-group">
                                                <input name="nom" placeholder="EX: Souk exemple" class="form-control" required="true" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Adresse achat</label>
                                            <div class="input-group">
                                                <input name="adresse" placeholder="EX: Adresse exemple" class="form-control" required type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Ville</label>
                                            <div class="input-group">
                                                <input name="ville" placeholder="EX: Marrakech" class="form-control" required type="text">
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