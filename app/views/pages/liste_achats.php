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
                                    <h2>Liste des <b>Achats</b></h2>
                                </div>
                                <div class="col-sm-6">
                                    <a href="<?= SROOT ?>achats/ajouter" class="btn btn-success"><i class="fas fa-plus-circle"></i> <span>Nouvelle achat</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date achat</th>
                                <th>Prix achat</th>
                                <th>Prix transporteur</th>
                                <th>Transporteur</th>
                                <th>Vendeur</th>
                                <th>Total bovins</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($donnes['achatsDetails'] as $line){
                                $achat = $line['achat'];
                                $totalBovins = $line['totalBovins'];
                                $transporteur = $line['transporteur'] ? $line['transporteur'] : new Transporteur([]);
                                $vendeur = $line['vendeur'] ? $line['vendeur'] : new Vendeur([]);
                            ?>
                                <tr>
                                    <td><?= $achat->getId() ?></td>
                                    <td><?= getFormattedDate($achat->getDateAchat()) ?></td>
                                    <td><?= $achat->getPrixAchat() ?> DH</td>
                                    <td><?= $achat->getPrixTransporteur() ?> DH</td>
                                    <td><?= $transporteur->getCin() ?></td>
                                    <td><?= $vendeur->getCin() ?></td>
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