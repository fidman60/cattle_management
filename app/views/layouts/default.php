<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" id="bootstrap-css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $this->_siteTitle; ?></title>
    <link rel="icon" href="<?= SROOT ?>public/cow.ico" />
    <link rel="stylesheet" href='<?= SROOT ?>public/css/style.css'/>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href='https://pro.fontawesome.com/releases/v5.7.2/css/all.css'/>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href='<?= SROOT ?>public/css/crud.css'/>
    <!--<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="<?= SROOT ?>public/js/script.js" ></script>
    <?= $this->content('head');?>
</head>
<body>
<?= $this->content('body'); ?>
</body>
</html>