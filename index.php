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
    	require('MODULE/'.strtoupper($class).'MODEL/'.$class.'.class.php');
	}
	else
	{
		$dossier = str_replace('Manager', '', $class);
    	require('MODULE/'.strtoupper($dossier).'/MODEL/'.$class.'.class.php');
	}
});

session_start();

$page = 'home';

// require('APPS/listeErrors.php');
// require('config.php');

try
{
    $bdd = new PDO('mysql:dbname=ocrCombat;host=db', 'root', 'root');
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
	'register' => 'User',
	'login' => 'User',
	'logout' => 'User',
	'information' => 'User',
	'create_message' => 'Message',
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

?>