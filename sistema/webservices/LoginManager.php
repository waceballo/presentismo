<?php
//solicitamos el archivo que tiene la clase Connect para establecer la conexión
require("Connect.php");
//cargamos la clase ParseUser
use Parse\ParseUser;

class LoginManager {

	public function login($obj) {

		//si el objeto recibido desde el FrontEnd está vacío, se interrumpen los procesos
		if (empty($obj)) {
			die ("Falta completar alguno de los campos");
		}

		//instanciamos Connect y llamamos al método necesario para conectarnos a la DB
		$con = new Connect();
		$var = $con->connect_to_db();

		//logueamos al usuario con los datos recibidos desde FrontEnd
		try{
			$user = ParseUser::logIn($obj["username"], $obj["password"]);
			//var_dump($user);

			//iniciamos la sesion para poder almacenar datos y que persistan en el tiempo
			session_start();

			//almacenamos dentro de la variable global los datos que nos interesará utilizar luego en otros servicios
			$_SESSION["username"] = $user->get('username');
			$_SESSION["userType"] = $user->get('TipoUsuario')->getObjectId();
			$_SESSION["sede"] = $user->get('NombreSede_FK')->getObjectId();
			return true;

		}catch(Exception $e){
			header($_SERVER['SERVER_PROTOCOL'].' 403 _ERROR_USER_PASS_', true, 403);
			//echo json_encode($e);
			return false;
			//if ($e->getCode()==101){
				
			//}
			//var_dump($e);
			//echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		}
		
	}
}