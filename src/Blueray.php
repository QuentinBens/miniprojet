<?php
namespace src;
/**
 * @class BlueRay
 * @extends Movie
 */
class Blueray extends Movies
{
  protected $typeMedia = "disque optique";
  protected $codage = ['MPEG-4', 'H.264', 'VC-1'];
  protected $mecanisme;
  protected $utilisation = ["stockage", "vidéo haute définition", "PlayStation 3",
      "PlayStation 4",  "Xbox One"];



  public function __construct( Connexion $connexion){

    if($connexion){
      $this->connexion = $connexion->connectDb();
    }
    parent::__construct(null, $connexion);

  }



    /**
     * Get the value of Type Media
     *
     * @return mixed
     */
    public function getTypeMedia()
    {
        return $this->typeMedia;
    }

    /**
     * Get the value of Codage
     *
     * @return mixed
     */
    public function getCodage()
    {
        return $this->codage;
    }

    /**
     * Get the value of Mecanisme
     *
     * @return mixed
     */
    public function getMecanisme()
    {
        return $this->mecanisme;
    }

    /**
     * Get the value of Utilisation
     *
     * @return mixed
     */
    public function getUtilisation()
    {
        return $this->utilisation;
    }


    /**
     * Set the value of Type Media
     *
     * @param mixed typeMedia
     *
     * @return self
     */
    public function setTypeMedia($typeMedia)
    {
        $this->typeMedia = $typeMedia;

        return $this;
    }

    /**
     * Set the value of Codage
     *
     * @param mixed codage
     *
     * @return self
     */
    public function setCodage($codage)
    {
        $this->codage = $codage;

        return $this;
    }

    /**
     * Set the value of Mecanisme
     *
     * @param mixed mecanisme
     *
     * @return self
     */
    public function setMecanisme($mecanisme)
    {
        $this->mecanisme = $mecanisme;

        return $this;
    }

    /**
     * Set the value of Utilisation
     *
     * @param mixed utilisation
     *
     * @return self
     */
    public function setUtilisation($utilisation)
    {
        $this->utilisation = $utilisation;

        return $this;
    }

}
