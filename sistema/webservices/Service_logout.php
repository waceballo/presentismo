<?php

//header('Content-type: application/json');


$METHOD = $_SERVER['REQUEST_METHOD'];
$APIURI = $_SERVER['REQUEST_URI'];


switch($METHOD) {

	case 'POST':

		session_unset();
		session_destroy();
		header('Location: ../index.html');

					
	break;
	
	default:

		header('HTTP/1.1 405 Method Not Allowed');
		header('Allow: GET, PUT, DELETE');
		
	break;
}