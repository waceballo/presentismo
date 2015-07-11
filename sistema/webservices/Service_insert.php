<?php

header('Content-type: application/json');


$METHOD = $_SERVER['REQUEST_METHOD'];
$APIURI = $_SERVER['REQUEST_URI'];


switch($METHOD) {

	case 'POST':

		$json = file_get_contents('php://input');
		//echo $json;

		$obj = json_decode($json, true);
		require("InsertManager.php");

	 	$insertManager = new InsertManager();
		$insertManager->insert($obj);
			
	break;
	
	default:

		header('HTTP/1.1 405 Method Not Allowed');
		header('Allow: GET, PUT, DELETE');
		
	break;
}