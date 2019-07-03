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
                                    <h2>Liste des <b>Personnes</b></h2>
                                </div>
                                <div class="col-sm-6">
                                    <a href="<?= SROOT ?>personnes/ajouter" class="btn btn-success"><i class="fas fa-plus-circle"></i> <span>Nouveau personne</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cin</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email</th>
                                <th>Tele</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($donnes['personnes'] as $personne){
                                ?>
                                <tr>
                                    <td><?= $personne->getId() ?></td>
                                    <td><?= $personne->getCin() ?></td>
                                    <td><?= $personne->getNom() ?></td>
                                    <td><?= $personne->getPrenom() ?></td>
                                    <td><?= $personne->getEmail() ?></td>
                                    <td><?= $personne->getTele() ?></td>
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