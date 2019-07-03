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
                            <div class="card-header bg-info text-white"><i class="fas fa-user-plus"></i> Nouveau personne</div>
                            <div class="card-block" style="padding-top: 30px;padding-bottom: 30px">
                                <div>
                                    <form style="width: 90%;margin: auto;" class="well form-horizontal" method="post" action="<?= SROOT ?>personnes/ajouter_post">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Type</label>
                                            <div class="input-group">
                                                <select class="form-control" name="typePersonne">
                                                    <option value="<?= PERSONNE_VETERINAIRE ?>">Vétérinaire</option>
                                                    <option value="<?= PERSONNE_VENDEUR ?>">Vendeur</option>
                                                    <option value="<?= PERSONNE_CLIENT ?>">Client</option>
                                                    <option value="<?= PERSONNE_TRANSPORTEUR ?>">Transporteur</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Cin (unique)</label>
                                            <div class="input-group">
                                                <input name="cin" placeholder="EX: Y423233" class="form-control" required="true" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Nom</label>
                                            <div class="input-group">
                                                <input name="nom" placeholder="EX: MOUFID" class="form-control" required="true" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Prenom</label>
                                            <div class="input-group">
                                                <input name="prenom" placeholder="EX: Mohammed Ayman" class="form-control" required="true" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Email</label>
                                            <div class="input-group">
                                                <input name="email" placeholder="EX: exemple@gmail.com" class="form-control" required="true" type="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Téléphone</label>
                                            <div class="input-group">
                                                <input name="tele" placeholder="EX: 06 05 54 43 43" class="form-control" required="true" type="tel">
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