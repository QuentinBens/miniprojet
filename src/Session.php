<?php

namespace src;

class Session {


protected $dateSession;
protected $dateCreated;
protected $idMovie;

const NB_BILLET = "100";
const TROIS_D = true;


/**
 * Get the value of Date Release
 *
 * @return mixed
 */
public function getDateSession()
{
    return $this->dateSession;
}

/**
 * Get the value of Date Created
 *
 * @return mixed
 */
public function getDateCreated()
{
    return $this->dateCreated;
}

/**
 * Get the value of Id Movie
 *
 * @return mixed
 */
public function getIdMovie()
{
    return $this->idMovie;
}


/**
 * Set the value of Date Release
 *
 * @param mixed dateSession
 *
 * @return self
 */
public function setDateSession($dateSession)
{
    $this->dateSession = $dateSession;

    return $this;
}

/**
 * Set the value of Date Created
 *
 * @param mixed dateCreated
 *
 * @return self
 */
public function setDateCreated($dateCreated)
{
    $this->dateCreated = $dateCreated;

    return $this;
}

/**
 * Set the value of Id Movie
 *
 * @param mixed idMovie
 *
 * @return self
 */
public function setIdMovie($idMovie)
{
    $this->idMovie = $idMovie;

    return $this;
}

/**
 * Formate la date dans un nouveau format
 * @return mixed la date au nouveau format
 */
public function formatDateSession(){

  $newDate = new \DateTime($this->getdateSession());

  return "Le" .$newDate->format(" d F Y à H:i");

}// fin de function formatDateSession



/**
 * Retourne l'année de la date de sortie
 * @return [type] [description]
 */
public function getYearOfdateSession(){
  $date = new \DateTime($this->dateSession);
  return $date->format('Y');
}

/**
 * Retourne la difference entre 2 dates au format souhaité (jour, mois ...)
 * @param  Object $sessionOne Un object de class session
 * @param  Object $sessionTwo un object de class session
 * @param  String code de format de date
 * @return DATE  Renvoie une date au format demandé
 */
public static function diffBetweenTwoDate(Session $sessionOne, Session $sessionTwo,  $formatDiff ="%a"){

  $newDateOne = new \DateTime($sessionOne->getdateSession());
  $newDateTwo = new \DateTime($sessionTwo->getdateSession());

  $interval = date_diff($newDateOne, $newDateTwo);

  return $interval->format($formatDiff);

}// Fin de function diffBetweenTwoDate


/*
* Créer une méthode statique me retournant tous les séances de la table session après un parametre $dateAfter de type à
 (injecter la Connexion en parametre)
 */

/**
 * Compare une dateSession à une date time
 * @param  Connexion $connectDb [description]
 * @param  DateTime  $dateAfter [description]
 * @return Array               [description]
 */
public static function dateAfterParamInDb(Connexion $connectDb, \DateTime $dateAfter){

  $req= $connectDb->connectDb()->query(
  "SELECT date_session
  FROM sessions
  WHERE date_session > '{$dateAfter->format('Y-m-d')}'"
);

  return $req->fetchAll(\PDO::FETCH_ASSOC);

}//Fin de function dateAfterParamInDb


/**
 * Créer une methode qui permet de soustraire la date de la session à une intervale donnée en paramètre (fonction sub() de DatetIme)
 */



 /**
  * Soustrait un iterval à une date
  * @param  DateInterval $interval [description]
  * @return [type]                 [description]
  */
 public function getSubDateSession(\DateInterval $interval){

  $sessionDateTime = new \DateTime($this->dateSession);
   $req = $sessionDateTime->sub($interval);

   return $req->format("Y-m-d");

 }// fin de function getSubDateSession


 /**
 * Créer une méthode qui prends en parametre un tableau d'objets Session et qui retourne uniquement les objets
 * Session qui ont une date de session en 2012
 */


public static function getDateSessionWithYear($tabSess = []){

  $tabNewValueDate =[];

  foreach ($tabSess as $key => $valueDate) {
    $newValueDate= new \DateTime($valueDate->getDateSession());
    if($newValueDate->format('Y') == "2012"){
      array_push($tabNewValueDate, $newValueDate);
    }

  }
  return $tabNewValueDate;

}// fin de function getDateSessionWithYear

/**
 * Compares object and DateTime parameters
 * @param  [$objectSess]  Object of "Session" class
 * @param  [$objectDate]  Date type "DateTime"
 * @return [Boolean] true or false, if DateSession if greater or smaller
 */
public static function boolIfSupOrInf(Session $objectSess, \DateTime $objectDate){

  $DateTimeSess = new \DateTime($objectSess->getDateSession());
  if($DateTimeSess > $objectDate){
    return true;
  }
    return false;

}// end funtion boolIfSupOrInf


public static function getDateSessInTwoDateTime(Session $objectDateOne, \DateTime $objectDateTwo){

  $DateTimeSess = new \DateTime($objectSess->getDateSession());
  if($DateTimeSess->format("Y-m-d") > $objectDate->format("Y-m-d")){
    return true;
  }else{
    return false;
  }

}// fin de funtion boolIfSupOrInf




}// Fin class session















 ?>
