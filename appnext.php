<?php
include "vendor/autoload.php";

include "header.php";
include "lib/Connexion.php";

use src\Connexion as ConnexionSrc;
use lib\Connexion as ConnexionLib;
use src\Movies;
use src\Acteur;
use src\Director;
use src\Session;



$connexionPdoConst = new ConnexionSrc("localhost", "cinemal9", "root", "troiswa");
$movieConst = new Movies("distributeur pour parametre ", $connexionPdoConst, 5);
$newActeur = new Acteur();

$directorOne = new director();
  $directorOne->setFirstname("Quentin");
  $directorOne->setLastname("Tarantino");
  $directorOne->setDob("27-03-1963");
  $directorOne->setBiographie("Quentin Tarantino, né le 27 mars 1963 à Knoxville dans le Tennessee, est un réalisateur, scénariste, producteur et acteur américain.");
  $directorOne->setImage("https://upload.wikimedia.org/wikipedia/commons/a/a3/Quentin_Tarantino_(Berlin_Film_Festival_2009)_2_cropped.jpg");

$directorTwo = new director();
  $directorTwo->setFirstname("Steven");
  $directorTwo->setLastname("Spielberg");
  $directorTwo->setDob("18-12-1946");
  $directorTwo->setBiographie("Steven Spielberg est un réalisateur, scénariste et producteur américain né le 18 décembre 1946 à Cincinnati");
  $directorTwo->setimage("http://t1.gstatic.com/images?q=tbn:ANd9GcRqR-bnpoNaZ627METEKi0r9rvyVQ7SVvjlqvAEzvmRVP5UmYCfSml4_Vo");

$dateSessionOne = new Session();
  $dateSessionOne->setDateSession("18-03-2016");
  $dateSessionOne->setDateCreated("02-04-2016");
$dateSessionTwo = new Session();
  $dateSessionTwo->setDateSession("12-08-2012");
  $dateSessionTwo->setDateCreated("27-01-2016");
$dateSessionThree = new Session();
  $dateSessionThree->setDateSession("11-07-2016");
  $dateSessionThree->setDateCreated("02-01-2016");

// :: permet l'appel d'une constante dans ma classe
?>

<div class="panel panel-danger">
  <div class="panel-heading">
    <h4>CONSTANTE</h4>
  </div>
  <div class="panel-body">
    <div class="alert alert-success">><?php echo $movieConst::VERSION; ?></div>
    <div class="alert alert-success"><?php echo $connexionPdoConst::SGBD; ?></div>
    <div class="alert alert-success"><?php echo $newActeur::PAYS; ?></div>
    <div class="alert alert-success"><?php echo $newActeur::LANGUE; ?></div>
    <!-- Appel depuis la classe
    Acteur::LANGUE;
    Acteur::PAYS;
    Movies::VERSION;
    -->
    <div class="alert alert-success"><?php echo Movies::getInformationOfMovie() ?></div>
    <div class="alert alert-success"><?php echo Acteur::langBylangConst() ?></div>
    <div class="alert alert-success"><?php echo $directorOne->getDobFr() ?></div>
    <div class="alert alert-success"><?php echo $dateSessionOne->formatDateSession() ?></div>
    <div class="alert alert-success"><?php echo $dateSessionOne->getYearOfDateSession() ?></div>
    <div class="alert alert-success"><?php echo $dateSessionOne->diffBetweenTwoDate($dateSessionThree, $dateSessionOne) ?> jours de différences</div>
    <div class="alert alert-success"><?php
    $objet = new  DateTime("12-07-2015");
     $tt= $dateSessionThree->dateAfterParamInDb($connexionPdoConst, $objet); ?>
     <div>Mes date apres le <b><?php echo $objet->format("Y-m-d") ?></b> sont: <br />
       <?php foreach ($tt as $value) { ?>
          <?php foreach ($value as $key => $val) { ?>
           <b><?php echo $val?></b><br />
          <?php } ?>
       <?php } ?>
     </div>
   </div>
   <div class="alert alert-success">Ma date <b><?php echo $dateSessionTwo->getDateSession() ?></b>  à la quelle je soustrait un interval est : <b><?php
    $interval = new DateInterval("P5Y5D");
    echo $dateSessionTwo->getSubDateSession($interval) ?></b>
  </div>
  <div class="alert alert-success"><?php
    $tabSession = [$dateSessionOne, $dateSessionTwo, $dateSessionThree];
    $tabSessionValue = Session::getDateSessionWithYear($tabSession); ?>
    <div>Une seul date session en 2012 de mon tableau de date_session : <b><?php
      foreach ($tabSessionValue as $key => $value) {
        echo $value->format('Y-m-d');
      } ?></b>
    </div>
  </div>
  <?php $dateTimeSess = new \DateTime("2017-05-16") ?>
  <div class="alert alert-success"><?php var_dump(Session::boolIfSupOrInf($dateSessionThree, $dateTimeSess)) ?> </div>



 </div>
</div> <!--fin panel body-->


<?php







include "footer.php";

?>
