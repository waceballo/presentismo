<?php

require ("../processes/Connect.php");

class InsertManager {

	public function insert($obj) {

		if (empty($obj)) {
			die ("No hay asistentes para insertar.");
		}

		$con = new Connect();
		$var = $con->connect_to_db();
				
		$query = $var->prepare("INSERT INTO asistencia (nombre, apellido, fecha) VALUES (?, ?, Now())");
			
		$query->execute(array($obj["nombre"],$obj["apellido"]));
	}
}