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
  public function __construct( Connexion $connexion,
                              $couleur = "",
                              $enregistrable = true){
        parent::__construct($connexion);
        $this->couleur = $couleur;
        $this->enregistrable = $enregistrable;
  }
}
 ?>
