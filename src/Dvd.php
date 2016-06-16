<?php

namespace src;

class Dvd extends Movies
{

protected $prix;
protected $taxe = 19.6;
protected $capacity;
protected $fabriquant;
protected $diametres;
protected $poid;
protected $coucheDouble;






  /**
   * Get the value of Prix
   *
   * @return mixed
   */
  public function getPrix()
  {
      return $this->prix;
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
   * Get the value of Capacity
   *
   * @return mixed
   */
  public function getCapacity()
  {
      return $this->capacity;
  }

  /**
   * Get the value of Fabriquant
   *
   * @return mixed
   */
  public function getFabriquant()
  {
      return $this->fabriquant;
  }

  /**
   * Get the value of Diametres
   *
   * @return mixed
   */
  public function getDiametres()
  {
      return $this->diametres;
  }

  /**
   * Get the value of Poid
   *
   * @return mixed
   */
  public function getPoid()
  {
      return $this->poid;
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
   * Set the value of Prix
   *
   * @param mixed prix
   *
   * @return self
   */
  public function setPrix($prix)
  {
      $this->prix = $prix;

      return $this;
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
   * Set the value of Fabriquant
   *
   * @param mixed fabriquant
   *
   * @return self
   */
  public function setFabriquant($fabriquant)
  {
      $this->fabriquant = $fabriquant;

      return $this;
  }

  /**
   * Set the value of Diametres
   *
   * @param mixed diametres
   *
   * @return self
   */
  public function setDiametres($diametres)
  {
      $this->diametres = $diametres;

      return $this;
  }

  /**
   * Set the value of Poid
   *
   * @param mixed poid
   *
   * @return self
   */
  public function setPoid($poid)
  {
      $this->poid = $poid;

      return $this;
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
