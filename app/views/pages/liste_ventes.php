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
                                    <h2>Liste des <b>Ventes</b></h2>
                                </div>
                                <div class="col-sm-6">
                                    <a href="<?= SROOT ?>ventes/ajouter" class="btn btn-success"><i class="fas fa-plus-circle"></i> <span>Nouvelle vente</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date vente</th>
                                <th>Prix vente</th>
                                <th>Client</th>
                                <th>Total bovins</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($donnes['ventesDetails'] as $line){
                                $vente = $line['vente'];
                                $totalBovins = $line['totalBovins'];
                                $client = $line['client'] ? $line['client'] : new Client([]);
                                ?>
                                <tr>
                                    <td><?= $vente->getId() ?></td>
                                    <td><?= getFormattedDate($vente->getDateVente()) ?></td>
                                    <td><?= $vente->getPrixVente() ?> DH</td>
                                    <td><?= $client->getCin() ?></td>
                                    <td><?= $totalBovins ?></td>
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