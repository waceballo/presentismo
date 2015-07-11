<?php
require("../processes/Connect.php");

use Parse\ParseQuery;
use Parse\ParseObject;

class UpdateManager {
    public function update($obj) {
        // if (empty($obj)) {
        //     die ("No hay asistentes para Actualizar.");
        // }
        
        $json = file_get_contents('php://input');
        echo $json;
         
        //me conecto a la DB
        $con = new Connect();
        $var = $con->connect_to_db();

        $query = new ParseQuery("Asistencia");
        $results = $query->find();
        $object = new $results;
print_r($results);
        // echo "Successfully retrieved " . count($results) . " scores.";
        // // Do something with the returned ParseObject values
        // for ($i = 0; $i < count($results); $i++) {
        //   $object = $results[$i];
        //   echo $object->getObjectId() . ' - ' . $object->get('Presente').'/';
        // }   

        // Create the object.
        $actualizaasistencia = new ParseObject("Asistencia");

        $actualizaasistencia->set("Aviso", $object->get('Aviso'));
        $actualizaasistencia->set("Presente", $object['0']);
        $actualizaasistencia->set("Fecha", $object['0']);
//         $actualizaasistencia->set("Usuario_FK", $asistencia->get('Usuario_FK'));
         $actualizaasistencia->save();

        $actualizaasistencia->set("Aviso", $obj['Aviso']);
        $actualizaasistencia->set("Presente", $obj['Presente']);
        $actualizaasistencia->set("Fecha", new DateTime);
        $actualizaasistencia->save();

    }
}