<?php

namespace src;

/**
 *
 */
class Personnel
{
  protected $name;
  protected $firstname;
  protected $dob;
  protected $ville;
  protected $biographie;


/**
 * Get the value of Name
 *
 * @return mixed
 */
public function getName()
{
    return $this->name;
}

/**
 * Get the value of Firstname
 *
 * @return mixed
 */
public function getFirstname()
{
    return $this->firstname;
}
/**
 * Get the value of Dob
 *
 * @return mixed
 */
public function getDob()
{
    return $this->dob;
}
/**
* Get the value of Biographie
*
* @return mixed
*/
public function getBiographie()
{
  return $this->biographie;
}


/**
 * Get the value of Ville
 *
 * @return mixed
 */
public function getVille()
{
    return $this->ville;
}


public function commentMovie(Movies $movie){

  return "<p>
  {$this->name}
  {$this->firstname}
  a commenté un film {$movie->getTitle()}
  </p>";

}


}// End class Personnel

 ?>
