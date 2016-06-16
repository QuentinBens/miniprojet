<?php

namespace src;

/**
 *
 */
class ActeurSerie extends Acteur
{


protected $nomDeSerie;
protected $surNom;




  /**
   * Get the value of Nom De Serie
   *
   * @return mixed
   */
  public function getNomDeSerie()
  {
      return $this->nomDeSerie;
  }

  /**
   * Get the value of Sur Nom
   *
   * @return mixed
   */
  public function getSurNom()
  {
      return $this->surNom;
  }


  /**
   * Set the value of Nom De Serie
   *
   * @param mixed nomDeSerie
   *
   * @return self
   */
  public function setNomDeSerie($nomDeSerie)
  {
      $this->nomDeSerie = $nomDeSerie;

      return $this;
  }

  /**
   * Set the value of Sur Nom
   *
   * @param mixed surNom
   *
   * @return self
   */
  public function setSurNom($surNom)
  {
      $this->surNom = $surNom;

      return $this;
  }

}





?>
