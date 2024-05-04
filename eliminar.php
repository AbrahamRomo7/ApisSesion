<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
include 'conexion.php';
$cedula=$_GET["est_cedula"];
$sqlDelete="DELETE FROM estudiantes WHERE est_cedula ='$cedula'";
if ($mysqli->query($sqlDelete)===TRUE) {
    echo json_encode("Se elimino correctamente");
} else {
    echo json_encode("Error no se pudo eliminar: ".$sqlDelete.$mysqli->error);
}
$mysqli->close();

?>