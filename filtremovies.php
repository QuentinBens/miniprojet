<?php include "header.php";?>
<div class="container">

<?php include "sidebar.php" ?>

<?php

$dataSearch = $_POST;
if (!empty($dataSearch)&& !empty($_POST['search'])) {
  $regexFiltre = $_POST['search'];
  $resultFiltre = getMoviesByFilter($regexFiltre, $linkDB);


  foreach ($resultFiltre as $resultFiltreVal ) { ?>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2> <?php echo $resultFiltreVal['title']; ?></h2>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <span class="label label-primary"><?php echo $resultFiltreVal['type']; ?></span>
                <span class="label label-primary"><?php echo $resultFiltreVal['languages']; ?></span>
                <span class="label label-primary"><?php echo $resultFiltreVal['distributeur']; ?></span>
              </div>
            </div>
            <div class="row">
              <div class="col-md-9">
                <h3>Mon synopsis: </h3>
                <p><?php echo strip_tags($resultFiltreVal['synopsis']); ?></p>
                <p><?php echo $resultFiltreVal['description']; ?></p>

                <?php $medias = getMediasByMovieFiltre($resultFiltreVal['id'], $linkDB); ?>

                <?php foreach ($medias as $mediasfiltreVal) {
                  if($mediasfiltre['nature'] == 2){
                    echo $mediasfiltre['video'];
                }
              } // fin de if  ?>
              </div>
              <div class="col-md-3">
                  <?php
                  foreach ($medias as $mediasfiltreVal) {
                    if($mediasfiltreVal['nature'] == 1){
                  ?>
                      <img src="<?php  echo $mediasfiltreVal['picture']; ?>" />
                    <?php } // fin de else  ?>
                  <?php } // fin foreach ?>
              </div>
            </div><!-- fin de row -->
          </div><!-- fin de col -->
        </div> <!--FIN panel-->
      </div> <!--FIN col-->
    </div> <!--FIN row-->
  <?php }//find  foreach
}elseif(empty($_POST['search'])){ ?>
  <div class="alert alert-danger">
    ERREUR: Vous devez préciser votre recherche !
  </div>


<?php }// fin de if ?>






</div> <!--endContainer-->
<?php include "footer.php" ?>
