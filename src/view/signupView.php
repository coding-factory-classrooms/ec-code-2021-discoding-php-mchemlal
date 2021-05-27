<?php ob_start(); ?>

<div class="container-fluid d-flex h-100 characterBackground mt-5">
    <div class="row align-self-center w-100">
        <div class="col-4 mx-auto auth-container">
            <h3>Welcome!
            </h3>
            <p class="text-muted">Please signup to enjoy our application!</p>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="text" class="form-label text-muted small text-uppercase">Username</label>
                    <input type="text" class="form-control" id="username" name="username" maxlength="20" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" required/>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label text-muted small text-uppercase">Email</label>
                    <input type="email" class="form-control" id="email" name="email" maxlength="30" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" required/>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-muted small text-uppercase">Password</label>
                    <input type="password" class="form-control" id="password" name="password" maxlength="30" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" required/>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-muted small text-uppercase">Confirm your password</label>
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" maxlength="30" required />
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-lg btn-block w-100">Signup</button>
                    <a href="index.php?action=login" class="btn btn-secondary btn-lg btn-block w-100 mt-3">Login</a>
                </div>
                <span class="error-msg"><?= isset( $msg ) ? $msg : null; ?></span>
            </form>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require( __DIR__ . '/base.php'); ?>