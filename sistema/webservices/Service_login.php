<?php

header('Content-type: application/json; charset=utf-8');

$METHOD = $_SERVER['REQUEST_METHOD'];
$APIURI = $_SERVER['REQUEST_URI'];

if ($METHOD == 'POST') {
 		
 	$json = file_get_contents('php://input');
	$obj = json_decode($json, true);

	require('QueryManager.php');
		
	$loginManager = new LoginManager();
	$logged = $loginManager->login($obj);
	//var_dump($logged);
	
	if ($logged){
		switch ($_SESSION["userType"]) {
		case 'UgTuNHEQEZ':
			die ("Esta aplicación no es para padawans.");
			break;

		case 'o8hdPDhJDE':
			header("Location:Administrador.php");
			break;

		default:
			$queryManager = new QueryManager;
			$queryManager->query();
			break;
		}
	}
 
 } else {

 	header('HTTP/1.1 405 Method Not Allowed');
	header('Allow: PUT');
 }