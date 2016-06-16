<?php

namespace src;

/**
*Classe représentative de ma connexion en bdd
*/
class Connexion {

  protected $host;
  protected $login;
  protected $password;
  protected $charset = "utf8";
  protected $dbName;
  protected $timeout = 3;
  protected $port;
  const SGBD = "MysqlndUhConnection";



//===========================CONSTRUCT=============================


/**
 * J'oblige l'initialisation de l'host et le port l'ors de la création d'object
 * @param [type] $host la nom de l'host
 * @param [type] $port le numéro du port de la connexion
 */
  public function __construct($host, $dbName, $login, $password, $port = ""){

    $this->host = $host;
    $this->dbName = $dbName;
    $this->login = $login;
    $this->password = $password;
    $this->port = $port;
  }

// ===========================GETTER=============================
  /**
  * Getter
  * Acceder à l'attribut host
  */
  public function getHost(){
      return $this->host;
  }// fin de function getHost


  /**
  * Getter
  * Acceder à l'attribut login
  */
  public function getLogin(){
      return $this->login;
  }// fin de function getHost


  /**
  * Getter
  * Acceder à l'attribut password
  */
  public function getPassword(){
      return $this->password;
  }// fin de function getHost


  /**
  * Getter
  * Acceder à l'attribut charset
  */
  public function getCharset(){
      return $this->charset;
  }// fin de function getHost


  /**
  * Getter
  * Acceder à l'attribut charset
  */
  public function getdbName(){
      return $this->dbName;
  }// fin de function getHost


  /**
  * Getter
  * Acceder à l'attribut host
  */
  public function getTimeout(){
      return $this->timeout;
  }// fin de function getHost




//===========================SETTER=============================
  /**
  * Setter
  * Permet de modifier la valeur d'un attribut (protected)
  */
  public function setHost($host){
    $this->host = $host;
  }// fin de function Setter


  /**
  * Setter
  * Permet de modifier la valeur d'un attribut (protected)
  */
  public function setLogin($login){
    $this->login = $login;
  }// fin de function Setter


  /**
  * Setter
  * Permet de modifier la valeur d'un attribut (protected)
  */
  public function setPassword($password){
    $this->password = $password;
  }// fin de function Setter


  /**
  * Setter
  * Permet de modifier la valeur d'un attribut (protected)
  */
  public function setCharset($charset){
    $this->charset = $charset;
  }// fin de function Setter


  /**
  * Setter
  * Permet de modifier la valeur d'un attribut (protected)
  */
  public function setdbName($dbName){
    $this->dbName = $dbName;
  }// fin de function Setter

  /**
  * Setter
  * Permet de modifier la valeur d'un attribut (protected)
  */
  public function setTimeout($timeout){
    $this->timeout = $timeout;
  }// fin de function Setter



//===========================function=============================
  public function info(){

    return "<p> Host: {$this->getHost()} <br />
                Login : {$this->getLogin()} <br />
                Password : {$this->getPassword()}
            </p>";
  }

  public function infoBis($fontIcon = "", $color="success"){
    if ($fontIcon == "") {
      $fontIcon = "exclamation";
    }
    if (preg_match("/^(primary|info|warning|danger|success)$/", $color)) {
    return "<div class= 'alert alert-{$color}'><p><i class='fa fa-{$fontIcon}'></i>
              Charset : {$this->getCharset()} <br />
              Db : {$this->getdbName()} </p></div> ";

    } else {
      "<div class='alert alert-danger'>ERREUR de couleur vérifier les parametre</div>";
    }
  }

  public function allInfo(){

    return "<div class= 'jumbotron'><p>
              Host: {$this->getHost()} <br />
              Login : {$this->getLogin()} <br />
              Password : {$this->getPassword()}
              Charset : {$this->getCharset()} <br />
              Db : {$this->getdbName()} </p></div> ";
  }

  public function tabInfo($tab){
    $req = "";

    if (is_array($tab)) {

      foreach ($tab as $key => $value) {
        $req = $req . "<div class='alert alert-success'><p> Login : {$this->getLogin()} <br />
                    Password : {$this->getPassword()}
                </p></div>";
      }
    }

    return $req;
  }// fin de function tabInfo


public function showCol($number = 3){

  return
  "<div class='row'>
    <div class='col-md-{$number}'>
      <div class='jumbotron'>
        {$this->getHost()}
        {$this->getLogin()}
        {$this->getPassword()}
        {$this->getCharset()}
        {$this->getdbName()}
        {$this->getTimeout()}
      </div> <!--fin de jumbotron-->
    </div> <!--fin col-->
  </div> <!--fin row -->";


}// fin de

/**
* @param  Compare deux object au niveau login et password
* @return "true" si mdp et login identique "false" en cas contraire
* Type Hinting: Type l'objet avec la classe à la quelle il est affilié
*/
public function compareObject(Connexion $object){

  if ($this->login == $object->login && $this->password == $object->password ) {
    return true;
  }
    return false;

}// fin comparefunction


public function connectDb(){

  $connect = new \PDO("mysql:host={$this->host};dbname={$this->dbName};charset={$this->charset}",$this->login,$this->password);

  return $connect;
}

} // Fin class Connexion





 ?>
