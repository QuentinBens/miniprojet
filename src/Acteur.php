<?php
namespace src;
/**
* Class Acteur qui hérite de ma Class Personnel
* @class Acteur
* @extends Personnel
 */
class Acteur extends Personnel
{

protected $image;
protected $nationalité;
protected $roles;
protected $recompense;
protected $filmJoues;

const PAYS ="France";
const LANGUE ="fr";




/**
 * Set the value of Name
 *
 * @param mixed name
 *
 * @return self
 */
public function setName($name)
{
    $this->name = $name;

    return $this;
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
 * Get the value of Image
 *
 * @return mixed
 */
public function getImage()
{
    return $this->image;
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
 * Get the value of Nationalit
 *
 * @return mixed
 */
public function getNationalit()
{
    return $this->nationalit;
}

/**
 * Set the value of Nationalit
 *
 * @param mixed nationalit
 *
 * @return self
 */
public function setNationalit($nationalit)
{
    $this->nationalit = $nationalit;

    return $this;
}

/**
 * Get the value of Roles
 *
 * @return mixed
 */
public function getRoles()
{
    return $this->roles;
}

/**
 * Set the value of Roles
 *
 * @param mixed roles
 *
 * @return self
 */
public function setRoles($roles)
{
    $this->roles = $roles;

    return $this;
}

/**
 * Get the value of Recompense
 *
 * @return mixed
 */
public function getRecompense()
{
    return $this->recompense;
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
 * Set the value of Recompense
 *
 * @param mixed recompense
 *
 * @return self
 */
public function setRecompense($recompense)
{
    $this->recompense = $recompense;

    return $this;
}

/**
 * Get the value of Film Joues
 *
 * @return mixed
 */
public function getFilmJoues()
{
    return $this->filmJoues;
}

/**
 * Set the value of Film Joues
 *
 * @param mixed filmJoues
 *
 * @return self
 */
public function setFilmJoues($filmJoues)
{
    $this->filmJoues = $filmJoues;

    return $this;
}


public static function langBylangConst(){

  return "Ma langue en fonction de ma constante <b>" .self::LANGUE. "</b> et mon pays en fonction de ma constante <b>" .self::PAYS. "</b>";

}// fin de function langBylangConst
















}// fin class acteurs










 ?>
