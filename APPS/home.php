<?php
	$PersonnageManager = new PersonnageManager($db);
	$nombrePersonnage = $PersonnageManager->count();
	require('VIEWS/home.phtml');
?>