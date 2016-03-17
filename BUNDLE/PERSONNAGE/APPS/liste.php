<?php
	$personnages = $PersonnageManager->listePersonnage();
	for ($i=0; $i < count($personnages); $i++)
	{
		$Personnage = $personnages[$i];
		require('BUNDLE/PERSONNAGE/VIEWS/liste.phtml');
	}
?>