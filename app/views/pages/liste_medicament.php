<?php $this->start('body'); ?>
    <div class="page-wrapper chiller-theme toggled">
        <?php include_once ROOT . DS . "includes" . DS . "nav.php" ?>
        <main class="page-content">
            <div class="container-fluid">
                <div class="container">
                    <?php include_once ROOT . DS . "includes" . DS . "error_section.php" ?>
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Liste stock <b>Médicaments</b></h2>
                                </div>
                                <div class="col-sm-6">
                                    <a href="<?= SROOT ?>stock/ajouter_medicament" class="btn btn-success"><i class="fas fa-plus-circle"></i> <span>Nouveau stock médicament</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Quantitée initiale</th>
                                <th>Quantitée restée</th>
                                <th>Prix</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($donnes['medicaments'] as $medicament){
                                ?>
                                <tr>
                                    <td><?= $medicament->getId() ?></td>
                                    <td><?= $medicament->getNom() ?></td>
                                    <td><?= $medicament->getQuantite() ?> ML</td>
                                    <td><?= $medicament->getQuantiteReste() ?></td>
                                    <td><?= $medicament->getPrixUnitaire() ?> DH</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php $this->end(); ?>