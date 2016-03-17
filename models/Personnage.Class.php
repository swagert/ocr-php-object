<?php
class Personnage {

  private $_degats;
  private $_id;
  private $_name;

  const CEST_MOI = 1; // Constante renvoyée par la méthode `frapper` si on se frappe soi-même.
  const PERSONNAGE_TUE = 2; // Constante renvoyée par la méthode `frapper` si on a tué le personnage en le frappant.
  const PERSONNAGE_FRAPPE = 3; // Constante renvoyée par la méthode `frapper` si on a bien frappé le personnage.


  public function __construct(array $donnees) {
    $this->hydrate($donnees);
  }

  public function frapper(Personnage $perso) {
    if($perso->id() == $this->_id) {
      return self::CEST_MOI;
    }

    // On indique au personnage qu'il doit recevoir des dégâts.
    // Puis on retourne la valeur renvoyée par la méthode : self::PERSONNAGE_TUE ou self::PERSONNAGE_FRAPPE
    return $perso->recevoirDegats();
  }

  public function hydrate(array $donnees) {
    for($nb = 0; $nb < count($donnees); $nb++) {
      $key = key($donnees);
      $method = 'set' . ucfirst($key);
      if(method_exists($this, $method)) {
        $this->$method($donnees[$key]);
      }
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

  public function recevoirDegats() {
    $this->_degats += 5;

    // Si les dégâts sont strictement supérieur à 101, on dit que le personnage a été tué.
    if($this->_degats > 99) {
      return self::PERSONNAGE_TUE;
    }

    // Sinon, on se contente de dire que le personnage a bien été frappé.
    return self::PERSONNAGE_FRAPPE;
  }


  // GETTERS //


  public function getDegats() {
    return $this->_degats;
  }

  public function getId() {
    return $this->_id;
  }

  public function getNom() {
    return $this->_nom;
  }

  public function setDegats($degats) {
    $degats = (int)$degats;

    if($degats >= 0 && $degats <= 100) {
      $this->_degats = $degats;
    }
  }

  public function setId($id) {
    $id = (int)$id;

    if($id > 0) {
      $this->_id = $id;
    }
  }

  public function setNom($nom)
  {
    if(is_string($nom))
    {
      $this->_nom = $nom;
    }
  }
}