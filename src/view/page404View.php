<?php ob_start(); ?>

<div class="container-fluid d-flex h-100 characterBackground mt-5">
    <div class="row align-self-center w-100">
        <div class="col-sm-9 col-md-6 col-lg-4 mx-auto auth-container" style="text-align: center;">
            <h3>OUPPS there might have been an issue !</h3>
            <a href="index.php?action=friend" class="btn btn-secondary btn-lg btn-block w-100 mt-3">BACK</a>
        </div>
    </div>


<?php $content = ob_get_clean(); ?>
<?php require( __DIR__ . '/base.php'); ?>
