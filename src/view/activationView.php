
<?php ob_start(); ?>

<div class="container-fluid d-flex h-100 characterBackground mt-5">
    <div class="row align-self-center w-100">
        <div class="col-md-4 mx-auto auth-container">
            <h3>Welcome back!</h3>
            <h3>Very good !
            </h3>
            <p class="text-muted">Now you can enjoy the discoding experience !</p>
            <div action="" method="post">
                <div class="mb-3">

                <?php $user_id = $_SESSION['user_id'] ?? false; ?>
                <?php if(empty($user_id)) : ?>
                    <h1>Your account is now active !</h1>
                <?php else : ?>
                    <h1>You have already an account activated</h1>
                <?php endif; ?>
                <a href="index.php" class="btn btn-primary">Aller sur le site</a>
        </div>
    </div>


<?php $content = ob_get_clean(); ?>
<?php require( __DIR__ . '/base.php'); ?>