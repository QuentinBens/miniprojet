<?php
include "vendor/autoload.php";

include "header.php";

// J'inclue ma classe (un fichier = une class)


$connexionPdo = new Connexion("localhost", "cinemal9", "root", "troiswa");

 ?>


 <?php
 // Je crées mes 4 obect films et je donne la valeur axu attributs
 $moviesOne = new Movies("Distributeur de mon film", $connexionPdo, 4);
 $moviesOne->setTitle("Deadpool");
 $moviesOne->setSynopsis("Mon synopsis Seigneurs des anneaux");
 $moviesOne->setDateRelease("2016-05-02");
 $moviesOne->setBudget(1000000);
 $moviesOne->setDistributor("europacorp");
 ?>


 <div class="panel panel-danger">
   <div class="panel-heading">
     <h4>CONNEXION ONE TEST</h4>
   </div>
   <div class="panel-body">
     <?php var_dump($moviesOne->getConnectDb()) ?>
   </div> <!--fin panel body-->
 </div>




<?php $moviesTwo = new Movies("Distributeur de mon film", $connexionPdo, 7);
  $moviesTwo->setTitle("Le hobbit");
  $moviesTwo->setSynopsis("Mon synopsis Le hobbit");
  $moviesTwo->setDateRelease("Ma date release pour Le hobbit");
  $moviesTwo->setBudget(2000000);
  $moviesTwo->setDistributor("twentyceintury");

$moviesThree = new Movies("Distributeur de mon film", $connexionPdo, 6);
  $moviesThree->setTitle("Spider man ");
  $moviesThree->setSynopsis("Mon synopsis Spider man ");
  $moviesThree->setDateRelease("Ma date release pour Spider man ");
  $moviesThree->setBudget(5000000);
  $moviesThree->setDistributor("warner");

$moviesFour = new Movies("Distributeur de mon film", $connexionPdo, 5);
  $moviesFour->setTitle("Deadpool ");
  $moviesFour->setSynopsis("Mon synopsis Deadpool ");
  $moviesFour->setDateRelease("Ma date release pour Deadpool ");
  $moviesFour->setBudget(2500000);
  $moviesFour->setDistributor("WarnerBros");

// Je crée mon tableau d'object
$tabObject = [$moviesOne, $moviesTwo, $moviesThree, $moviesFour ];

dump($tabObject); ?>
<div class='panel panel-primary'>

  <div class='panel-heading'>
    <h4>EXERCICE 3:</h4>
  </div>
  <div class='panel-body'>
    <div class="row"><?php $moviesOne->insertMoviesDb(2)?></div>
    <div class="row">
      <?php $fetchThreeMovies = $moviesOne->selectThreeMoviesFr("Warner_Bros", "VO"); ?>
      <p> Mes 3 films de ma requête sont : <b class ="text-success">
      <?php foreach ($fetchThreeMovies as $key => $value) { ?>
        <?php echo $value['title']; ?>
        <?php } ?> </b></p></div>
    <div class="row">J'insere un tableau de 4 object movies avec ma fonction "insertMoviesDb()"
      <ul>
        <?php foreach ($tabObject as $key => $value) {?>
          <li><?php $value->insertMoviesDb(2); ?> </li>
        <?php } ?>
      </ul>
    </div>
    <div class="row"> Ici mon retour est <b><?php var_dump($moviesOne->bolleanMoviesExistDb()) ?></b></div>
    <div class="row">Ma function <b class ="text-success">'deleteMovieWithId($id)'</b> permet d'effacer une lifne selon l'id choisis</div>
    <div class="row">J'ai changer mon film ayant l'ID demandé avec la function <b class ="text-success">'changeMoviesWithId()'</b> <?php echo  $moviesOne->changeMoviesWithId($moviesTwo, 123) ?> </div>
  </div>
</div>
<?php

echo
"<div class='panel panel-primary'>
  <div class='panel-heading'>
    <h4>EXERCICE 2:</h4>
  </div>
  <div class='panel-body'>
    <div class='row'> Pour <b>{$moviesOne->getTitle()}</b> le budget est de <b>{$moviesOne->formatBudget()}</b> </div>
    <div class='row'>{$moviesThree->compareBudget($moviesThree)} </div>
    <div class='row'>Pour le film <b>{$moviesFour->getTitle()}</b> j'ai <b>{$moviesFour->nbWordSynopsis()}</b> dans mon synopsis</div>
    <div class='row'>Pour le film <b>{$moviesOne->getTitle()}</b> j'ai <b class='text-success'>{$moviesOne->distributorAndVisibility()}</b> dans mon synopsis</div>
    <div class='row'>J'ai <b>{$moviesOne->tabNbMoviesInfOneM($tabObject)}</b> avec un budget inférieur à 1 000 000€</div>
    <div class='row'>La moyenne de mes film en dessous de 1M est de : <b>{$moviesOne->tabMoyenneMoviesInfOneM($tabObject)}</b></div>
  </div>
</div>";
// J'utilise ma fonction allInfo pour afficher les elements de mes objets, dans un div
echo
"<div class='panel panel-primary'>
  <div class='panel-heading'>
    <h4>EXERCICE 1:</h4>
  </div>
  <div class='panel-body'>
    <div class='row'>
    {$moviesOne->allInfo($tabObject)}
    </div>
  </div>
</div>";














?>

  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h4>CONNEXION ONE TEST</h4>
        </div>
        <div class="panel-body">
          <?php echo $connexion->info(); ?>
        </div> <!--fin panel body-->
      </div> <!--fin panel-->
    </div> <!--fin col-->





<?php $connexionTwo = new Connexion("localhost2", "cinemal92", "root2", "troiswa2");

$connexionTwo->setHost("localhost2");
$connexionTwo->setLogin("root");
$connexionTwo->setPassword("troiswa");
$connexionTwo->setCharset("utf82");
$connexionTwo->setdbName("localhost2");
$connexionTwo->setTimeout(42);

?>


    <div class="col-md-9">
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h4>CONNEXION TWO TEST</h4>
        </div>
        <div class="panel-body">
          <?php echo $connexionTwo->info();
                echo $connexionTwo->infoBis();
                echo $connexionTwo->allInfo();
          ?>
        </div> <!--fin panel body-->
      </div> <!--fin panel-->
    </div> <!--fin col-->
  </div> <!--fin row -->

<?php
  $connexionThree = new Connexion("localhost3", "cinemal93", "root3", "troiswa3");
  // Je modifie l'attribut via la function set par la valeur desirer
  $connexionThree->setHost("localhost3");
  $connexionThree->setLogin("root");
  $connexionThree->setPassword("troiswa");
  $connexionThree->setCharset("utf83");
  $connexionThree->setdbName("localhost3");
  $connexionThree->setTimeout(43);

  $tabInfo = [
    $connexion,
    $connexionTwo,
    $connexionThree
  ];
?>


  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h4>EXERCICE 3 </h4>
        </div>
        <div class="panel-body">
            <?php
              echo $connexionThree->tabInfo($tabInfo);
            ?>
        </div> <!--fin panel body-->
      </div> <!--fin panel-->
    </div> <!--fin col-->
  </div> <!--fin row -->

<?php echo $connexion->showCol(12);

if($connexion->compareObject($connexionTwo) == true) {
  echo "<div class='jumbotron'><p class='text-success'>TRUE</p></div>";

} else {
  echo "<div class='jumbotron'><p class='text-danger'>FALSE</p></div>";
}
 ?>



<?php include "footer.php"; ?>
