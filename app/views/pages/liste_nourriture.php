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
                                    <h2>Liste stock <b>Nourriture</b></h2>
                                </div>
                                <div class="col-sm-6">
                                    <a href="<?= SROOT ?>stock/ajouter_nourriture" class="btn btn-success"><i class="fas fa-plus-circle"></i> <span>Nouveau stock nourriture</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type</th>
                                    <th>Quantitée initiale</th>
                                    <th>Quantitée restée</th>
                                    <th>Date achat</th>
                                    <th>Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($donnes['listeNourriture'] as $nourriture){
                                ?>
                                <tr>
                                    <td><?= $nourriture->getId() ?></td>
                                    <td><?= getLabelNourriture($nourriture->getIdTypeNourriture()) ?></td>
                                    <td><?= $nourriture->getQuantiteInitiale() ?> KG/L</td>
                                    <td><?= $nourriture->getQuantiteReste() ?> KG/L</td>
                                    <td><?= $nourriture->getDateAchat() ? getFormattedDate($nourriture->getDateAchat()):"/" ?></td>
                                    <td><?= $nourriture->getPrix() ? $nourriture->getPrix()." DH" : "/" ?></td>
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