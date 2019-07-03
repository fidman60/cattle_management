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
                            <div class="card-header bg-info text-white"><i class="fas fa-cow"></i> Meilleurs bovins</div>
                            <div class="card-block" style="padding-top: 30px;padding-bottom: 30px">
                                <div style="width: 90%;margin: auto;" class="well form-horizontal" >
                                    <div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Max bovins</label>
                                            <div class="input-group">
                                                <input id="maxBovins" name="maxBovins" placeholder="Ex: 12" class="form-control" required="true" value="" type="text">
                                            </div>
                                        </div>
                                        <button onclick="location.href = <?= SROOT ?>+ 'bovins/meilleurs_bovins_invoice/' + parseInt(document.getElementById('maxBovins').value);" class="btn btn-info float-right">Obtenir la facture</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php $this->end(); ?>