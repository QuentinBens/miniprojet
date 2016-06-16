<?php include "header.php"; ?>

<?php include "sidebar.php"; ?>

<?php
$data = $_POST;
if(!empty($data) && isset($_POST['contenu'])){

  if (preg_match('/^(raison)(One|Two|Three|Four)$/i', $_POST['raison']) && preg_match('/^[\w]{0,}\@[\w]{0,20}.[\w]{0,5}$/i', $_POST['mail']) && preg_match('/^http(s)?:\/\/(.+).[a-z]{1,5}$/i', $_POST['url']) && preg_match('/^(.+)$/i', $_POST['contenu'])) {

     //Insert comments in DB
    insertContactToTable($linkDB);
    $sucess = "<div class='alert alert-success'>Contact success</div>";
?>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4>Récapitulatif de votre demande</h4>
          </div>
          <div class="panel-body">
            <p>Sujet du contact: </br><b><?php echo $_POST['raison'] ?></b></p>
            <p>L'url de votre site: </br><b><?php echo $_POST['url'] ?></b></p>
            <p>Votre email :</br><b><?php echo $_POST['mail'] ?></b></p>
            <p>Le contenu : </br><b><?php echo $_POST['contenu'] ?></b></p>
          </div>
        </div>
      </div>
    </div> <!-- fin de row 2-->
<?php }else{ ?>
  <div class="alert alert-danger">
    ERREUR: Formulaire non soumis verfifier vos champs !
  </div>
<?php } // fin de else
}// fin de if ?>

<div class="row">
  <div class="col-md-12">
    <?php echo $sucess; ?>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4>Contactez-Nous</h4>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="contact.php" method="post">
          <div class="form-group">
            <label for="select" class="control-label">Sujet</label>
                <select name="raison" class="form-control" id="select">
                  <option value="RaisonOne">Raison One</option>
                  <option value="RaisonTwo">Raison Two</option>
                  <option value="RaisonThree">Raison Three</option>
                  <option value="RaisonFour">Raison Four</option>
                </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="url">URL du site</label>
            <input class="form-control" name="url" type="url" placeholder="http:// ..." required="required" id="url" />
          </div>
          <div class="form-group">
            <label class="control-label" for="mail">Email</label>
            <input class="form-control" name="mail" type="email" placeholder="example@example.fr" required="required" id="mail" />
          </div>
          <div class="form-group">
            <label class="control-label" for="contenu">Contenu</label>
            <textarea class="form-control" name="contenu" placeholder="Expliquez-nous ..." required="required" id ="contenu"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-warning">Ajouter du contenu média</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> <!-- fin de row 2-->














</div> <!--endContainer-->
<?php include "footer.php"; ?>
