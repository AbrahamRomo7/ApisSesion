<?php
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
$sqlEdit = "UPDATE estudiantes SET est_nombre='$nombre',est_apellido='$apellido', est_telefono='$telefono', est_direccion='$direccion'
WHERE est_cedula ='$cedula'";
if ($mysqli->query($sqlEdit)===TRUE) {
    echo json_encode("Se actualizo correctamente");
} else {
    echo json_encode("Error no se actualizo: ".$sqlEdit.$mysqli->error);
}
$mysqli->close();
?>