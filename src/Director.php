<?php

namespace src;


class Director extends Personnel {


  protected $image;





  /**
   * Get the value of Image
   *
   * @return mixed
   */
  public function getImage()
  {
      return $this->image;
  }




  /**
   * Set the value of Firstname
   *
   * @param mixed firstname
   *
   * @return self
   */
  public function setFirstname($firstname)
  {
      $this->firstname = $firstname;

      return $this;
  }

  /**
   * Set the value of Firstname
   *
   * @param mixed firstname
   *
   * @return self
   */
  public function setName($name)
  {
      $this->name = $name;

      return $this;
  }

  /**
   * Set the value of Dob
   *
   * @param mixed dob
   *
   * @return self
   */
  public function setDob($dob)
  {
      $this->dob = $dob;

      return $this;
  }

  /**
   * Set the value of Ville
   *
   * @param mixed ville
   *
   * @return self
   */
  public function setVille($ville)
  {
      $this->ville = $ville;

      return $this;
  }

  /**
   * Set the value of Biographie
   *
   * @param mixed biographie
   *
   * @return self
   */
  public function setBiographie($biographie)
  {
      $this->biographie = $biographie;

      return $this;
  }

  /**
   * Set the value of Image
   *
   * @param mixed image
   *
   * @return self
   */
  public function setImage($image)
  {
      $this->image = $image;

      return $this;
  }
  /**
   * Tranforme la date au format d/m/Y
   * @return DATE date formater
   */
  public function getDobFr(){

    $newDate = new \DateTime($this->getDob());

    return $newDate->format("d/m/Y");

  }

}

 ?>
