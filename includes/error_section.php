<?php
if (Session::exists("error")){
?>
    <div class="alert alert-danger-alt alert-dismissable">
        <span class="glyphicon glyphicon-certificate"></span>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?= Session::get("error") ?>
    </div>
<?php
    Session::delete("error");
}


if (Session::exists("success")){
?>
    <div class="alert alert-success-alt alert-dismissable">
        <span class="glyphicon glyphicon-certificate"></span>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?= Session::get("success") ?>
    </div>
<?php
    Session::delete("success");
}