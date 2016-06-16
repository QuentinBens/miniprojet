<?php include "header.php";?>

<div class="container">
  <h1><i class="fa fa-film" aria-hidden="true"></i> Page Acteurs</h1>
  <hr>
  <?php include "sidebar.php" ?>
<!-- // $_GET est un tableau associatif déjà existant en php
      // ui permet dfe récupérer les variables transmises en URL -->
    <?php $id = $_GET['id'];
    $acteurs = getActorDetailById($id,$linkDB);
    $moviesactors = getMoviesFromActorsById($id,$linkDB);
    ?>
    <div class="row">
      <div class="col-md-9 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-body">
            <h2><?php echo $acteurs['firstname'] .' '. $acteurs['lastname']; ?></h2>
            <span class="label label-primary"><?php echo $acteurs['dob']; ?></span>
            <span class="label label-primary"><?php echo $acteurs['city']; ?></span>
            <span class="label label-primary"><?php echo $acteurs['nationality']; ?></span>
            <hr>
            <div class="row">
              <div class="col-md-9">
                <p><?php echo $acteurs['biography']; ?></p>
                  <?php foreach ($moviesactors as $key => $value) { ?>
                    <a href="movie.php?id=<?php echo $value['id'] ?>"><span class="label label-info"><?php echo $value['titre'] ?></span></a>
                  <?php } ?> <!--endForEach-->
              </div>
              <div class="col-md-3 imgFilm">
                <img src="<?php echo $acteurs['image']; ?>" />
              </div>
            </div>
          </div><!--endPanelBody-->
        </div><!--endPanelDefault-->
      </div><!--endCol-->
    </div> <!--endRow-->




  <?php include "footer.php" ?>
</div> <!--endContainer-->



<?php  ?>
