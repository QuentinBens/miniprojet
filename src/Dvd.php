<?php

namespace src;

class Dvd extends Movies
{

protected $taxe = 19.6;
protected $capacity;
protected $coucheDouble;



public function __construct($distributor, Connexion $connexion){

  if($connexion){
    $this->connexion = $connexion->connectDb();
  }
  parent::__construct($distributor, $connexion);

}


  

  /**
   * Get the value of Taxe
   *
   * @return mixed
   */
  public function getTaxe()
  {
      return $this->taxe;
  }

  /**
   * Set the value of Taxe
   *
   * @param mixed taxe
   *
   * @return self
   */
  public function setTaxe($taxe)
  {
      $this->taxe = $taxe;

      return $this;
  }

  /**
   * Get the value of Capacity
   *
   * @return mixed
   */
  public function getCapacity()
  {
      return $this->capacity;
  }

  /**
   * Set the value of Capacity
   *
   * @param mixed capacity
   *
   * @return self
   */
  public function setCapacity($capacity)
  {
      $this->capacity = $capacity;

      return $this;
  }

  /**
   * Get the value of Couche Double
   *
   * @return mixed
   */
  public function getCoucheDouble()
  {
      return $this->coucheDouble;
  }

  /**
   * Set the value of Couche Double
   *
   * @param mixed coucheDouble
   *
   * @return self
   */
  public function setCoucheDouble($coucheDouble)
  {
      $this->coucheDouble = $coucheDouble;

      return $this;
  }

/**
 * Compare deux object Dvd
 * @param  Object $dvdObjectOne object de la class Dvd
 * @param  object $dvdObjectTwo object de la class Dvd
 * @return Mixed              return le plus grand budget
 */
public static function compareBudgetDvd(Dvd $dvdObjectOne, Dvd $dvdObjectTwo){

  if ($dvdObjectOne->budget >= $dvdObjectTwo->budget) {
    return "<b>{$dvdObjectOne->title}</b> a le plus gros budget avec <b>{$dvdObjectOne->budget}</b> €";
  }
    return "<b>{$dvdObjectTwo->title}</b> a le plus gros budget avec <b>{$dvdObjectTwo->budget}</b> €";

}// End function compareBudget

/**
 * Calcul la moyenne et le total du budget des films
 * @param  array $tab tableau d'object Dvd
 * @return mixed      la moyenne et le total des films dans une chaine de caractere
 */
public static function getNbAndMoyDvd($tab = []){

  $i = 0;
  $tot = 0;
  foreach ($tab as $value) {
    $i++;
    $tot += $value->budget;
  }
  $moy = $tot/$i;

  return "Mon budget total: <b>{$tot}</b> €, la moyenne du prix de mes <b>{$i}</b> films est de <b>{$moy}</b> €";

}// End function getNbAndMoyDvd


public static function insertThreeDvdInDb(Dvd $dvdObject, $send = 0){
  if($send == 1){
    $req = $dvdObject->getConnectDb()->prepare(
    "INSERT INTO movies(title, synopsis, annee, date_release, budget, distributeur)
    VALUES(:title, :synopsis, :annee, :date_release, :budget, :distributeur)
    ");

    $req->execute([
      'title' => $dvdObject->title,
      'synopsis' => $dvdObject->synopsis,
      'annee' => $dvdObject->year,
      'date_release' => $dvdObject->dateRelease,
      'budget' => $dvdObject->budget,
      'distributeur' => $dvdObject->distributor
    ]);

    echo "<b>It's SEND  ! </b>";
  }
} // END function insertThreeDvdInDb





























































}// Fin de class Dvd


 ?>
