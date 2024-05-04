<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
// Verificar si existe un nombre de usuario en la sesión y si es igual a "admin"
if(isset($_SESSION['username']) && $_SESSION['username'] === "admin") {
    // Si hay un nombre de usuario en la sesión y es "admin", se permite el acceso a la API
    include 'conexion.php';
    $sqlSelect = "SELECT * FROM estudiantes";
    $respuesta = $conn->query($sqlSelect);
    $result = array();
    if ($respuesta->num_rows > 0) {
        while ($fila = $respuesta->fetch_assoc()) {
            array_push($result, $fila);
        }
    } else {
        $result = "No hay estudiantes";
    }
    echo json_encode($result);
} else {
    // Si no hay un nombre de usuario en la sesión o no es "admin", se devuelve un mensaje de error
    echo json_encode(array("error" => "Acceso no autorizado"));
}
?>