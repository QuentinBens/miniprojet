<?php
namespace src;

class Movies {


protected $title;
protected $synopsis;
protected $year;
protected $dateRelease;
protected $budget;
protected $visibility = true;
protected $distributor;
protected $connectDb;
protected $id;
const VERSION = "1.0";

// ========================CONSTRUCT===========================
  /**
   * Permet d'initialiser des valeur par défaults lors de l'initialisation de l'object
   * @param dateY l'année à afficher, par defaut date(Y)
   * @param distributor à renseigner lors de l'initalisation de l'objet
   */
  public function __construct($distributor, Connexion $connectPDO = null, $id= null){

    if ($dateY == "") {
       $this->year = date('Y');
    }else{
      $this->year = $dateY;
    }
      $this->id = $id;
      $this->distributor = $distributor;
      //j'initialise ma connexion à la base de données
      ///:parl'intermediere de mon objet $connectDb
      $this->connectDb = $connectPDO->connectDb();
  }


// ========================GETTER=============================


/**
 * permet d'obtenir la valeur de l'attribut de l'object courant
 * @return title
 */
public function getTitle(){

  return $this->title ;

}

/**
 * permet d'obtenir la valeur de l'attribut de l'object courant
 * @return synopsis
 */
public function getSynopsis(){

  return $this->synopsis ;

}

/**
 * permet d'obtenir la valeur de l'attribut concernée de l'object courant
 * @return year$connexion
 */
public function getYear(){

  return $this->year ;

}


/**
 * permet d'obtenir la valeur de l'attribut concernée de l'object courant
 * @return dateRelease
 */
public function getdateRelease(){

  return $this->dateRelease ;

}


/**
 * permet d'obtenir la valeur de l'attribut concernée de l'object courant
 * @return budget
 */
public function getBudget(){

  return $this->budget ;

}
/**
 * permet d'obtenir la valeur de l'attribut concernée de l'object courant
 * @return boolean valeur true or false
 */
public function getVisibility(){

  return $this->visibility;
}


/**
 * permet d'obtenir la valeur de l'attribut concernée de l'object courant
 * @return string valeur de distributeur
 */
public function getDistributor(){

  return $this->distributor;
}


/**
 * permet d'obtenir la valeur de l'attribut concernée de l'object courant
 * @return string valeur de $ConnectDB
 */
public function getConnectDb(){

  return $this->connectDb;
}

public function getId(){

  return $this->id;
}
// ========================SETTERconnectDb===========================
/**
 * permet changer la valeur de l'attribut de l'object courant
 * @return title
 */
public function setTitle($title){

  return $this->title = $title ;

}

/**
 * permet changer la valeur de l'attribut de l'object courant
 * @return synopsis
 */
public function setSynopsis($synopsis){

  return $this->synopsis = $synopsis;

}

/**
 * permet changer la valeur de l'attribut concernée de l'object courant
 * @return year
 */
public function setYear($year){

  return $this->year = $year;

}


/**
 * permet d'obtenir la valeur de l'attribut concernée de l'object courant
 * @return dateRelease
 */
public function setdateRelease($dateRelease){

  return $this->dateRelease = $dateRelease;

}


/**
 * permet modifier la valeur de l'attribut concernée de l'objet courant
 * @param INT $budget montant du budget du film
 * @return INT budget montant du buget du film courant
 */
public function setBudget($budget){

  return $this->budget = $budget ;

}

/**
 * permet d'obtenir la valeur de l'attribut concernée de l'object courant
 * @param boolean $visibility valeur de l'attribut
 * @return boolean  visibility valeur de l'attribut de currently visibility
 */
public function setVisibility($visibility){

  return $this->visibility = $visibility;
}


/**
 * permet d'obtenir la valeur de l'attribut concernée de l'object courant
 * @param string $distributor nom du distributeur de movies
 * @return string  distributor nom du distributeur de currently movies
 */
public function setDistributor($distributor){

  return $this->distributor = $distributor;
}

/**
 * permet d'obtenir la valeur de l'attribut concernée de l'object courant
 * @param string $connectDb nom du de ma connexions
 * @return string  $connectDb nom du connexion de currently movies
 */
public function setGetConnectDb($connectDb){

  return $this->connectDb = $connectDb;
}

/**
 * permet d'obtenir la valeur de l'attribut concernée de l'object courant
 * @param string $id nom du de ma connexions
 * @return string  $id nom du connexion de currently movies
 */
public function setId($id){

  return $this->id = $id;
}
// ========================Function d'accés==================


  public function allInfo($tabObject){
      if (is_array($tabObject)) {
        $html = "";
        foreach ($tabObject as $key => $value) {
          $html .="<div class='col-md-6'>
                    <div class='jumbotron'>
                      {$value->getTitle()}<br />
                      {$value->getSynopsis()}<br />
                      {$value->getYear()}<br />
                      {$value->getDateRelease()}<br />
                      {$value->formatBudget()} <br />
                      {$value->getVisibility()}<br />
                      {$value->getDistributor()}
                    </div>
                  </div>";
      }
      return $html;
    }// Fin function allInfo
  }

/**
 * Formate le budget
 * @return INT budget formaté
 */
  public function formatBudget(){
    // setlocale(LC_MONETARY, 'fr_FR');
    // return money_format('%n &euro;', $this->budget);

    return number_format($this->budget, 2, ',', ' ') . ' &euro;';

  }// fin de format budget

/**
 * compare object courant avec object du parametre et sort le budget le plus grand
 * @param  INT $objectBudget object dont on souhaite la comparaison
 * @return INT budget le plus grand de la comparaison
 */
  public function compareBudget(Movies $objectBudget){

    if($this->budget > $objectBudget->budget){
      return " Pour <b>{$this->getTitle()}</b> le budget est de <b>{$this->formatBudget()}</b> ";

    }
    return "Pour <b>{$objectBudget->getTitle()}</b> le budget est de <b>{$objectBudget->formatBudget()}</b>";

  }// fin de compare budget


  /**
   * Compte le nombre de mot dans le synopsys et le retourne dans un badge
   * @return INT $nbSyno le nombre de mot
   */
  public function nbWordSynopsis(){
    $nbSyno = str_word_count($this->synopsis, 0);
    return "<span class='badge'>{$nbSyno}</span>";

  }// nbWordSynopsis


  /**
   * Verifie la valeur des attributs distributorAndVisibility
   * @return "html" en concatenant si oui ou non les valeur sont exact
   */
  public function distributorAndVisibility(){

    $html ="";
    if($this->visibility = 1){
      $html .= "Yes my movies is show & ";
    }else {
      $html .= "No my movies is hide & ";
    }

    if (preg_match('/^(warner)( )?(bros)?$/i', $this->distributor)) {
      $html .= "Yes my distributor is {$this->distributor}";
    }else{
      $html .= "No my distributor isn't {$this->distributor}";
    }
    return $html;
  }// fin de distributorAndVisibility

  /**
   * Compte le nombre de film avec un budget inférieur 1M
   * @param  array $tabObject tableau d'object
   * @return INT   $i le nombre de film avec budget < 1M
   */
  public function tabNbMoviesInfOneM($tabObject){

    if(is_array($tabObject)){
      $i = 0;
      foreach ($tabObject as $key => $value) {
        if ($value->budget < 10000000) {
        $i ++;
        }
      }
    }
    return "<span class='badge'>{$i}</span>";

  } // fin de tabNbMoviesInfOneM

  public function tabMoyenneMoviesInfOneM($tabObject){
    if(is_array($tabObject)){
      $i = 0;
      foreach ($tabObject as $key => $value) {
        if ($value->budget < 5000000) {
          $i ++;
          $total = $total + $value->budget ;
        }
      }

      return number_format($total/$i, 2, ',', ' ') . ' &euro;';;
    }

    } // fin de tabMoyenneMoviesInfOneM


  /**
   * Inserer un film dans ma base de donnée
   */
  public function insertMoviesDb($send){
    if($send == 1){
    $req = $this->connectDb->prepare("
    INSERT INTO movies(title, synopsis, annee, date_release, budget, visible, distributeur)
    VALUES (:title, :synopsis, :annee, :date_release, :budget, :visible, :distributeur)
    ");


    $req->execute([
      'title' => $this->title,
      'synopsis' => $this->synopsis,
      'annee' => $this->year,
      'date_release' => $this->dateRelease,
      'budget' => $this->budget,
      'visible' => $this->visibility,
      'distributeur' => $this->distributeur
    ]);

    echo "<p class ='text-success'>Les données de la méthode 'insertMoviesDb' ont était transmis à la base de donnée ! </p>";
  }
  }// fin de function insertMoviesDb

  /**
   * Selectionne 3 films de la DB en fr avec 2 parametre optionnels
   * @param  string $distrib nom du distributeur
   * @param  string $bo      type de bo choisis
   * @return array          tableau de film correspondant à la requete
   */
  public function selectThreeMoviesFr($distrib, $bo){
    $req = $this->connectDb->query(
    "SELECT title
    FROM movies
    WHERE languages = 'fr' AND distributeur = '{$distrib}' AND bo ='{$bo}'
    ORDER BY date_release DESC
    LIMIT 3
    ");

    return $req->fetchAll(PDO::FETCH_ASSOC);


  }// fin de function selectThreeMoviesFr

  /**
   * Retourne un boolean selon si le le titre de l'object movies existe en BD
   * @return boolean true or false selon le resultat de ma requete
   */
  public function bolleanMoviesExistDb(){
    $req = $this->connectDb->query(
    "SELECT title
      FROM movies
      WHERE title = '{$this->title}'"
      );
    if ($req->fetch() == false) {
      return false;
    }
    return true;
  }// fin de function bolleanMoviesExistDb

  /**
   * Supprime une ligne de la DB dans table movies selon l'ID
   * @param  INT $id numero de l'id à supprimer
   */
  public function deleteMovieWithId($id){
    if (is_numeric($id)) {
      $req = $this->connectDb->prepare(
      "DELETE
      FROM movies
      WHERE id = :id
      "); // fin de query

      $req->execute([
        'id' => $id,
      ]);
    }
  }// fin de function deleteMovieWithId

  /**
   * update le movie dans la DB
   * @param  Object $movie object à update de la db
   * @param  INT $id    numero de l'ID à modifier
   * @return [type]        [description]
   */
  public function changeMoviesWithId(Movies $movie, $id){
    $req = $movie->connectDb->prepare(
    "UPDATE movies
    SET title = :title,
    annee = :year,
    budget = :budget
    WHERE id = :id
    ");


    $req->execute([
      'id' => $id,
      'title' => $movie->title,
      'year' => $movie->annee,
      'budget' => $movie->budget,
    ]);

    return "<p class = 'text-success'>GRONGRAT changeMoviesWithId EXECUTE ! </p>";
  } // fin de function changeMoviesWithId




  /**
   * [searchMoviesBytitle description]
   * @param  [type] $title [description]
   * @return [type]        [description]
   */
  public function searchMoviesBytitle($title){
    $req = $this->connectDb->query(
    "SELECT title
    FROM movies
    WHERE title = '{$title}'
    ");

  $resultat = $req->fetch();

  if($resultat == false){

  return false;

}

  return true;

  }// fin de function shearMoviesBytitle



  /**
   * [nombreFilm description]
   * @param  integer $budgetMin [description]
   * @param  integer $budgetMax [description]
   * @return [type]             [description]
   */
  public function nombreFilm($budgetMin = 0, $budgetMax = 0){
    $req=$this->connectDb->query(
    "SELECT COUNT(title)
    FROM movies
    WHERE budget<$budgetMax AND budget>$budgetMin"
  );
  $resultat=$req->fetch();

  return $resultat;
  }



  /**
   * [testDateReleaseFromMovie description]
   * @param  Movies $movie [description]
   * @return [type]        [description]
   */
  public function testDateReleaseFromMovie (Movies $movie){
   $req=$this->connectDb->query(
     "SELECT *
     FROM movies
     WHERE title= '{$movie->titre}'
   ");
   $resultQuery = $req->fetch();
     $myDate = DateTime::createFromFormat('Y-m-d', $resultQuery["date_release"]);
     $myDateTimeNow = new DateTime('now');

     if ($myDate > $myDateTimeNow == true) {
       return "après";
     }
     return "avant";
 }


 /**
  * Recuperer la categorie selon l'id du film
  * @param  INT $id    id du film à recuperer
  * @param  string $titre id du film à recuperer
  * @return ARRAY       tableau comprenant la categorie
  */
 public function getCatInfoFromID($id, $titre=''){
   $req=$this->connectDb->query(
     "SELECT categories.id AS catid,
             categories.title AS cattitle,
             categories.description AS catdesc,
             movies.id AS moviesid,
             movies.title AS movietitle
     FROM categories
     INNER JOIN movies ON categories.id = movies.categories_id
     WHERE movies.id = '{$id}' OR movies.title = '{$titre}'
   ");
   $resultQuery = $req->fetch();

   return ['cattitle'=>$resultQuery['cattitle'],'catdesc'=>$resultQuery['catdesc']];
 }


 /**
  * Methode static
  * C'est une méthode particuliere qui ne traite que avec des cosntantes
  * Impossible de d'utilisier this dans une méthode static
  */
 public static function getInformationOfMovie() {

   return " <div>la version par défaut de tout mes films ".self::VERSION." </div>";


 }






} // fin de class movies  ?>
