<?php
class PersonnageManager {

  private $_db; // Instance de PDO

  public function __construct($db) {
    $this->setDb($db);
  }

  public function add(array $info) {
    $perso = new Personnage();
    $perso->hydrate($info);
    $nameVerif = $this->_db->quote($perso->getName());
    $degatsVerif = intval($perso->getDegats());
    $query = "INSERT INTO personnage (name_personnage,degats_personnage) VALUES(" . $nameVerif . ", '" . $degatsVerif . "')";
    $res = $this->_db->exec($query);
    if($res)
    {
      $id = $this->_db->lastInsertId();
      return $this->getById($id);
    }
  }

  public function getById($id)
	{
    $idVerif = intval($id);
    $query = "SELECT * FROM personnage WHERE id_personnage='".$idVerif."'";
    $res = $this->_db->query($query);
		if ($res)
    {
			$perso = $res->fetchObject("Personnage");
			if ($perso)
			{
				return $perso;
			}
    }
	}

  public function getByName($name)
	{
		$nameVerif = $this->_db->quote($name);
		$query = "SELECT * FROM personnage WHERE id_personnage=".$nameVerif."";
		$res = $this->_db->query($query);
		if ($res)
    {
			$perso = $res->fetchObject("Personnage");
			if ($perso)
			{
				return $perso;
			}
    }
	}

  public function get($info)
  {
    if (is_int($info))
    {
      $this->getById($info);
    }
    else
    {
      $this->getByName($info);
    }
  }

  public function count()
  {
    $query = 'SELECT COUNT(*) FROM personnage';
    $res = $this->_db->query($query);
    if ($res) {
      return $res->fetchColumn();
    }
  }

  public function listePersonnage()
  {
    $query = "SELECT * FROM personnage";
    $res = $this->_db->query($query);
    if ($res)
    {
      while($personnage = $res->fetchObject('Personnage'))
      {
        $personnages[] = $personnage;
      }
      return $personnages;
    }
  }





  

  public function delete(Personnage $perso)
  {
    $this->_db->exec('DELETE FROM personnage WHERE id = '.$perso->id());
  }

  // public function exists($info)
  // {
  //   if (is_int($info)) // On veut voir si tel personnage ayant pour id $info existe.
  //   {
  //     return (bool) $this->_db->query('SELECT COUNT(*) FROM personnage WHERE id = '.$info)->fetchColumn();
  //   }

  //   // Sinon, c'est qu'on veut vérifier que le nom existe ou pas.

  //   $q = $this->_db->prepare('SELECT COUNT(*) FROM personnage WHERE nom = :nom');
  //   $q->execute([':nom' => $info]);

  //   return (bool) $q->fetchColumn();
  // }


  // public function getList($nom)
  // {
  //   $persos = [];



  //   $q = $this->_db->prepare('SELECT id, nom, degats FROM personnage WHERE nom <> :nom ORDER BY nom');
  //   $q->execute([':nom' => $nom]);

  //   while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
  //   {
  //     $persos[] = new Personnage($donnees);
  //   }

  //   return $persos;
  // }

  public function updateDegats(Personnage $perso)
  {
    $degatsVerif = $perso->getDegats();
    $idVerif = $perso->getId();
    $query = 'UPDATE personnage SET degats_personnage = "'.$degatsVerif.'" WHERE id_personnage = "'.$idVerif.'"';
    $res = $this->_db->exec($query);
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}