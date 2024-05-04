<?php
//Encabezados para dar permisos de manejo de aplicaciones json
//Para funcionamiento
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
include 'conexion.php';
$cedula = $_GET['est_cedula'];
$nombre = $_GET['est_nombre'];
$apellido = $_GET['est_apellido'];
$telefono = $_GET['est_telefono'];
$direccion = $_GET['est_direccion'];
$sqlInsert = "INSERT INTO estudiantes(est_cedula, est_nombre, est_apellido, est_telefono, est_direccion) VALUES('$cedula','$nombre','$apellido','$telefono','$direccion')";
if($mysqli->query($sqlInsert)===TRUE){ //tres iguales debe ser exactamente igual
    echo json_encode("Se guardo correctamente");
} else {
    echo json_encode("Error: ".$sqlInsert.$mysqli->error);
}
$mysqli->close();
?>