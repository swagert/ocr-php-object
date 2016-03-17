<?php
	$personnages = $PersonnageManager->listePersonnage();
	for ($i=0; $i < count($personnages); $i++)
	{
		if ($personnages[$i]->getId() != $_SESSION['id']) 
		{
			$Personnage = $personnages[$i];
			require('BUNDLE/PERSONNAGE/VIEWS/adversaireListe.phtml');
		}
	}
?>