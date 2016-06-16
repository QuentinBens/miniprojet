<?php include "header.php";?>
<div class="container">
  <?php include "sidebar.php" ?>
    <?php $id = $_GET['id'];
    $film = getMoviesDetailById($id,$linkDB);
    // $_GET est un tableau associatif déjà existant en php
    // ui permet dfe récupérer les variables transmises en URL
    $data = $_POST;
    // Si mes data ne sont pas vides
    // Si mon formulaire a été soumis
    if(!empty($data) && isset($_POST['contenu'])){
      //Insert comments in DB
      insererCommentInMovies($id, $linkDB);
      $sucess = "<div class='alert alert-success'>votre commentaire sucess</div>";


    }
    if(!empty($data) && isset($_POST['nature'])){
      print_r($_POST);
      insertMediasInDB($id, $linkDB);
    }

    $medias = getMediasByMovieId($id, $linkDB)






    ?>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h2> <?php echo $film['title']; ?></h2>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <span class="label label-primary"><?php echo $film['type']; ?></span>
              <span class="label label-primary"><?php echo $film['languages']; ?></span>
              <span class="label label-primary"><?php echo $film['distributeur']; ?></span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9">
              <h3>Mon synopsis: </h3>
              <p><?php echo $film['synopsis']; ?></p>
              <?php foreach ($medias as $valueMedias) {
                if($valueMedias['nature'] == 2){
                  echo $valueMedias['video'];
              }
            } // fin de if  ?>
            </div>
            <div class="col-md-3">
                <?php
                foreach ($medias as $valueMedias) {
                  if($valueMedias['nature'] == 1){
                ?>
                    <img src="<?php  echo $valueMedias['picture']; ?>" />
                  <?php } // fin de else  ?>
                <?php } // fin foreach ?>
            </div>
          </div><!-- fin de row -->
        </div><!-- fin de col -->
      </div> <!--FIN panel-->
    </div> <!--FIN col-->
  </div> <!--FIN row-->

  <div class="row">
    <div class="col-md-12">
      <?php echo $sucess ?>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4>Laissez votre commentaire</h4>

        </div>
        <div class="panel-body">

          <form class="form-horizontal" action="movie.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
              <label class="control-label" for="note">Note</label>
              <input class="form-control" name="note" type="text" placeholder="Note sur 5" required="required" id="note" />
            </div>
            <div class="form-group">
              <label class="control-label" for="contenu">Contenu</label>
              <textarea class="form-control" name="contenu" placeholder="Votre commentaire ..." required="required" id ="contenu"></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-warning">Ajouter commentaire</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> <!-- fin de row 2-->


  <div class="row">
    <div class="col-md-12">
      <?php echo $sucess ?>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4>Ajoutez du contenu Média</h4>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" action="movie.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
              <label for="select" class="control-label">Nature</label>
                  <select name="nature" class="form-control" id="select">
                    <option value="1">Photo</option>
                    <option value="2">Video</option>
                  </select>
            </div>
            <div class="form-group">
              <label class="control-label" for="image">Image</label>
              <input class="form-control" name="image" type="text" placeholder="URL de l'image" required="required" id="image" />
            </div>
            <div class="form-group">
              <label class="control-label" for="video">Video</label>
              <textarea class="form-control" name="video" placeholder="URL de la vidéo" required="required" id ="video"></textarea>
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
  <?php include "footer.php" ?>
