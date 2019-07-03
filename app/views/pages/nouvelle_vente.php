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
                            <div class="card-header bg-info text-white"><i class="far fa-money-bill-alt"></i> Nouvelle vente</div>
                            <div class="card-block" style="padding-top: 30px;padding-bottom: 30px">
                                <div>
                                    <form style="width: 90%;margin: auto;" class="well form-horizontal" method="post" action="<?= SROOT ?>ventes/ajouter_post">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Date vente</label>
                                            <div class="input-group">
                                                <input name="dateVente" placeholder="Date vente" class="form-control" required="true" type="date">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Prix de vente (DH)</label>
                                            <div class="input-group">
                                                <input name="prixVente" placeholder="EX: 5433.43" class="form-control" required="true" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Client</label>
                                            <div class="input-group">
                                                <select name="idClient" class="form-control">
                                                    <?php
                                                    foreach ($donnes['clients'] as $client){
                                                    ?>
                                                        <option value="<?= $client->getId() ?>"><?= $client->getCin() ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
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