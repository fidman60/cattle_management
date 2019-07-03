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
                            <div class="card-header bg-info text-white"><i class="fa fa-shopping-cart"></i> Nouvel achat</div>
                            <div class="card-block" style="padding-top: 30px;padding-bottom: 30px">
                                <div>
                                    <form style="width: 90%;margin: auto;" class="well form-horizontal" method="post" action="<?= SROOT ?>achats/ajouter_post">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Date achat</label>
                                            <div class="input-group">
                                                <input name="dateAchat" placeholder="Date achat" class="form-control" required="true" type="date">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Prix achat (DH)</label>
                                            <div class="input-group">
                                                <input name="prixAchat" placeholder="EX: 43.43" class="form-control" required="true" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Marché</label>
                                            <div class="input-group">
                                                <select name="idMarche" class="form-control">
                                                    <?php
                                                    foreach ($donnes['marches'] as $marche){
                                                    ?>
                                                        <option value="<?= $marche->getId() ?>"><?= $marche->getNom() ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Vendeur</label>
                                            <div class="input-group">
                                                <select name="idVendeur" class="form-control">
                                                    <?php
                                                    foreach ($donnes['vendeurs'] as $vendeur){
                                                    ?>
                                                        <option value="<?= $vendeur->getId() ?>"><?= $vendeur->getNom() . " " . $vendeur->getPrenom() ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Transporeur</label>
                                            <div class="input-group">
                                                <select name="idTransporteur" class="form-control">
                                                    <?php
                                                    foreach ($donnes['transporteurs'] as $transporteur){
                                                        ?>
                                                        <option value="<?= $transporteur->getId() ?>"><?= $transporteur->getNom() . " " . $transporteur->getPrenom() ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Prix transporteur (DH)</label>
                                            <div class="input-group">
                                                <input name="prixTransporteur" placeholder="EX: 43.43" class="form-control" required="true" type="text">
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