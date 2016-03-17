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
	elseif ($action == 'create')
	{
		if (isset($_POST['adversaire']))
		{

		}
	}
?>