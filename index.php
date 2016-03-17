<?php

// var_dump($_GET);
// var_dump($_POST);
// var_dump($_SESSION);
// exit;


spl_autoload_register(function($class)
{
	$findme    = 'Manager';
	$testManager = stripos($class, $findme);

	if ($testManager == FALSE)
	{
    	require('BUNDLE/'.strtoupper($class).'/MODELS/'.$class.'.Class.php');
	}
	else
	{
		$dossier = str_replace('Manager', '', $class);
    	require('BUNDLE/'.strtoupper($dossier).'/MODELS/'.$class.'.Class.php');
	}
});

session_start();

$page = 'home';

try
{
    $db = new PDO('mysql:dbname=ocrCombat;host=db', 'root', 'root');
    // $db = new PDO('mysql:dbname=tchat_object;host=localhost:8889', 'root', 'root');
}
catch (PDOException $e)
{
    $error = 'Erreur interne';
}

if (isset($_SESSION['id']))
{
	$page = 'home';
	$access = ['home' , 'message', 'profil' ];
}
else
{
	$page = 'home';
	$access = ['home'];
}
if (isset($_GET['page']))
{
	if (in_array($_GET['page'], $access ))
	{
		$page = $_GET['page'];
	}
	else
	{
		header('Location: '.$page);
		exit;
	}
}

$traitement_action = [
	'create_personnage' => 'Personnage',
	'select_personnage' => 'Personnage',
];

if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if (isset($traitement_action[$action]))
	{
		$value = $traitement_action[$action];
		require('APPS/traitement'.$value.'.php');
	}
}

require('APPS/skel.php');
?>