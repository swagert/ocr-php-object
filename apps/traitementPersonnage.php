<?php
	if ($action == 'create')
	{
		if (isset($_POST['name_personnage'])) 
		{
			
			$information = array(
				'name' => $_POST['name_personnage'],
				'degats' => 0,
			);

			$PersonnageManager = new PersonnageManager($db);

			$personnage = $PersonnageManager->add($information);
		}
	}

	if ($action == 'create')
	{
		if (isset($_POST['select_personnage'])) 
		{
			
		}
	}

	if ($action == 'create')
	{
		if (isset($_POST['adversaire'])) 
		{
			
		}
	}
?>