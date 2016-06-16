<?php

// Connect DB

function ConnectDB($nameDb, $nameHost, $login, $password, $charset='utf8'){
  // lancer une connexion
  $db = new PDO("mysql:host={$nameHost};dbname={$nameDb};charset={$charset}",$login,$password);

  //retourne la connexion à la DB
  return $db;

}//endFunction
$linkDB = ConnectDB('cinemal9','localhost','root','troiswa');

// Retoune les 6 meileurs films selon la note de presse

function getSixBestMovies($linkDB){ //$linkDB = variable contenant le script de connexion à la DB dans index.php
  $req = $linkDB->query(
  'SELECT id, title
  FROM movies
  ORDER BY note_presse DESC
  LIMIT 6'
  ); //endQuery

  //récupération du résultat de ma requete sous forme de tableau associatif
  $resultReq = $req->fetchAll();

  //retourn le tableau de résultat
  return $resultReq;

}//endFunction



// function qui affich eles - derniers commentaires et erlur date de création
function getSixLastComments($linkDB){
  $req = $linkDB->query(
  'SELECT content, note, date_format(created_at, "Publié le %d-%m-%Y à %k:%i") AS created_at
    FROM comments
    ORDER BY created_at DESC
    LIMIT 6
  ');//endQuery
  $resultReq = $req->fetchAll();
  return $resultReq;
}//endFunction



//   + Fonction qui retourne les 3 prochains films Français en VO ou VOST
//    avec Le nom, synospsy, la date de sortie, le budget et la durée

function getThreeNextVO($linkDB){
  $req = $linkDB->query(
  'SELECT movies.id AS id, movies.title, movies.image, movies.synopsis, date_format(movies.date_release, "%d-%m-%Y") AS date_release, movies.budget, movies.duree, categories.title AS category, movies.note_presse AS note, movies.categories_id AS cId
    FROM movies
    INNER JOIN categories ON movies.categories_id = categories.id
    WHERE date_release > now() AND( bo = "vo" OR bo ="vost")
    ORDER BY date_release DESC
    LIMIT 3
  ');//endQuery
  $resultReq = $req->fetchAll();
  return $resultReq;
}//endFunction



//   + Afficher les 5 derniers utilisateurs qui se sont connectés il y a moins d'une semaine
//     avec leur avatar, leur pseudo, leur email, leur téléphone, leur ville, leur date de connection

function getFiveLastUserCo($linkDB){
  $req = $linkDB->query(
  'SELECT avatar, username, email, tel, ville, date_format(lastActivity, "%d-%m-%Y à %k:%i") AS lastActivity
    FROM user
    WHERE lastActivity > date_sub(now(), INTERVAL 1 WEEK)
    ORDER BY lastActivity DESC
    LIMIT 5
  ');//endQuery
  $resultReq = $req->fetchAll();
  return $resultReq;
}//endFunction


//   + Afficher les 3 derniers medias qui on une video validées iframe

function getThreLastIframe($linkDB){
  $req = $linkDB->query(
  'SELECT medias.id, medias.movies_id, medias.video, movies.title AS title
    FROM medias
    INNER JOIN movies ON medias.movies_id = movies.id
    WHERE video IS NOT NULL
    AND video REGEXP "<iframe(.+)?>"
  ');//endQuery
  $resultReq = $req->fetchAll();
  return $resultReq;
}//endFunction

//  + Afficher les 4 catégories qui ont le plus de films
//    avec leurs nom, leurs description et le nb de film

function getFourBestCat($linkDB){
  $req = $linkDB->query(
  'SELECT categories.id, categories.title, categories.description, count(movies.id) AS count
    FROM categories
    INNER JOIN movies ON movies.categories_id = categories.id
    GROUP BY categories.id
    ORDER BY count DESC
    LIMIT 4
  ');//endQuery
  $resultReq = $req->fetchAll();
  return $resultReq;
}//endFunction

// Afficher les 3 meilleurs acteurs avec leurs nombre de films joués qui ont joués dans le plus de film
function getThreeBestActors($linkDB){
  $req = $linkDB->query(
  'SELECT CONCAT(a.firstname, " ", a.lastname) AS identity, COUNT(m.title) AS nbFilmByActor, a.image AS image
  FROM actors AS a
  INNER JOIN actors_movies AS am ON am.actors_id = a.id
  INNER JOIN movies AS m ON am.movies_id = m.id
  GROUP BY a.id
  ORDER BY COUNT(m.title) DESC
  LIMIT 3
  ');//endQuery
  $resultReq = $req->fetchAll();
  return $resultReq;
}//endFunction

// function pourt récupérer tous le détail d'un fil via son id

function getMoviesDetailById($id, $linkDB){
  $req = $linkDB->query(
  "SELECT  m.title, m.type, m.languages, m.distributeur, m.synopsis
  FROM movies AS m
  WHERE id = {$id}");//endQuery
  $resultReq = $req->fetch();

  return $resultReq;

}//endFunction

// Fonction appel categories
function getCategoriesDetailById($id, $linkDB){
  $req = $linkDB->query(
  "SELECT * FROM categories WHERE id = {$id}");//endQuery
  $resultReq = $req->fetch();

  return $resultReq;

}//endFunction

// Insert comments in DB
function insererCommentInMovies($id, $linkDB){
  // prepare() permet d'utilisier les requetes
  // du type insertion, modification ou supression
  $req=$linkDB->prepare("
  INSERT INTO comments(content, note, movies_id)
  VALUES(:content, :note, :movies_id)
  ");
  $req->execute([
    'content' => $_POST['contenu'],
    'note' => $_POST['note'],
    'movies_id' => $id,

]);

}// end function


// Ajout contenu media DB
function insertMediasInDB($id, $linkDB){
  $req=$linkDB->prepare("
  INSERT INTO medias(nature, picture, video, movies_id)
  VALUES(:nature, :picture, :video, :movies_id)
  ");
  if($_POST['nature'] == 1){
    $req->execute([
      'nature' => $_POST['nature'],
      'picture' => $_POST['image'],
      'video' => $_POST[' '],
      'movies_id' => $id,

    ]);
    echo $sucess = "<div class='alert alert-success'>votre image sucess</div>";

  }
  elseif ($_POST['nature'] == 2){
    $req->execute([
      'nature' => $_POST['nature'],
      'picture' => $_POST[''],
      'video' => $_POST['video'],
      'movies_id' => $id,

    ]);
    echo $sucess = "<div class='alert alert-success'>votre video sucess</div>";
  }
}// Fin de function


function insertContactToTable($linkDB){
  // prepare() permet d'utilisier les requetes
  // du type insertion, modification ou supression
  $req=$linkDB->prepare("
  INSERT INTO contact(sujet, url, email, contenu, created_at)
  VALUES(:raison, :url, :mail, :contenu, :created_at)
  ");
  $req->execute([
    'raison' => $_POST['raison'],
    'url' => $_POST['url'],
    'mail' => $_POST['mail'],
    'contenu' => $_POST['contenu'],
    'created_at' => date("Y-m-d H:i:s")

]);

}// end function


// Obtention des medias pour les afficher avec le film
function getMediasByMovieId($id, $linkDB){

  $req = $linkDB->query(
  "SELECT m.movies_id, m.picture, m.video, m.nature
  FROM medias AS m
  WHERE m.movies_id = {$id}");

  $resultReq = $req->fetchAll(PDO::FETCH_ASSOC);

  return $resultReq;

}// fin de gunction
function getMediasByMovieFiltre($id, $linkDB){

  $req = $linkDB->query(
  "SELECT m.movies_id, m.picture, m.video, m.nature
  FROM medias AS m
  WHERE m.movies_id = {$id}");

  $resultReq = $req->fetchAll(PDO::FETCH_ASSOC);

  return $resultReq;

}// fin de gunction





function getMoviesByFilter($regexFiltre, $linkDB){
  $req = $linkDB->query(
  "SELECT  m.id,m.title, m.type, m.languages, m.distributeur, m.synopsis
  FROM movies AS m
  WHERE m.title REGEXP '{$regexFiltre}'
  OR m.synopsis REGEXP '{$regexFiltre}'
  OR m.description REGEXP '{$regexFiltre}'
  OR m.annee REGEXP '{$regexFiltre}'
  OR m.date_release REGEXP '{$regexFiltre}'

  ");//endQuery
  $resultReq = $req->fetchAll();

  return $resultReq;

}//endFunction

// +  Bonus: Afficher un bloc Statistiques avec le NB. de films, le Nb. de catégories,
//           le nb. d'acteurs et le nombre de réalisateurs et Nb. de commentaires.
//           . Pour cela,  utiliser la fonction fetch() plutot que fetchAll()

// function for statistic number actors, category ect.. 
function statisticNb($linkDB, $nameTable){

  $req = $linkDB->query("
  SELECT COUNT(*) as nb{$nameTable}
  FROM {$nameTable}
  ");

  $resultReq = $req->fetch(PDO::FETCH_ASSOC);

  return $resultReq;

}// end function






 ?>
