<?php include "header.php" ?>



<?php include 'sidebar.php';
    $lastMovies = getSixBestMovies($linkDB);
    $lastComments = getSixLastComments($linkDB);
    $nextMovieVo = getThreeNextVO($linkDB);
    $lastUserConnection = getFiveLastUserCo($linkDB);
    $lastIframe = getThreLastIframe($linkDB);
    $bestCat = getFourBestCat($linkDB);
    $bestThreeActors = getThreeBestActors($linkDB)
    ?>

    <div class="row">

      <div class="col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><h3 class="panel-title">Les six films les mieux notés</h3></div>
          <?php foreach ($lastMovies as $key => $value) { ?>
          <div class="panel-body"><?php echo $value['title']; ?></div>
          <?php } ?>
        </div>
      </div>



      <div class="col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><h3 class="panel-title">Les six derniers commentaire</h3></div>
          <?php foreach ($lastComments as $key => $value) { ?>
          <div class="panel-body"><?php echo $value['content'] . ' publié le ' .$value['created_at'] ; ?>  <span class="label label-success"><?php echo $value['note']; ?></span></div>
          <?php } ?>
        </div>
      </div>
  </div><!--end row-->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading"><h2 class="panel-title">Mes trois prochains film en VO</h2></div>
          <div class="row">
            <div class="panel-body">
              <?php foreach ($nextMovieVo as $key => $value) { ?>
                <div class="col-md-4" id="sixmovies">
                  <a href="movie.php?id=<?php echo $value['id'] ?>"><h4><strong><?php echo $value['title']; ?></strong></h4></a>
                    <a href="categories.php?id=<?php echo $value['cId'] ?>">
                      <?php
                      if ($value['note']>= 5 ) {
                        echo "<span class='label label-success'>{$value['category']}<span class='label badge'> {$value['note']} </span></span>";
                      }
                      elseif ($value['note'] >= 4) {
                        echo "<span class='label label-info'>{$value['category']}<span class='label badge'> {$value['note']} </span></span>";
                      }
                      elseif ($value['note'] >= 2) {
                        echo "<span class='label label-warning'>{$value['category']}<span class='label badge'> {$value['note']} </span></span>";
                      }
                      else {
                        echo "<span class='label label-danger'>{$value['category']}<span class='label badge'> {$value['note']} </span></span>";
                      }
                     ?>
                   </a>
                  <p><small>Date de sortie : le <?php echo $value['date_release']; ?> - Durée : <?php echo $value['duree']; ?>h00</small></p>
                  <p><img src="<?php echo $value['image']; ?>" /><?php echo $value['synopsis']; ?></p>
                </div>
                <?php } ?>
            </div>
          </div><!--end row -->
      </div><!--end panel -->
    </div><!--end col -->
  </div><!--end row -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading"><h2 class="panel-title">Les 5 derniers connecté de la semaine</h2></div>
          <div class="row">
            <div class="panel-body" id="flexalign">
              <?php foreach ($lastUserConnection as $key => $value) { ?>
                <div class="col-md-2">
                  <h4><strong><?php echo $value['username']; ?></strong></h4>
                  <p id="ville"><?php echo $value['ville']?></p>
                  <p><?php echo $value['tel']; ?></p>
                  <p><?php echo $value['email']; ?></p>
                  <img src="<?php echo $value['avatar'] ?>" alt="" />
                  <p><small>Connecté le : <br><?php echo $value['lastActivity']; ?></small></p>
                </div>
                <?php } ?>
            </div>
          </div><!--end row -->
      </div><!--end panel -->
    </div><!--end col -->
  </div><!--end row -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading"><h2 class="panel-title">Les 3 dernières vidéos publiées</h2></div>
          <div class="row">
            <div class="panel-body" id="flexalign">
              <?php foreach ($lastIframe as $key => $value) { ?>
                <div class="col-md-4">
                  <h4><strong><?php echo $value['title']; ?></strong></h4>
                  <?php echo $value['video'] ?>
                </div>
                <?php } ?>
            </div>
          </div><!--end row -->
      </div><!--end panel -->
    </div><!--end col -->
  </div><!--end row -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading"><h2 class="panel-title">Les 4 catégories qui ont le plus de films</h2></div>
          <div class="row">
            <div class="panel-body" id="flexalign">
              <?php foreach ($bestCat as $key => $value) { ?>
                <div class="col-md-4">
                  <span class="label label-success"><?php echo $value['title']; ?></span>
                  <span class="label label-info"><?php echo $value['count']; ?></span>
                </div>
                <?php } ?>
            </div>
          </div><!--end row -->
      </div><!--end panel -->
    </div><!--end col -->
  </div><!--end row -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading"><h2 class="panel-title">Mes trois meilleurs acteurs</h2></div>
          <div class="row">
            <div class="panel-body" id="flex">

              <?php
                foreach ($bestThreeActors as $keyThree => $valueThree) {
              ?>
                <?php

                echo "<div>{$valueThree['identity']} {$valueThree['nbFilmByActor']}
                <img src='{$valueThree['image']}' alt='acteur' width='150' height='auto'/></div> ";

                }
                ?>

            </div>
          </div><!--end row -->
      </div><!--end panel -->
    </div><!--end col -->
  </div><!--end row -->

<?php  ?>


</div><!--end container-->

<?php include "footer.php" ?>
