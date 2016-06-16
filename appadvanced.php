<?php
include "header.php";
include "src/Personnel.php";
include "src/Acteur.php";
include "src/Director.php";
include "src/ActeurSerie.php";
include "src/ActeurFilm.php";
include "src/Movies.php";
include "src/Connexion.php";

use src\Acteur;
use src\Director;
use src\ActeurSerie;
use src\ActeurFilm;
use src\Movies;
use src\Connexion;

$actorOne = new Acteur();
  $actorOne->setName('Quentin');
  $actorOne->setFirstname('BENARD');
  $actorOne->setDob('1992-10-24');
  $actorOne->setVille('Montélimar');
  $actorOne->setBiographie("What else !");

$directorOne = new Director();
  $directorOne->setName('Quentin');
  $directorOne->setFirstname('BENARD');
  $directorOne->setDob('1992-10-24');
  $directorOne->setVille('Montélimar');
  $directorOne->setBiographie("What else !");


$ActeurSerieOne = new ActeurSerie();
  $ActeurSerieOne->setName('Quentin');
  $ActeurSerieOne->setFirstname('BENARD');
  $ActeurSerieOne->setDob('1992-10-24');
  $ActeurSerieOne->setVille('Montélimar');
  $ActeurSerieOne->setBiographie("What else !");
  $ActeurSerieOne->setNomDeSerie("Jhon moreno");


$ActeurSerieFilmOne = new ActeurFilm();
  $ActeurSerieFilmOne->setName('Quentin');
  $ActeurSerieFilmOne->setFirstname('BENARD');
  $ActeurSerieFilmOne->setDob('1992-10-24');
  $ActeurSerieFilmOne->setVille('Montélimar');
  $ActeurSerieFilmOne->setBiographie("What else !");
  $ActeurSerieFilmOne->setCv("Mon CV");

  $connexionPdo = new Connexion("localhost", "cinemal9", "root", "troiswa");
$moviesOne = new Movies("Distributeur de mon film", $connexionPdo, 4);
  $moviesOne->setTitle("Deadpool");
  $moviesOne->setSynopsis("Mon synopsis Seigneurs des anneaux");
  $moviesOne->setDateRelease("2016-05-02");
  $moviesOne->setBudget(1000000);
  $moviesOne->setDistributor("europacorp");



  echo $actorOne->commentMovie($moviesOne);


var_dump($actorOne);
var_dump($directorOne);
var_dump($ActeurSerieOne);
var_dump($ActeurSerieFilmOne);


include "footer.php";

 ?>
