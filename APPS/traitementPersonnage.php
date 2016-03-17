<?php
	if ($action == 'create_personnage')
	{
		if (isset($_POST['name_personnage']))
		{
			$information = array(
				'name' => $_POST['name_personnage'],
				'degats' => 100,
			);

			$PersonnageManager = new PersonnageManager($db);
			$personnage = $PersonnageManager->add($information);
			// header('Location: home');
			// exit;
		}
	}
	elseif ($action == 'select_personnage')
	{
		if (isset($_POST['personnageChoix']))
		{
			$idPersonnage = $_POST['personnageChoix'];
			if ($idPersonnage != 'null') 
			{
				$PersonnageManager = new PersonnageManager($db);
				$Personnage = $PersonnageManager->getById($idPersonnage);
				if (isset($Personnage)) {
					$_SESSION['id'] = $Personnage->getId();
					$_SESSION['name'] = $Personnage->getName();

				}
			}
		}
	}
	elseif ($action == 'frapper_personnage')
	{
		if (isset($_POST['adversaire']))
		{
			$idAdversaire = $_POST['adversaire'];
			$PersonnageManager = new PersonnageManager($db);
			$Personnage = $PersonnageManager->getById($idAdversaire);
			$Personnage->recevoirDegats();
			$PersonnageManager->updateDegats($Personnage);
		}
	}
?>