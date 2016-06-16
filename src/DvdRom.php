<?php
namespace src;
/**
 * Classe DVDROM
 * @class DvdRom
 * @extends Dvd
 */
class DvdRom extends Dvd
{
  protected $couleur;
  protected $enregistrable;
  protected $capacite = 4.7;
  /**
   * Constructeur
   * @param string $couleur       [description]
   * @param [type] $enregistrable [description]
   */
  public function __construct( Connexion $connexion, $couleur = "", $enregistrable = true)
  {
        parent::__construct(null, $connexion);
        $this->couleur = $couleur;
        $this->enregistrable = $enregistrable;
  }

    /**
     * Get the value of Classe DVDROM
     *
     * @return mixed
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set the value of Classe DVDROM
     *
     * @param mixed couleur
     *
     * @return self
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get the value of Enregistrable
     *
     * @return mixed
     */
    public function getEnregistrable()
    {
        return $this->enregistrable;
    }

    /**
     * Set the value of Enregistrable
     *
     * @param mixed enregistrable
     *
     * @return self
     */
    public function setEnregistrable($enregistrable)
    {
        $this->enregistrable = $enregistrable;

        return $this;
    }

    /**
     * Get the value of Capacite
     *
     * @return mixed
     */
    public function getCapacite()
    {
        return $this->capacite;
    }

    /**
     * Set the value of Capacite
     *
     * @param mixed capacite
     *
     * @return self
     */
    public function setCapacite($capacite)
    {
        $this->capacite = $capacite;

        return $this;
    }

}
 ?>
