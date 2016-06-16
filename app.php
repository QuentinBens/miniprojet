<?php

// J'inclue ma classe (un fichier = une class)


$connexion = new Connexion();
// Je modifie l'attribut login et password
$connexion->login = "root";
$connexion->password = "troiswa";
$connexion->host = "localhost";
$connexion->charset = "latin-swedish";
$connexion->timeout = 2;


// Je crée un 2nd object
$connexionTwo = new Connexion();
$connexionTwo->login = "admin";
$connexionTwo->password = "123";
$connexionTwo->host = "localhost";
$connexionTwo->charset = "latin-swedish";
$connexionTwo->timeout = 4;



// Je crée une 3éme connexion
$connexionThree = new Connexion();
$connexionThree->login = "testadmin";
$connexionThree->password = "123";
$connexionThree->charset = "utf8_general_ci";
$connexionThree->host = "ovh.mysql.net";
$connexionThree->timeout = 2;



// Je crée une 4éme connexion
$connexionFour = new Connexion();
$connexionFour->login = "testadmin";
$connexionFour->password = "1235";
$connexionFour->charset = "utf8_general_ci";
$connexionFour->host = "ovh.mysql.net";
$connexionFour->timeout = 2;



// Je crée une 5éme connexion
$connexionFive = new Connexion();
$connexionFive->login = "testadmin";
$connexionFive->password = "1234";
$connexionFive->charset;
$connexionFive->host;
$connexionFive->timeout = 1;


$tabConnexion = [
  $connexion,
  $connexionTwo,
  $connexionThree,
  $connexionFour,
  $connexionFive,
];
var_dump($connexion, $connexionTwo, $connexionThree, $connexionFour, $connexionFive);
?>

<div class="panel panel-primary">
    <div class="panel-body">
    <?php foreach ($tabConnexion as $eltConnexion ) {
      echo "<p class= 'text-success'> Login: <b>{$eltConnexion->login}</b><br />
                Mot de passse : <b>{$eltConnexion->password}</b>
      </p>";
      if ($eltConnexion->login == "root" || $eltConnexion->login == "admin" && $eltConnexion->host == "localhost") {
        echo "<p class ='text-primary'> La connexion est super admin en local <br /></p>";
      }
      if($eltConnexion->timeout <= 2){
          echo "<p class ='text-danger'> La connexion est courte <br /></p>";
      }
    } // Fin de foreach ?>
  </div>
</div>

<div class="panel panel-primary">
    <div class="panel-body">
      <?php foreach ($tabConnexion as $keyObj => $obt){
        $obt->timeout = 5;
      }

      $connexion->login = $connexionTwo->login;
      $connexion->password = $connexionTwo->password;

      $tabConnexion[0]->login = $tabConnexion[1]->login;
      $tabConnexion[0]->password = $tabConnexion[1]->password;


      ?>
  </div>
</div>


<?php

// Fonction de debogage pour l'orienté objet
// var_dump() est l'équivalent u print_r()
echo "<pre>";
print_r($tabConnexion);
echo "</pre>";






?>
