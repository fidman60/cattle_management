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
                                    <h2>Liste des <b>Traitements</b></h2>
                                </div>
                                <div class="col-sm-6">
                                    <a href="<?= SROOT ?>traitements/ajouter" class="btn btn-success"><i class="fas fa-plus-circle"></i> <span>Nouveau traitment</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Date traitement</th>
                                <th>Bovin</th>
                                <th>Medicament</th>
                                <th>Prix traitement</th>
                                <th>Prix transporteur</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($donnes['traitementsDetails'] as $line){
                                $traitement = $line['traitement'];
                                $bovin = $line['bovin'];
                                $medicament = $line['medicament'] ? $line['medicament'] : new Medicament([]);
                                ?>
                                <tr>
                                    <td><?= $traitement->getId() ?></td>
                                    <td><?= getTypeTraitement($traitement->getIdTypeTraitement()) ?></td>
                                    <td><?= getFormattedDate($traitement->getDateTraitement()) ?></td>
                                    <td><a href="<?= SROOT ?>bovins/details/<?= $bovin->getId() ?>"><?= $bovin->getId() ?>: <?= getTypeBovin($bovin->getIdTypeBovin()) ?></a></td>
                                    <td><?= $medicament->getNom() ? $medicament->getNom() : "/" ?></td>
                                    <td><?= $traitement->getPrixTraitement() ?> DH</td>
                                    <td><?= $traitement->getPrixTransporteur() ? $traitement->getPrixTransporteur()." DH" : "/" ?></td>
                                </tr>
                                <?php $i++;} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php $this->end(); ?>