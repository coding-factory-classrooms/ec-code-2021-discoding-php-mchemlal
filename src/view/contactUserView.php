<?php ob_start(); ?>

<div class="row mb-5">
    <h5 style="text-align:left">Contactez nous</h5>
      <div class="col-md-6 mt-2" style="margin:0 auto;">
        <div class="auth-container">
          <form method="POST" action="index.php?action=contact_user" id="form" class="custom-form" >

            <div class="form-group">
              <label for="lastPass">Expediteur</label>
              <input type="text" name="expediteur" value="<?= isset($emailDeSession ) ? $emailDeSession  : "" ?>" id="expediteur" class="form-control" 
              maxlength="50" style="font-style:italic;"/>
            </div>
            <div class="form-group">
              <label for="lastPass">Destinataire</label>
              <span type="text"  value="contact@codflix.fr" class="form-control" contentEditable="false"
              maxlength="50" style="font-style:italic;">contact@codflix.fr</span>
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
                  <input type="submit" name="submit_contact" id="submit" class="btn btn-block bg-red" />
                </div>
                <?php if(!isset($_SESSION['user_id'])) : ?>
                    <div class="col-md-4"><a href="index.php?action=login" class="btn btn-block bg-red">Connexion</a></div>
                <?php endif; ?>
            </div>

            <span class="error-msg" id="result">
              <?= isset( $msg ) ? $msg : ''; ?>
            </span>
          </form>
        </div>
      </div>
      <hr>
</div> 
<?php $conversation_list_content = ob_get_clean(); ?>
<?php require('base.php'); ?>