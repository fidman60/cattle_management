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
                            <div class="card-header bg-info text-white"><i class="far fa-chart-bar"></i> Statistiques</div>
                            <div class="card-block" style="padding: 30px;">
                                <div>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="text-success">Total bovins</td>
                                                <td><?= $donnes['countAll'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Total veaux</td>
                                                <td><?= $donnes['countVeaux'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Total vaches</td>
                                                <td><?= $donnes['countVaches'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Total toureaux</td>
                                                <td><?= $donnes['countToureaux'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Stock lait</td>
                                                <td><?= $donnes['stockLait'] ?> L</td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Stock herbe</td>
                                                <td><?= $donnes['stockHerbe'] ?> KG</td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Total bovins malade</td>
                                                <td><?= $donnes['countBovinsMalade'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Total bovins mort</td>
                                                <td><?= $donnes['countBovinsMort'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Total bovins en bon etat</td>
                                                <td><?= $donnes['countBovinsBon'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Total bovins vendues</td>
                                                <td><?= $donnes['countBovinsVendues'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Total bovins achetés</td>
                                                <td><?= $donnes['countBovinsAchetees'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Total bovins produit(naissances)</td>
                                                <td><?= $donnes['countBovinsProduit'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Total vaches saillie</td>
                                                <td><?= $donnes['countVachesSaillie'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Total vaches avancées</td>
                                                <td><?= $donnes['countVachesAvancee'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-success">Total bovins quarantaine</td>
                                                <td><?= $donnes['countBovinsQuarantaine'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php $this->end(); ?>