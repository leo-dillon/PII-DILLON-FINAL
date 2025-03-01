<?php 
    include '../../clases/modelos/Usuario.php';
    include '../../clases/servicios/Conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $campo = $_POST['campo'];
        $nuevoValor = $_POST['valor'];
        $email = $_POST['email'];
        $respuesta = Usuario::ediarDato($email, $campo, $nuevoValor);
        if($campo == "nombre"){
            session_start();
            $_SESSION["nombre"] = $nuevoValor;
        }
        echo json_encode(!$respuesta);   
    }
?>