<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
include 'conexion.php';
session_start();
$username= mysqli_real_escape_string($conn, $_POST['user']);
$clave= mysqli_real_escape_string($conn, $_POST['pass']);
$sql="SELECT * from usuarios where user='$username' and pass='$clave'";
$respuesta = $conn->query($sql);
if ($respuesta->num_rows > 0) {
        $_SESSION['username']=$username;
        //header("location: ../index.php?action=estudiantes");
        echo json_encode("ÉXITO EN INICIO");
    } else {
        //header("location: ../index.php?action=errorSesion");
        echo json_encode("USUARIO NO VÁLIDO");
    }
?>