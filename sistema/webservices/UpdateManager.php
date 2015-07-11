<?php
require ("../processes/Connect.php");
use Parse\ParseQuery;
use Parse\ParseObject;

class UpdateManager {
    public function update($obj) {
                echo "yy ".$obj["Presente"];
        if (empty($obj)) {
            die ("No hay asistentes para Actualizar.");
        }
        
        $json = file_get_contents('php://input');
        echo $json;
        
        $con = new Connect();
        $var = $con->connect_to_db();

        $date = new DateTime();

        $resultado = new ParseObject("Asistencia");
        $resultado -> set("Fecha", $date);
        $resultado -> set("Presente", $obj["Presente"]);
        $resultado -> set("Aviso", $obj["Aviso"]);
        //$resultado -> set("Sede", $_SESSION["sede"]);
        //$resultado -> set("Turno", $obj["turno"]);
        //$resultado -> set("Usurio_FK", $_SESSION["userType"]);
        $resultado -> save();
        
    }
}

echo '<h1>Se actualizaron</h1>';