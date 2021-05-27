<?php ob_start(); ?>
<div class="container-fluid d-flex h-100 characterBackground mt-5">
    <div class="row align-self-center w-100">
        <div class="col-md-4 mx-auto auth-container">
            <h3>Welcome back!
            </h3>
            <p class="text-muted">We're so excited to see you again!</p>
            <form method="POST" action="" id="form" class="custom-form" >

            <div class="form-group">
              <label for="lastPass">Expediteur</label>
              <input type="text" name="expediteur" id="expediteur" class="form-control" 
              maxlength="50" style="font-style:italic;"/>
            </div>
            <div class="form-group">
              <label for="lastPass">Destinataire</label>
              <span type="text"  value="contact@discoding.fr" class="form-control" contentEditable="false"
              maxlength="50" style="font-style:italic;">contact@discoding.fr</span>
            </div>
            <div class="form-group">
              <label for="newPass">objet</label>
              <input type="text" name="objet" id="objet" class="form-control"  maxlength="20"
               style="font-style:italic;"/>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                <textarea class="form-control" name="message" id="message" rows="6"></textarea>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                   <a href="index.php?action=login" class="btn btn-primary btn-lg btn-block w-100 mb-2">COUCOU</a>
                   <button name="submit" type="submit" class="btn btn-primary btn-lg btn-block w-100">SEND</button>
                </div>
            </div>

            <span class="error-msg" id="result">
              <?= isset( $message_erreur ) ? $message_erreur : ''; ?>
            </span>
            <span class="error-msg" id="result">
              <?= isset( $success_msg ) ? $success_msg : ''; ?>
            </span>
          </form>
        </div>
    </div>


<?php $content = ob_get_clean(); ?>
<?php require( __DIR__ . '/base.php'); ?>