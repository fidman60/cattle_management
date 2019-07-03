<!DOCTYPE html>
<html>
<head>
    <title><?= $this->_siteTitle; ?></title>
    <meta charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Anton|Passion+One|PT+Sans+Caption' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?= SROOT ?>public/css/page_error.css"/>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="icon" href="<?= SROOT ?>public/cow.ico" />
</head>
<body>
<?= $this->content('body'); ?>
</body>
</html>