<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
include 'conexion.php';
$username= mysqli_real_escape_string($conn, $_GET['user']);
$clave= mysqli_real_escape_string($conn, $_GET['pass']);
$sql="SELECT * from usuarios where user='$username' and pass='$clave'";
$respuesta = $conn->query($sql);
if ($respuesta->num_rows > 0) {
        //header("location: ../index.php?action=estudiantes");
        session_start();
        $_SESSION['username']=$username;
        echo json_encode("Ok");
    } else {
        //header("location: ../index.php?action=errorSesion");
        echo json_encode("USUARIO NO VÁLIDO");
    }
?>