<?php

include "header.php";
include "src/Connexion.php";
include "src/Movies.php";
include "src/Dvd.php";
include "src/Blueray.php";
include "src/DvdRom.php";

use src\Connexion;
use src\Movies;
use src\Dvd;
use src\Blueray;
use src\DvdRom;

$connectDvd = new Connexion("localhost", "cinemal9", "root", "troiswa");


$dvdOne = new Dvd("Lions Gate Film", $connectDvd);
  $dvdOne->setTitle("John Rambo");
  $dvdOne->setSynopsis("John Rambo, ou Rambo, est un film américano-allemand de Sylvester Stallone, sorti en 2008. Il s'agit du quatrième film de la série Rambo. Rambo");
  $dvdOne->setYear("2008");
  $dvdOne->setDateRelease("2008-01-25");
  $dvdOne->setFabriquant("Vocation record");
  $dvdOne->setBudget(55000000);

$dvdTwo = new Dvd("Walt Disney picture", $connectDvd);
  $dvdTwo->setTitle("Le Monde de Narnia : Le Lion, la Sorcière blanche et l'Armoire magique");   $dvdTwo->setSynopsis("Le Monde de Narnia : Le Lion, la Sorcière blanche et l'Armoire magique ou Les Chroniques de Narnia : L'Armoire magique au Québec est un film américain réalisé par Andrew Adamson, sorti le 8 décembre 2005. Il est basé sur le roman de C. S.");
  $dvdTwo->setYear("2005");
  $dvdTwo->setDateRelease("2005-12-09");
  $dvdTwo->setFabriquant("dvd composer");
  $dvdTwo->setBudget(180000000);


$dvdThree = new Dvd("20th Century Fox", $connectDvd);
  $dvdThree->setTitle("Le Monde de Narnia : Le Prince Caspian");
  $dvdThree->setSynopsis("JLe Monde de Narnia : Le Prince Caspian ou Les Chroniques de Narnia : Le Prince Caspian au Québec est un film sorti le 16 mai 2008 aux États-Unis et le 25 juin en France");
  $dvdThree->setYear("2008");
  $dvdThree->setDateRelease("2008-05-16");
  $dvdThree->setFabriquant("burn dvd");
  $dvdThree->setBudget(225000000);


$dvdFour = new Dvd("New line cinema", $connectDvd);
  $dvdFour->setTitle("Le Monde de Narnia : L'Odyssée du Passeur d'Aurore");
  $dvdFour->setSynopsis("L'Odyssée du Passeur d'Aurore est un film américain en 3-D de Michael Apted qui est sorti en salle le 10 décembre 2010. Il est adapté du roman L'Odyssée du passeur d'aurore publié en 1952.");
  $dvdFour->setYear("2011");
  $dvdFour->setDateRelease("2010-12-08");
  $dvdFour->setFabriquant("makedvd");
  $dvdFour->setBudget(155000000);


$dvdFive = new Dvd("New line cinema", $connectDvd);
  $dvdFive->setTitle("À la croisée des mondes");
  $dvdFive->setSynopsis("À la croisée des mondes est une trilogie du genre fantasy écrite par le romancier britannique Philip Pullman de 1995 à 2000. Elle a été traduite en français par Jean Esch.");
  $dvdFive->setYear("2007");
  $dvdFive->setDateRelease("2007-12-05");
  $dvdFive->setFabriquant("Dvd for all");
  $dvdFive->setBudget(170000000);


  $tabDvd = [$dvdOne, $dvdTwo, $dvdThree, $dvdFour, $dvdFive];
  $tabDvdThree = [$dvdFour, $dvdTwo, $dvdThree] ;

$dvdRom = new DvdRom($connectDvd, "#EEAA66");
  $dvdRom->setPrix(40000);
  $dvdRom->setFabriquant("Sony");
  $dvdRom->setDiametres("10");
  $dvdRom->setPoid(15);
  $dvdRom->setTitle("Le Requin Marteau");
  $dvdRom->setSynopsis("Description du film Le Requin Marteau");
$dvdRomTwo = new DvdRom($connectDvd, "#EE7766");
  $dvdRomTwo->setPrix(40000);
  $dvdRomTwo->setFabriquant("Sony");
  $dvdRomTwo->setDiametres("10");
  $dvdRomTwo->setPoid(15);
  $dvdRomTwo->setTitle("Le Requin Marteau");
  $dvdRomTwo->setSynopsis("Description du film Le Requin Marteau");
$dvdRomThree = new DvdRom($connectDvd, "#993399");
  $dvdRomThree->setPrix(40000);
  $dvdRomThree->setFabriquant("Sony");
  $dvdRomThree->setDiametres("10");
  $dvdRomThree->setPoid(15);
  $dvdRomThree->setTitle("Le Requin Marteau");
  $dvdRomThree->setSynopsis("Description du film Le Requin Marteau"); ?>

<?php $tabDvdRom = [$dvdRom, $dvdRomTwo, $dvdRomThree]; ?>

<?php

$blueRay = new Blueray($connectDvd);
$blueRay->setTitle('La Vallé Bleue');
$blueRay->setSynopsis('Description de La Vallé Bleue');
$blueRay->setPrix(1000);
$blueRay->setFabriquant("Sony");
$blueRay->setDiametres("10");
$blueRay->setPoid(15);
$blueRay->modifPrix(100, 25); ?>

<div class="panel panel-danger">
  <div class="panel-heading">
    Héritage
  </div>
  <div class="panel-body">
    <div>Mon film : <?php echo Dvd::compareBudgetDvd($dvdOne, $dvdTwo) ?></div>
    <div><?php echo Dvd::getNbAndMoyDvd($tabDvd) ?></div>
    <div>J'ajoute à ma Db un tableau de trois object Dvd: <?php
      foreach ($tabDvdThree as $value) {
        Dvd::insertThreeDvdInDb($value, 0);
      }
    ?></div>
    <div>J'affiche les nombre de mot de mes synopsis :
      <?php foreach ($tabDvdRom as $value) {
        echo "<b>{$value->nbWordSynopsis()}</b>";
      } ?>
    </div>
    <div>Ici je modifie mon prix selon deux parametre promotion et reduction : <?php $blueRay->modifPrix(100, 5) ?></div>
    <div><?php var_dump(Movies::dateReleaseYear($blueRay)) ?></div>
  </div>

</div>


























<?php
include "footer.php";
 ?>
