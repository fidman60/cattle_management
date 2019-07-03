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
                                    <h2>Liste des <b>Marchés</b></h2>
                                </div>
                                <div class="col-sm-6">
                                    <a href="<?= SROOT ?>marches/ajouter" class="btn btn-success"><i class="fas fa-plus-circle"></i> <span>Nouveau marché</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom marché</th>
                                <th>Adresse</th>
                                <th>Ville</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($donnes['marches'] as $march){
                                ?>
                                <tr>
                                    <td><?= $march->getId() ?></td>
                                    <td><?= $march->getNom() ?></td>
                                    <td><?= $march->getAdresse() ?></td>
                                    <td><?= $march->getVille() ?></td>
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