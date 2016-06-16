<?php
$statMovies = statisticNb($linkDB, "movies");
$statCategories = statisticNb($linkDB, "categories");
$statActors = statisticNb($linkDB, "actors");
$statComments = statisticNb($linkDB, "comments");
$statDirectors = statisticNb($linkDB, "directors");

$tab = [
  "Film" => $statMovies['nbmovies'],
  "Catégories" => $statCategories['nbcategories'],
  "Acteur" => $statActors['nbactors'],
  "Commentaire" => $statComments['nbcomments'],
  "Réalisateur" => $statDirectors['nbdirectors'],

];
arsort($tab);


 ?>
<div class="row">

<div class="col-md-4 col-md-offset-2">
  <table class="table table-striped table-hover ">
    <thead>
      <tr class="active">
        <th>#</th>
        <th>Table</th>
        <th>Nombre</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 0;
      $class = "";
      foreach($tab as $key => $value) {
        $i++;
        if($i == 1){
          $class = "success"; ?>
          <tr class="<?php echo $class ?>">
        <?php }// fin de if
        elseif ($i == 5) {
          $class = "danger"; ?>
          <tr class="<?php echo $class ?>">
        <?php } ?>
          <td><?php echo $i ?></td>
          <td><?php echo $key ?></td>
          <td><?php echo $value ?></td>
        </tr>
      <?php }// fin de foreach ?>

    </tbody>
  </table>
</div>
</div>
