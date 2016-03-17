<?php
class Personnage {

  private $id_personnage;
  private $name_personnage;
  private $degats_personnage;

  const CEST_MOI = 1; // Constante renvoyée par la méthode `frapper` si on se frappe soi-même.
  const PERSONNAGE_TUE = 2; // Constante renvoyée par la méthode `frapper` si on a tué le personnage en le frappant.
  const PERSONNAGE_FRAPPE = 3; // Constante renvoyée par la méthode `frapper` si on a bien frappé le personnage.


  public function __construct() 
  {

  }

  // public function frapper(Personnage $perso) {
  //   if($perso->id() == $this->_id) {
  //     return self::CEST_MOI;
  //   }

  //   // On indique au personnage qu'il doit recevoir des dégâts.
  //   // Puis on retourne la valeur renvoyée par la méthode : self::PERSONNAGE_TUE ou self::PERSONNAGE_FRAPPE
  //   return $perso->recevoirDegats();
  // }

  public function hydrate(array $donnees) {
    // var_dump($donnees);
    for($nb = 0; $nb < count($donnees); $nb++) {
      $key = key($donnees);
      $test[$nb] = $key;
      $method = 'set' . ucfirst($key);
      if(method_exists($this, $method)) {
        $this->$method($donnees[$key]);
      }
      next($donnees);
      //deplace le pointeur dans le tableau asso
    }
    // foreach ($donnees as $key => $value)
    // {
    //   $method = 'set'.ucfirst($key);
    //
    //   if (method_exists($this, $method))
    //   {
    //     $this->$method($value);
    //   }
    // }
  }
  public function recevoirDegats() 
  {
    if ($this->degats_personnage > 0)
    {
      $this->degats_personnage -= 5;
    }
  }

  // public function recevoirDegats() {
  //   $this->degats_personnage += 5;

  //   // Si les dégâts sont strictement supérieur à 101, on dit que le personnage a été tué.
  //   if($this->degats_personnage > 99) {
  //     return self::PERSONNAGE_TUE;
  //   }

  //   // Sinon, on se contente de dire que le personnage a bien été frappé.
  //   return self::PERSONNAGE_FRAPPE;
  // }


  // GETTERS //


  public function getDegats() {
    return $this->degats_personnage;
  }

  public function getId() {
    return $this->id_personnage;
  }

  public function getName() {
    return $this->name_personnage;
  }

  public function setDegats($degats) {
    $degats = (int)$degats;
    if($degats >= 0 && $degats <= 100) {
      $this->degats_personnage = $degats;
    }
  }

  public function setId($id) {
    $id = (int)$id;

    if($id > 0) {
      $this->id_personnage = $id;
    }
  }

  public function setName($name)
  {
    if(is_string($name))
    {
      $this->name_personnage = $name;
    }
  }
}