<?php
header('Content-type: application/json');

$METHOD = $_SERVER['REQUEST_METHOD'];
$APIURI = $_SERVER['REQUEST_URI'];

switch($METHOD) {
    case 'POST':
        $json = file_get_contents('php://input');
        echo $json;

        $obj = json_decode($json, true);
        
        //cargo los usuarios autorizados
        //$usuarioautorizado = "FLAdvaR13B"; // aca deberia ir ID de la session del usuario
        session_start();
        $usuarioautorizado = $_SESSION["userType"];
        //echo "codigo usuario: ".$usuarioautorizado;

        if ( $usuarioautorizado === "FLAdvaR13B" or $usuarioautorizado === "o8hdPDhJDE"){
            require("UpdateManager.php");

            $updateManager = new UpdateManager();
            $updateManager ->update($obj);
        }else {
            die("No esta Autorizado, por favor abandone el sitio");    
        }
        
        break;
    default:
        header('HTTP/1.1 405 Method Not Allowed');
        header('Allow: GET, PUT, DELETE');
    break;
}